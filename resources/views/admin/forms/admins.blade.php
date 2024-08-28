

@include('admin.forms.index')

<div class="page-inner">

<div class="page-header">
  <h3 class="fw-bold mb-3">Admin Managment</h3>
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
          <a href="#">Access</a>
      </li>
      <li class="separator">
          <i class="icon-arrow-right"></i>
      </li>
      <li class="nav-item">
          <a href="#">Admin Managment</a>
      </li>
  </ul>
</div>



<div class="col-md-12">
  <div class="card">
      <div class="card-body">
          <!-- Modal -->
          <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-body">
                          <form id="addItemForm" method="POST" action="{{ url('/admins') }}" enctype="multipart/form-data">
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
                                          <label>Email</label>
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
                                  {{-- <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Images</label>
                                          <input type="file" id="addItemImages" name="images[]" class="form-control-file" multiple accept="image/*">
                                      </div>
                                  </div> --}}
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
                          <th>Email</th>

                          <th style="width: 10%">Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Email</th>

                          <th>Action</th>

                      </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($users as $user)
                          <tr>
                              <td>{{$user->id}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
 

                              <td>
                                  <div class="form-button-action">
                                    <button type="button" 
                                    data-toggle="modal" 
                                    data-target="#editUserModal" 
                                    data-id="{{ $user->id }}" 
                                    data-name="{{ $user->name }}"
                                    data-email="{{ $user->email }}" 
 
   
                                    {{-- data-images="{{ json_encode($item->images->pluck('image_url')) }}"  --}}
                                    class="btn btn-link btn-primary">
                                    <i class="fa fa-edit"></i>
                                    </button>
                                      <a href="{{ url('delete_user', $user->id) }}">
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


  <!-- Edit Item Modal -->
  <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="POST"  action="{{ url('/updateUser') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editUserId" name="id">
  
                    <div class="form-group">
                        <label for="editUserName">Name</label>
                        <input type="text" name="name" id="editUserName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editUserEmail">email</label>
                        <textarea name="email" id="editUserEmail" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
  </div>

<script>
  $('#editUserModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var name = button.data('name');
      var email = button.data('email');
      // var images = JSON.parse(button.attr('data-images'));
  
      var modal = $(this);
      modal.find('#editUserId').val(id);
      modal.find('#editUserName').val(name);
      modal.find('#editUserEmail').val(email);


      modal.find('#editUserForm').attr('action', '/updateUser/' + id); // Ensure this URL is correct

  
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