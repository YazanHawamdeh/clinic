@include('admin.forms.index')

<form class="row mx-4" action="{{ route('add_related_link') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="col-md-12">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Add Related Link</h3>
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
                    <a href="#">Link</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Related Link</a>
                </li>
            </ul>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-success my-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

        <!-- Container for Related Links Slider -->
        <div id="related-link-container">
            <div class="card related-link-slider">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title[]" class="form-control" required placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" id="link" name="link[]" class="form-control" required placeholder="Enter Link">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description[]" class="form-control" rows="5" required placeholder="Enter Description"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image[]" class="form-control-file" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button to add new slide -->
        <button type="button" class="btn btn-secondary my-3" id="addSlideBtn">Add New Slide</button>

        <div class="card-action">
            <button class="btn btn-primary" type="submit">Add Related Link</button>
            <button class="btn btn-danger" type="reset">Cancel</button>
        </div>
    </div>
</form>

<script src="assets/js/dashboard.js"></script>
<script src="multyselect/js/popper.js"></script>
<script src="multyselect/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="multyselect/js/main.js"></script>

<script>
    document.getElementById('addSlideBtn').addEventListener('click', function () {
        // Clone the existing related-link-slider
        var container = document.getElementById('related-link-container');
        var newSlide = container.querySelector('.related-link-slider').cloneNode(true);

        // Clear the input fields in the new slide
        newSlide.querySelectorAll('input, textarea').forEach(function (input) {
            input.value = '';
        });

        // Check if the remove button already exists, if not, add it
        if (!newSlide.querySelector('.removeSlideBtn')) {
            var removeButton = document.createElement('button');
            removeButton.classList.add('btn', 'btn-danger', 'removeSlideBtn', 'mt-2');
            removeButton.type = 'button';
            removeButton.innerText = 'Remove Slide';
            removeButton.addEventListener('click', function () {
                newSlide.remove();
            });

            // Add the remove button to the new slide
            newSlide.querySelector('.card-body').appendChild(removeButton);
        }

        // Append the new slide to the container
        container.appendChild(newSlide);
    });

    // No remove button on the first slide
</script>
