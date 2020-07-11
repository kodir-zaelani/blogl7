<div>
    <div class="row">
        <div class="col">
            @if (session('message'))
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Alert!</h5>
                {{ session('message') }}
            </div>
            @elseif(session('error-message'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Alert!</h5>
                {{ session('message') }}
            </div>
            @elseif(session('trash-message'))
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Alert!</h5>
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>
</div>
