<div>
    @push('page-style')
    <link rel="stylesheet" href="/assets/adminlte30/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/adminlte30/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
            <form wire:submit.prevent="store" id="post-form">
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
                        wire:model.lazy="title"  placeholder="Title" value="{{ old('title') }}">
                        @error('title')
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
                        wire:model.lazy="excerpt"  placeholder="Excerpt" >{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <!-- /.form-group -->
                      <!-- textarea body -->
                      <div class="form-group">
                        <label for="body">Content</label>
                        <textarea name="" id="body" class="form-control @error('body') is-invalid @enderror"
                        wire:model.lazy="body"  placeholder="Content" >{{ old('body') }}</textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <!-- /.form-group body-->
                      <div class="form-group">
                        <label for="post_tags">Tags</label>
                        <select class="select2 form-control @error('post_tags') is-invalid @enderror"
                        wire:model="post_tags"  multiple="multiple" data-placeholder="Select multiple Tag" style="width: 100%;">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                        </select>
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
                        <select class="select2bs4 form-control @error('category_id') is-invalid @enderror"
                        wire:model="category_id" data-placeholder="Select a Category" style="width: 100%;">
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
                  <!-- Feature Image -->
                  <div class="card card-secondary">
                    <div class="card-header">
                      <h3 class="card-title">Feature Image</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                            @if($image)
                            <div class="text-center">
                                <img src="{{ $image->temporaryUrl() }}" alt="" style="height: 150px;width:150px;object-fit:cover"
                                    class="img-thumbnail">
                                    <p>PREVIEW</p>
                            </div>
                            @else
                                <div class="text-center">
                                <img src="{{ asset('/uploads/images/no_image.png') }}" alt="" style="height: 150px;width:150px;object-fit:cover"
                                    class="img-thumbnail">
                                    <p></p>
                                </div>
                            @endif
                            
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" id="image" class="form-control" wire:model="image"
                                    >
                                @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                      </div>
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
                            <input type="text" class="published_at form-control datetimepicker-input @error('published_at') is-invalid @enderror" data-target="#datetimepicker" 
                            wire:model.lazy="published_at" placeholder="Y-m-d H:i:s"  id="published_at"/>
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
      @push('footer-script')
      <!-- Select2 -->
      <script src="/assets/adminlte30/plugins/select2/js/select2.full.min.js"></script>
      <!-- InputMask -->
      <script src="/assets/adminlte30/plugins/moment/moment.min.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="/assets/adminlte30/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <script src="/assets/ckeditor/ckeditor.js"></script> 
      <script>
        $(document).ready(function(){
          //Initialize Select2 Elements
          $('.select2').select2()
          
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          })

          // config CKS Editor With Laravel/FileManager
          CKEDITOR.replace('excerpt', {
            height: 150,
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
          });

          // config CKS Editor With Laravel/FileManager
          CKEDITOR.replace('body', {
            height: 400,
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
          });
           //DateTimepicker
          $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            icons: {
                time: 'far fa-clock',
                date: 'far fa-calendar',
                up: "fas fa-arrow-up",
                down: "fas fa-arrow-down"
            }
          });

          //Save Draft        
          $('#draft-btn').click(function(e) {
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
          });
        })
      </script> 
      @endpush
</div>
