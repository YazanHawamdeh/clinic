@include('admin.forms.index')

<form class="row mx-4" action="{{ url('/add_aboutUs') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Add About Us</h3>
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
                    <a href="#">Add About Us</a>
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
                    <!-- Main Title -->
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter title" name="title" required />
                        </div>
                    </div>

                    <!-- Main Description -->
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Enter Description" name="description" rows="5" required></textarea>
                        </div>
                    </div>

                    <!-- Main Image -->
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Main Image</label>
                            <input type="file" name="images[]" class="form-control-file" accept="image/*" required>
                        </div>
                    </div>

                    <!-- Box 1 -->
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Image Box 1</label>
                            <input type="file" name="images[]" class="form-control-file" accept="image/*" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Title Box 1</label>
                            <input type="text" class="form-control" placeholder="Enter title for Box 1" name="titleBox1" required />
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Description Box 1</label>
                            <textarea class="form-control" placeholder="Enter Description for Box 1" name="descriptionBox1" rows="5" required></textarea>
                        </div>
                    </div>

                    <!-- Box 2 -->
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Image Box 2</label>
                            <input type="file" name="images[]" class="form-control-file" accept="image/*" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Title Box 2</label>
                            <input type="text" class="form-control" placeholder="Enter title for Box 2" name="titleBox2" required />
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Description Box 2</label>
                            <textarea class="form-control" placeholder="Enter Description for Box 2" name="descriptionBox2" rows="5" required></textarea>
                        </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Image Box 3</label>
                            <input type="file" name="images[]" class="form-control-file" accept="image/*" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Title Box 3</label>
                            <input type="text" class="form-control" placeholder="Enter title for Box 3" name="titleBox3" required />
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Description Box 3</label>
                            <textarea class="form-control" placeholder="Enter Description for Box 3" name="descriptionBox3" rows="5" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-action">
                <button class="btn btn-success" type="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Cancel</button>
            </div>
        </div>
    </div>
</form>

<script src="assets/js/dashboard.js"></script>
<script src="multyselect/js/popper.js"></script>
<script src="multyselect/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="multyselect/js/main.js"></script>
