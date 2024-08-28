@include('admin.forms.index')

<form class="container mt-4" action="{{ route('update_about_us', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST') <!-- Use PUT for updates if required -->

    <div class="page-header mb-4">
        <h3 class="fw-bold">Update About Us</h3>
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
                <a href="#">About Us</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Update About Us</a>
            </li>
        </ul>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <!-- Title -->
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" class="form-control" placeholder="Enter title" name="title" value="{{ old('title', $aboutUs->title) }}" required />
                    </div>
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" class="form-control" placeholder="Enter Description" name="description" rows="5" required>{{ old('description', $aboutUs->description) }}</textarea>
                    </div>
                </div>

                <!-- Main Image -->
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="main_image" class="form-label">Main Image</label>
                        <input type="file" id="main_image" name="images[]" class="form-control-file" accept="image/*">
                        @if($aboutUs->image)
                            <img src="{{ Storage::url($aboutUs->image) }}" alt="Main Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @endif
                    </div>
                </div>

                <!-- Box 1 -->
                <div class="col-md-12 mb-4">
                    <h4>Box 1</h4>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="titleBox1" class="form-label">Title Box 1</label>
                                <input type="text" id="titleBox1" class="form-control" placeholder="Enter title for Box 1" name="titleBox1" value="{{ old('titleBox1', $aboutUs->title_box_1) }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="box1_image" class="form-label">Image Box 1</label>
                                <input type="file" id="box1_image" name="images[]" class="form-control-file" accept="image/*">
                                @if($aboutUs->image_box_1)
                                    <img src="{{ Storage::url($aboutUs->image_box_1) }}" alt="Box 1 Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="descriptionBox1" class="form-label">Description Box 1</label>
                                <textarea id="descriptionBox1" class="form-control" placeholder="Enter Description for Box 1" name="descriptionBox1" rows="5">{{ old('descriptionBox1', $aboutUs->description_box_1) }}</textarea>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Box 2 -->
                <div class="col-md-12 mb-4">
                    <h4>Box 2</h4>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="titleBox2" class="form-label">Title Box 2</label>
                                <input type="text" id="titleBox2" class="form-control" placeholder="Enter title for Box 2" name="titleBox2" value="{{ old('titleBox2', $aboutUs->title_box_2) }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="box2_image" class="form-label">Image Box 2</label>
                                <input type="file" id="box2_image" name="images[]" class="form-control-file" accept="image/*">
                                @if($aboutUs->image_box_2)
                                    <img src="{{ Storage::url($aboutUs->image_box_2) }}" alt="Box 2 Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="descriptionBox2" class="form-label">Description Box 2</label>
                                <textarea id="descriptionBox2" class="form-control" placeholder="Enter Description for Box 2" name="descriptionBox2" rows="5">{{ old('descriptionBox2', $aboutUs->description_box_2) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="col-md-12 mb-4">
                    <h4>Box 3</h4>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="titleBox3" class="form-label">Title Box 3</label>
                                <input type="text" id="titleBox3" class="form-control" placeholder="Enter title for Box 3" name="titleBox3" value="{{ old('titleBox3', $aboutUs->title_box_3) }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="box3_image" class="form-label">Image Box 3</label>
                                <input type="file" id="box3_image" name="images[]" class="form-control-file" accept="image/*">
                                @if($aboutUs->image_box_3)
                                    <img src="{{ Storage::url($aboutUs->image_box_3) }}" alt="Box 3 Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="descriptionBox3" class="form-label">Description Box 3</label>
                                <textarea id="descriptionBox3" class="form-control" placeholder="Enter Description for Box 3" name="descriptionBox3" rows="5">{{ old('descriptionBox3', $aboutUs->description_box_3) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-success me-2" type="submit">Update</button>
            <button class="btn btn-danger" type="reset">Cancel</button>
        </div>
    </div>
</form>

<script src="assets/js/dashboard.js"></script>
<script src="multyselect/js/popper.js"></script>
<script src="multyselect/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="multyselect/js/main.js"></script>
