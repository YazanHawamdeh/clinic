@include('admin.forms.index')

<form class="row mx-4" action="{{ route('update_related_link') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="col-md-12">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Update Related Links</h3>
            <ul class="breadcrumbs mb-3">
                <!-- Breadcrumbs content -->
            </ul>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-success my-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
        @endif

        @foreach($relatedLinks as $relatedLink)
        <div class="card" id="card-{{ $relatedLink->id }}">
            <div class="card-body">
                <div class="row">
                    <input type="hidden" name="relatedLinks[{{ $relatedLink->id }}][id]" value="{{ $relatedLink->id }}">
                    
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter title" name="relatedLinks[{{ $relatedLink->id }}][title]" value="{{ old('relatedLinks.' . $relatedLink->id . '.title', $relatedLink->title) }}" required />
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" placeholder="Enter link" name="relatedLinks[{{ $relatedLink->id }}][link]" value="{{ old('relatedLinks.' . $relatedLink->id . '.link', $relatedLink->link) }}" required />
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" placeholder="Enter Description" name="relatedLinks[{{ $relatedLink->id }}][description]" rows="5" required>{{ old('relatedLinks.' . $relatedLink->id . '.description', $relatedLink->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="relatedLinks[{{ $relatedLink->id }}][image]" class="form-control-file" accept="image/*">
                            @if($relatedLink->image)
                                <img src="{{ asset('storage/' . $relatedLink->image) }}" alt="Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-12">
                        <button type="button" class="btn btn-danger" onclick="deleteCard({{ $relatedLink->id }})">Remove</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="card-action">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </div>
</form>

<script>
    function deleteCard(id) {
        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with AJAX request to delete
                $.ajax({
                    url: '/related-link/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the card from the UI
                            document.getElementById('card-' + id).remove();
                            
                            // Show success message
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message,
                                'error'
                            );
                        }
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'Could not delete related link.',
                            'error'
                        );
                    }
                });
            }
        })
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
