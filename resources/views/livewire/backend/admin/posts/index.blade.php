@section("title") Posts @endsection
<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Posts
                            <small>Display All Posts</small>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Post</a></li>
                            <li class="breadcrumb-item active">All Posts</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Post List  </h3> 
                                <div class="card-tools">
                                    <a id="add-button" title="Add New" class="btn btn-sm btn-success" href="{{ route('posts.create') }}">
                                        <i class="fa fa-plus-circle"></i> Add New
                                    </a>
                                  </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        @if (session('message'))
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                            {{ session('message') }}
                                        </div>
                                        @elseif(session('error-message'))
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                            {{ session('error-message') }}
                                        </div>
                                        @elseif(session('trash-message'))
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                            {{ session('trash-message') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select wire:model="perPage" id="" class="form-control form-control-sm w-auto" name="">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input wire:model.debounce.600ms="term" class="form-control form-control-sm" type="text" name="" placeholder="Search">
                                    </div>
                                </div>
                                <hr>
                                @if (!$posts->count())
                                <div class="alert alert-danger">
                                    <strong>No record found</strong>
                                </div>
                                @else
                                <table class="table table-hover table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th width="150">Author</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th width="80">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($posts as $post)
                                        
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->author->name }}</td>
                                            <td>{{ $post->category->title }}</td>
                                            <td><abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> | {!! $post->publicationLabel() !!}</td>
                                            <td>
                                                <a href="{{route('posts.edit', $post->id)}}" title="Edit" class="btn btn-xs btn-default edit-row" >
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button wire:click="destroy({{ $post->id }})" title="Trash" class="btn btn-xs btn-danger text-white"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <div class="card-footer clearfix">
                                <div class="float-left">
                                    {{ $posts->appends( Request::query() )->render() }}
                                </div>
                                <div class="float-right">
                                    <span data-toggle="tooltip" title="Posts" class="badge badge-primary">{{ $postCount }} </span>
                                    <small>{{ Str::plural('post', $postCount) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="col-md-3">
                        @if ($statusUpdate)
                        <livewire:backend.admin.posts.edit />
                        @else 
                        <livewire:backend.admin.posts.create />
                        @endif
                    </div>  --}}
                </div>
                
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    