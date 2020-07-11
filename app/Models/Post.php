<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    // agar published_at diterjemahkan sebagai object Carbon maka buat
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $dates = ['published_at'];
    
    // Jika semua field dimasukan
    protected $guarded = [];
    
    // protected $fillable = [
        //     'author_id','title', 'slug', 'category_id','excerpt',
        //     'body','image', 'published_at', 
        // ];
        public function author()
        {
            return $this->belongsTo('App\User');
        }
        
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        
        public function tags()
        {
            return $this->belongsToMany(Tag::class);
        }
        
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }
        
        public function commentsNumber($label = 'Comment')
        {
            $commentsNumber = ($tmp = $this->comments) ? $tmp->count() : 0;
            
            return $commentsNumber . " " . Str::plural($label, $commentsNumber);
        }
        
        public function createComment(array $data)
        {
            $this->comments()->create($data);
        }
        
        public function createTags($str)
        {
            $tags = explode(",", $str);
            $tagIds = [];
            
            foreach ($tags as $tag)
            {
                $newTag = Tag::firstOrCreate([
                    'slug' => Str::slug($tag),
                    'name' => ucwords(trim($tag))
                    ]);
                    
                    $tagIds[] = $newTag->id;
                }
                
                $this->tags()->sync($tagIds);
            }
            
            
            public function setPublishedAtAttribute($value)
            {
                $this->attributes['published_at'] = $value ?: NULL;
            }
            
            public function getTagsListAttribute()
            {
                return $this->tags->pluck('name');
            }
            
            public function getImageUrlAttribute($value)
            {
                $imageUrl = "";
                
                if ( ! is_null($this->image))
                {
                    $directory = config('cms.image.directory');
                    $imagePath = public_path() . "/{$directory}/" . $this->image;
                    if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $this->image);
                }
                
                return $imageUrl;
            }
            
            public function getImageThumbUrlAttribute($value)
            {
                $imageUrl = "";
                
                if ( ! is_null($this->image))
                {
                    $directory = config('cms.image.directory');
                    $ext       = substr(strrchr($this->image, '.'), 1);
                    $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
                    $imagePath = public_path() . "/{$directory}/" . $thumbnail;
                    if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $thumbnail);
                }
                
                return $imageUrl;
            }
            
            public function getRouteKeyName()
            {
                return 'slug';
            }
            
            public function getDateAttribute($value)
            {
                return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
            }
            
            public function getBodyHtmlAttribute($value)
            {
                return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
            }
            
            public function getExcerptHtmlAttribute($value)
            {
                return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
            }
            
            public function getTagsHtmlAttribute()
            {
                $anchors = [];
                foreach($this->tags as $tag) {
                    $anchors[] = '<a href="' .route('tag.show', $tag->slug) . '">' . $tag->name . '</a>';
                }
                return implode(", ", $anchors);
            }
            
            public function dateFormatted($showTimes = false)
            {
                $format = "d/m/Y";
                if ($showTimes) $format = $format . " H:i:s";
                return $this->created_at->format($format);
            }
            
            public function publicationLabel()
            {
                if ( ! $this->published_at) {
                    return '<span class="label label-warning">Draft</span>';
                }
                elseif ($this->published_at && $this->published_at->isFuture()) {
                    return '<span class="label label-info">Schedule</span>';
                }
                else {
                    return '<span class="label label-success">Published</span>';
                }
            }
            
            
            public function scopeLatestFirst($query)
            {
                return $query->orderBy('published_at', 'desc');
            }
            
            public function scopePopular($query)
            {
                return $query->orderBy('view_count', 'desc');
            }
            
            public function scopePublished($query)
            {
                return $query->where("published_at", "<=", Carbon::now());
            }
            
            public function scopeScheduled($query)
            {
                return $query->where("published_at", ">", Carbon::now());
            }
            
            public function scopeDraft($query)
            {
                return $query->whereNull("published_at");
            }
            
            public static function archives()
            {
                if (env('DB_CONNECTION') == 'pgsql')
                {
                    return static::selectRaw('count(id) as post_count, extract(year from published_at) as year, extract(month from published_at) as month')
                    ->published()
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(published_at) desc')
                    ->get();
                }
                else
                {
                    return static::selectRaw('count(id) as post_count, year(published_at) year, month(published_at) month')
                    ->published()
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(published_at) desc')
                    ->get();
                }
            }
            
            public function scopeFilter($query, $filter)
            {
                if (isset($filter['month']) && $month = $filter['month'])
                {
                    if (env('DB_CONNECTION') == 'pgsql') {
                        $query->whereRaw('extract(month from published_at) = ?', [$month]);
                    }
                    else {
                        $query->whereRaw('month(published_at) = ?', [$month]);
                    }
                }
                
                if (isset($filter['year']) && $year = $filter['year'])
                {
                    if (env('DB_CONNECTION') == 'pgsql') {
                        $query->whereRaw('extract(year from published_at) = ?', [$year]);
                    }
                    else {
                        $query->whereRaw('year(published_at) = ?', [$year]);
                    }
                }
                
                // check if any term entered
                if (isset($filter['term']) && $term = strtolower($filter['term']))
                {
                    $query->where(function($q) use ($term) {
                        $q->whereHas('author', function($qr) use ($term) {
                                $qr->where('name', 'LIKE', "%{$term}%");
                            });
                            $q->orWhereHas('category', function($qr) use ($term) {
                                    $qr->where('title', 'LIKE', "%{$term}%");
                                });
                                $q->orWhereHas('tags', function($qr) use ($term) {
                                    $qr->where('name', 'LIKE', "%{$term}%");
                                });
                                $q->orWhereRaw('LOWER(title) LIKE ?', ["%{$term}%"]);
                                $q->orWhereRaw('LOWER(excerpt) LIKE ?', ["%{$term}%"]);
                     });
                }
            }
}
                