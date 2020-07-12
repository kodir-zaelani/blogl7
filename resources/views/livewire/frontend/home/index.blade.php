<div>
    @section("title")Home - Zaelani.id @endsection

    <livewire:frontend.main.slider />
    <livewire:frontend.main.feature />
        
    <section class="blogs archive section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Latest Post</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                {{--  @include('frontend.kz.alert')  --}}
                @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single blog -->
                    <div class="single-blog">
                        <div class="blog-head">
                            @if ($post->imageThumbUrl)
                            <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->imageThumbUrl }}" alt="{{ $post->title }}"></a>   
                            @else
                            <a href="{{ route('post.show', $post->slug) }}"><img src="/assets/kz/images/1000x665.png" alt="{{ $post->title }}"></a>
                            @endif
                        </div>
                        <div class="blog-bottom">
                            <h4>
                                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title}}</a>
                            </h4>
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> 
                                    <a href="{{ route('author.show',$post->author->slug) }}"><strong> {{ $post->author->name  }}</strong></a>
                                </li>
                            </ul>
                            <br>
                            {!!  substr(strip_tags($post->excerpt), 0, 200) !!} [...]
                            <ul class="blog-meta">
                                <li><i class="fa fa-calendar"></i>{{ $post->date }}</li>
                                <li><a href="#"><i class="fa fa-tag"></i>{!! $post->tags_html !!}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Single blog -->
                </div> 
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Pagination -->
                    <div class="pagination-main text-center">
                        <ul class="pagination" style="padding:30px;">
                            <a class="btn animate" href="{{ route('post.all') }}">Read All Post </a>
                        </ul>
                    </div>
                    <!--/ End Pagination -->
                </div>
            </div>	
        </div>
    </section>
</div>
    