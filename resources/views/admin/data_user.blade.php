<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data User</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" />

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="images/luckycat_logo.jpg" alt="Lucky Cat Logo" class="rounded-circle" />
        <h3 class="mt-2">Luckycat <span style="color: #7c43f8;">Supply</span></h3>
        <div class="sidebar-menu">
            <a href="/admin/index"><i class="fas fa-chart-line text-white mr-2"></i> Dashboard</a>
            <a href="/users"><i class="fas fa-users text-white mr-2"></i> Data User</a>
            <a href="/produk"><i class="fas fa-boxes text-white mr-2"></i> Data Produk</a>
            <a href="/transaksi"><i class="fas fa-money-bill-wave text-white mr-2"></i> Data Transaksi</a>
            <form method="POST" class="pt-4 mx-5" action="{{ route('logout') }}">
                @csrf
                <input type="submit" value="Logout" class="mr-2">
            </form>
        </div>
    </div>

    <main>
        <div class="content" style="margin-left: 250px; padding: 30px 20px">
            <h3>Data User</h3>
            <div class="usertabel pt-2">
                <table id="users" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-btn" 
                                            data-toggle="modal" 
                                            data-target="#editModal" 
                                            data-id="{{ $user->id }}" 
                                            data-username="{{ $user->name }}" 
                                            data-email="{{ $user->email }}" 
                                            data-password="{{ $user->password }}" 
                                            data-phone="{{ $user->phone }}" 
                                            data-address="{{ $user->address }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="POST" action="{{ route('users.update', 'user') }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label for="edit-username">Username</label>
                            <input type="text" class="form-control" id="edit-username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-email">Email</label>
                            <input type="email" class="form-control" id="edit-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-password">Password</label>
                            <input type="password" class="form-control" id="edit-password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-phone">Phone Number</label>
                            <input type="text" class="form-control" id="edit-phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-address">Address</label>
                            <input type="text" class="form-control" id="edit-address" name="address" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users').DataTable();

            $('.edit-btn').click(function() {
                const userId = $(this).data('id');
                const username = $(this).data('username');
                const email = $(this).data('email');
                const password = $(this).data('password');
                const phone = $(this).data('phone');
                const address = $(this).data('address');

                $('#edit-id').val(userId);
                $('#edit-username').val(username);
                $('#edit-email').val(email);
                $('#edit-password').val(password);
                $('#edit-phone').val(phone);
                $('#edit-address').val(address);

                $('#editForm').attr('action', `/users/${userId}`);
            });

            $('.delete-btn').click(function() {
                const userId = $(this).data('id');
                $('#deleteForm').attr('action', `/users/${userId}`);
            });
        });
    </script>
</body>
</html>
