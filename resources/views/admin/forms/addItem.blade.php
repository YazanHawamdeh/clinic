@include('admin.forms.index')

<form class="row mx-4" action="{{ url('/add_item') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Add Item</h3>
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
                    <a href="#">Item</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Item</a>
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
                            <label>Price</label>
                            <input type="number" class="form-control" placeholder="Enter Price" name="price" required />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Points</label>
                            <input type="number" class="form-control" placeholder="Enter Points" name="points" required />
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Enter Description" name="description" rows="5" required></textarea>
                        </div>
                    </div>
                    {{-- <p id="dollarValue">Dollar Value: $0.00</p> --}}

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <input type="file" id="images" name="images[]" class="form-control-file" multiple accept="image/*">
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
