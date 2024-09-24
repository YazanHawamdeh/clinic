@include('admin.forms.index')

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Admin Management</h3>
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
                <a href="#">Admin Management</a>
            </li>
        </ul>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Modal for Add Item -->
                <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form id="addUserForm" method="POST" action="{{ url('/admins') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- Name Field -->
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name</label>
                                                <input id="addUserName" name="name" type="text" class="form-control" placeholder="Enter Name" required/>
                                            </div>
                                        </div>
                                        <!-- Email Field -->
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input id="addUserEmail" name="email" type="email" class="form-control" placeholder="Enter Email" required/>
                                            </div>
                                        </div>
                                        <!-- Phone Field -->
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Phone</label>
                                                <input id="addUserPhone" name="phone" type="text" class="form-control" placeholder="Enter Phone" required/>
                                            </div>
                                        </div>
                                        <!-- Password Field -->
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Password</label>
                                                <input id="addUserPassword" name="password" type="password" class="form-control" placeholder="Enter Password" required/>
                                            </div>
                                        </div>
                                        <!-- Address Field -->
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Address</label>
                                                <input id="addUserAddress" name="address" type="text" class="form-control" placeholder="Enter Address" required/>
                                            </div>
                                        </div>
                                        <!-- UserType Field -->
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>User Type</label>
                                                <select id="addUserType" name="userType" class="form-control">
                                                    <option value="1">Admin</option>
                                                    <option value="2">user</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Add User</button>
                                </form>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="user-table" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->userType }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-toggle="modal" data-target="#editUserModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-phone="{{ $user->phone }}" data-usertype="{{ $user->userType }}" class="btn btn-link btn-primary">
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

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="POST" action="{{ url('/updateUser') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editUserId" name="id">
                    <div class="form-group">
                        <label for="editUserName">Name</label>
                        <input type="text" name="name" id="editUserName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editUserEmail">Email</label>
                        <input type="email" name="email" id="editUserEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editUserPhone">Phone</label>
                        <input type="text" name="phone" id="editUserPhone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editUserType">User Type</label>
                        <select name="userType" id="editUserType" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Standard User</option>
                        </select>
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
        var phone = button.data('phone');
        var userType = button.data('userType');
        
        var modal = $(this);
        modal.find('#editUserId').val(id);
        modal.find('#editUserName').val(name);
        modal.find('#editUserEmail').val(email);
        modal.find('#editUserPhone').val(phone);
        modal.find('#editUserType').val(userType);
        
        modal.find('#editUserForm').attr('action', '/updateUser/' + id);
    });
</script>
