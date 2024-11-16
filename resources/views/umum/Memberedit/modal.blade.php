<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Member</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-color: #c9a12c;">

    <!-- Tombol untuk UserMember -->
    <button class="btn btn-dark" onclick="showUserModal({{ $id_member }})">UserMember</button>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Edit UserMember</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>ID Member: <span id="memberId"></span></p>
                    <a id="editLink" href="" class="btn btn-primary">Edit Member</a>

                    <!-- Form logout -->
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Fungsi untuk menampilkan modal dengan ID member
        function showUserModal(id_member) {
            document.getElementById('memberId').textContent = id_member;

            // Set link edit berdasarkan ID member dan route `member.edit`
            document.getElementById('editLink').href = `/member/${id_member}/edit`;

            // Tampilkan modal
            $('#userModal').modal('show');
        }
    </script>

</body>

</html>
