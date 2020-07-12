<div>
    @push('page-style')
    <link rel="stylesheet" href="/assets/adminlte30/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/tag-editor/jquery.tag-editor.css">
    @endpush
    @push('footer-script')
    <script src="/assets/adminlte30/plugins/select2/js/select2.full.min.js"></script>
    <script src="/assets/adminlte30/plugins/moment/moment.min.js"></script>
    <script src="/assets/adminlte30/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="/assets/adminlte30/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/assets/adminlte30/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/assets/adminlte30/plugins/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>

    @endpush
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>
                  Posts
                  <small>Create Posts</small>
                </h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Post</a></li>
                  <li class="breadcrumb-item active">Create Posts</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <form wire:submit.prevent="store">
              <div class="row">
                <div class="col-md-9">
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Write Your Post</h3>
                    </div>
                    <div class="card-body">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input id="" name="" type="text" class="form-control @error('title') is-invalid @enderror" 
                        wire:model.lazy="title" placeholder="Title" value="{{ old('title') }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <!-- /.form-group -->
                      <!-- text input -->
                      <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="" name="" type="text" class="form-control @error('slug') is-invalid @enderror" 
                        wire:model.lazy="slug" value="{{ old('slug') }}" readonly >
                        @error('slug')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <!-- /.form-group -->
                      <!-- textarea -->
                      <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <textarea name="" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="4" 
                        wire:model.lazy="excerpt" placeholder="Excerpt" >{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <!-- /.form-group -->
                      <!-- textarea -->
                      <div class="form-group">
                        <label for="body">Content</label>
                        <textarea name="" id="body" class="form-control @error('body') is-invalid @enderror"
                        wire:model.lazy="body" placeholder="Content" >{{ old('body') }}</textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col (left) -->
                <div class="col-md-3">
                  <!-- Category -->
                  <div class="card card-secondary">
                    <div class="card-header">
                      <h3 class="card-title">Category</h3>
                    </div>
                    <div class="card-body">
                      <!-- Minimal style -->
                      <div class="form-group">
                        <select class="select2 form-control @error('category_id') is-invalid @enderror"
                        wire:model.lazy="category_id">
                        <option value="">-- select category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="#" style="decortion:none">Create Category</a>
                    </div>
                  </div>
                  <!-- /.card -->
                  <!-- Tags -->
                  <div class="card card-secondary">
                    <div class="card-header">
                      <h3 class="card-title">Tags</h3>
                    </div>
                    <div class="card-body">
                      <!-- Minimal style -->
                      <div class="form-group">
                        {{-- <label for="title">Title</label> --}}
                        {{--  {!! Form::text('post_tags', null,['class' => 'form-control']) !!}  --}}
                        {{--  <input id="post_tags" name="post_tags" type="text" class="form-control @error('post_tags') is-invalid @enderror" placeholder="Title">  --}}
                        <div class="form-group">
                            <label>Tags</label>
                            {{--  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                              <option>Alabama</option>
                              <option>Alaska</option>
                              <option>California</option>
                              <option>Delaware</option>
                              <option>Tennessee</option>
                              <option>Texas</option>
                              <option>Washington</option>
                            </select>  --}}
                          </div>
                        @error('post_tags')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <!-- Feature Image -->
                  <div class="card card-secondary">
                    <div class="card-header">
                      <h3 class="card-title">Feature Image</h3>
                    </div>
                    <div class="card-body">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail" style="width: 180px; height: 130px;">
                          <img class="img-fluid" src="{{ asset('/uploads/images/no_image.png') }}"  alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                        <div>
                          <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                          <input type="file" class="@error('image') is-invalid @enderror" name="" wire:model.lazy="image"></span>
                          <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                  <!-- Publish -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Publish</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Publish Date</label>
                        <div class="form-group">
                          <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input @error('published_at') is-invalid @enderror" data-target="#datetimepicker" 
                            wire:model.lazy="published_at" placeholder="Y-m-d H:i:s" name="" id="published_at"/>
                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            @error('published_at')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button id="draft-btn" type="submit" class="btn btn-default">Save Draft</button>
                      <button type="submit" class="btn btn-primary float-right">Publish</button>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                
                <!-- /.col (right) -->
                
              </div>
            </form>
            <!-- /.row -->
          </div>
        </section>
        <!-- /.content -->
      </div>
      
</div>
