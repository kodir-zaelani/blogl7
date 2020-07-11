@section("title") Categories @endsection
<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Categories
                            <small>Display All Categories</small>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Post</a></li>
                            <li class="breadcrumb-item active">All Categories</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Category List</h3>
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
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input wire:model.debounce.600ms="term" class="form-control form-control-sm" type="text" name="" placeholder="Search">
                                    </div>
                                </div>
                                <hr>
                                @if (!$categories->count())
                                <div class="alert alert-danger">
                                    <strong>No record found</strong>
                                </div>
                                @else
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Post Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($categories as $category)
                                        
                                        <tr>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->posts->count() }}</td>
                                            <td>
                                                <button wire:click="getCategory({{ $category->id }})" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></button>
                                                <button wire:click="destroy({{ $category->id }})" class="btn btn-sm btn-danger text-white"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <div class="card-footer clearfix">
                                <div class="float-left">
                                    {{ $categories->appends( Request::query() )->render() }}
                                </div>
                                <div class="float-right">
                                    <span data-toggle="tooltip" title="Categories" class="badge badge-primary">{{ $categoriesCount }} </span>
                                    <small>{{ Str::plural('catagory', $categoriesCount) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if ($statusUpdate)
                        <livewire:backend.admin.categories.edit />
                        @else 
                        <livewire:backend.admin.categories.create />
                        @endif
                    </div>
                </div>
                
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    