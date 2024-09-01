@include('admin.forms.index')

<form class="row mx-4" action="{{ route('update_related_link', $relatedLink->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="col-md-12">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Update Related Link</h3>
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
                    <a href="#">Related Links</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Update Related Link</a>
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
                            <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{ old('title', $relatedLink->title) }}" required />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" placeholder="Enter link" name="link" value="{{ old('link', $relatedLink->link) }}" required />
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Enter Description" name="description" rows="5" required>{{ old('description', $relatedLink->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control-file" accept="image/*">
                            @if($relatedLink->image)
                                <img src="{{ asset('storage/' . $relatedLink->image) }}" alt="Image" class="img-thumbnail mt-2" style="max-width: 200px;">
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
