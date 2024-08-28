
@include('admin.forms.index')



      <div class="page-inner">
        <div class="page-header">
          <h3 class="fw-bold mb-3">Items</h3>
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
                  <a href="#">Items</a>
              </li>
              <li class="separator">
                  <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item">
                  <a href="#">All Items</a>
              </li>
          </ul>
        </div>
        <div class="row">

            <form action="{{ route('updateConversionRate') }}" method="POST">
                @csrf
                <label for="conversion_rate">Conversion Rate:</label>
                <input class="form-control w-25" type="number" name="conversion_rate" id="conversion_rate" required>
                <button type="submit" class="btn btn-primary">Update Conversion Rate</button>

            </form>

            @if(session('status'))
            <p>{{ session('status') }}</p>
            @endif

          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <!-- Modal -->
                      <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-body">
                                      <form id="addItemForm" method="POST" action="{{ url('/add_item') }}" enctype="multipart/form-data">
                                          @csrf
                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="form-group form-group-default">
                                                      <label>Name</label>
                                                      <input id="addItemName" name="name" type="text" class="form-control" placeholder="fill name" required/>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 pe-0">
                                                  <div class="form-group form-group-default">
                                                      <label>Price</label>
                                                      <input id="addItemPrice" name="price" type="number" class="form-control" placeholder="fill price" required/>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 pe-0">
                                                  <div class="form-group form-group-default">
                                                      <label>Points</label>
                                                      <input id="addItemPoints" name="points" type="number" class="form-control" placeholder="fill points" required/>
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label>Description</label>
                                                      <textarea id="addItemDescription" name="description" class="form-control" placeholder="fill description" required></textarea>
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label>Images</label>
                                                      <input type="file" id="addItemImages" name="images[]" class="form-control-file" multiple accept="image/*">
                                                  </div>
                                              </div> 
                                          </div>
                                          <button type="submit" class="btn btn-primary mt-4">Add Item</button>
                                      </form>
                                  </div>
                                  <div class="modal-footer border-0">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">
                                          Close
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
  
                      <div class="table-responsive">
                          <table id="add-row" class="display table table-striped table-hover">
                              <thead>
                                  <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Description</th>
                                      <th>Price</th>
                                      <th>Points</th>
                                      <th>Points in Doller</th>
                                      <th>Images</th>
                                      <th style="width: 10%">Action</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Description</th>
                                      <th>Price</th>
                                      <th>Points</th>
                                      <th>Points in Doller</th>
                                      <th>Images</th>                                   
                                      <th>Action</th>

                                  </tr>
                              </tfoot>
                              <tbody>
                                  @foreach ($items as $item)
                                      <tr>
                                          <td>{{$item->id}}</td>
                                          <td>{{$item->name}}</td>
                                          <td>{{$item->description}}</td>
                                          <td>{{$item->price}}</td>
                                          <td>{{$item->points}}</td>
                                          <td>
                                            {{-- {{ $item->price }} - --}} {{ $item->points }} points ({{ $item->points / $conversionRate }} dollars)

                                          </td>
                                           <td>
                                            @foreach ($item->images as $image)
                                            <img src="{{ asset('storage/images/' . basename($image->image_url)) }}" alt="Image" style="width: 50px; height: 50px;"/>
                                            @endforeach
                                          </td> 
                                          <td>
                                              <div class="form-button-action">
                                                <button type="button" 
                                                data-toggle="modal" 
                                                data-target="#editItemModal" 
                                                data-id="{{ $item->id }}" 
                                                data-name="{{ $item->name }}" 
                                                data-description="{{ $item->description }}" 
                                                data-price="{{ $item->price }}"
                                                data-points="{{ $item->points }}"
                                                data-images="{{ json_encode($item->images->pluck('image_url')) }}"  
                                                class="btn btn-link btn-primary">
                                                <i class="fa fa-edit"></i>
                                                </button>
                                                  <a href="{{ url('delete_item', $item->id) }}">
                                                      <button type="button" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Remove">
                                                          <i class="fa fa-times"></i>
                                                      </button>
                                                  </a>
                                              </div>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
  
  <!-- Edit Item Modal -->
  <div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editItemForm" method="POST"  action="{{ url('/updateItem') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editItemId" name="id">
  
                    <div class="form-group">
                        <label for="editItemName">Name</label>
                        <input type="text" name="name" id="editItemName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editItemDescription">Description</label>
                        <textarea name="description" id="editItemDescription" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editItemPrice">Price</label>
                        <input type="number" name="price" id="editItemPrice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editItemPoints">Points</label>
                        <input type="number" name="points" id="editItemPoints" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editItemImages">Images</label>
                        <input type="file" id="editItemImages" name="images[]" class="form-control-file" multiple accept="image/*">
                    </div> -
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
  </div>
  


{{--=======================================================================Model for edit blog  --}}

<script>
    $('#editItemModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var description = button.data('description');
        var price = button.data('price');
        var points = button.data('points');
        var images = JSON.parse(button.attr('data-images'));
    
        var modal = $(this);
        modal.find('#editItemId').val(id);
        modal.find('#editItemName').val(name);
        modal.find('#editItemDescription').val(description);
        modal.find('#editItemPrice').val(price);
        modal.find('#editItemPoints').val(points);
        // modal.find('#editItemImages').val(images);

        modal.find('#editItemForm').attr('action', '/updateItem/' + id); // Ensure this URL is correct

    
        // Handle images if needed
        // Example: Display images or handle image updates if necessary
        // modal.find('#editItemImages').val(images); // This might need custom handling based on your implementation
    });
    </script>
    


    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>


<!-- Add these lines in your main layout file -->
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}