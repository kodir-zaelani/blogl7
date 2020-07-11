<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Tag</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <input type="hidden" name="" wire:model="tagId">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="" name="" type="text" class="form-control @error('name') is-invalid @enderror" 
                            wire:model.lazy="name" placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
