@include('admin.forms.index')

    <form class="row mx-4" action="{{ route('updateBanner',  $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="col-md-12">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Update Banner</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Banner</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Update Banner</a>
                </li>
            </ul>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-success my-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{ old('title', $banner->title) }}" required />
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Enter Description" name="description" rows="5" required>{{ old('description', $banner->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>First Image</label>
                            <input type="file" name="image_url_1" class="form-control-file" accept="image/*">
                            @if($banner->image_url_1)
                                <img src="{{ asset('storage/' . $banner->image_url_1) }}" alt="First Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Second Image</label>
                            <input type="file" name="image_url_2" class="form-control-file" accept="image/*">
                            @if($banner->image_url_2)
                                <img src="{{ asset('storage/' . $banner->image_url_2) }}" alt="Second Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-action">
                <button class="btn btn-success" type="submit">Update</button>
                <button class="btn btn-danger" type="reset">Cancel</button>
            </div>
        </div>
    </div>
</form>
