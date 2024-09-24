@include('admin.forms.index')

<form class="row mx-4" action="{{ url('/add_user') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Add New User</h3>
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
                    <a href="#">User</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add User</a>
                </li>
            </ul>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-success my-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" required />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" required />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password" required />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Enter Address" name="address" />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>User Type</label>
                            <select class="form-control" name="userType">
                                <option value="1">Admin</option>
                                <option value="2" selected>Standard User</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="form-control-file" name="profile_picture" accept="image/*">
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
