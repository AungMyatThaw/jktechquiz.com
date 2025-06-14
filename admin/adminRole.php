<?php
session_start();
require_once '../config.php';

require_once "admin_auth_check.php";
$isLoggedIn = isset($_SESSION['id']);


$perPage = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;

// Fetch admin users with LIMIT and OFFSET
$sql = "SELECT id, name, email, role FROM admins LIMIT $perPage OFFSET $offset";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error: " . htmlspecialchars(mysqli_error($conn)));
}

// Count total rows
$sqlCount = "SELECT COUNT(*) AS total FROM admins";
$countResult = mysqli_query($conn, $sqlCount);
$totalRows = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalRows / $perPage);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../main.css" />
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light sticky-top fixed-top">
    <div class="container">
        <a class="navbar-brand me-auto me-sm-auto nav-responsive" href="../index.php"><img src="img/1-removebg-preview.png" width="50" alt="Logo"></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-2"><a class="nav-link active" href="adminRole.php"><i class="fa-solid fa-user-tie"></i> Admin</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="index.php"><i class="fa-solid fa-user"></i> User</a></li>  
                <li class="nav-item px-2"><a class="nav-link" href="comment.php"><i class="fa-solid fa-comment"></i> Comment</a></li>
            </ul>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4 ">
    <h3>Admin Management</h3>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="table table-striped table-bordered mb-5 px-5 mx-auto text-center border-dark table-hover">
                <thead>
                    <tr>
                        <th class="admin_bg_color text-center">No</th>
                        <th class="admin_bg_color text-center">Admin Name</th>
                        <th class="admin_bg_color text-center">Email</th>
                        <th class="admin_bg_color text-center">Role</th>
                        <th class="admin_bg_color text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rowNumber = $offset + 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr id="row<?= $row['id'] ?>">
                            <td class="text-center"><?= $rowNumber++ ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['name']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['email']) ?></td>
                            <td class="text-center">
                                <select class="form-select roleSelect"
                                        data-id="<?= $row['id'] ?>"
                                        data-previous="<?= $row['role'] ?>"
                                        <?= ($row['email'] == 'admin@gmail.com') ? 'disabled' : '' ?>>
                                    <option value="user" <?= ($row['role'] == "user") ? 'selected' : '' ?>>User</option>
                                    <option value="admin" <?= ($row['role'] == "admin") ? 'selected' : '' ?>>Admin</option>
                                </select>
                            </td>
                            <td  class="text-center">
                                <button class="btn btn-danger"
                                        onclick="confirmDelete(<?= $row['id'] ?>)"
                                        <?= ($row['id'] == 1) ? 'disabled' : '' ?>>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>"><b>Previous</b></a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="admin_bg_color page-link active" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>"><b>Next</b></a>
                    </li>
                </ul>
            </nav>
        <?php else: ?>
            <p class="text-center">No admins found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteAdminModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Are you sure you want to delete this admin?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="manageAdmin/deleteAdmin.php">
                    <input type="hidden" name="id" id="deleteAdminId">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Role Change Modal -->
<div class="modal fade" id="confirmRoleChangeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Role Change</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Are you sure you want to change this person's role?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelRoleChange" data-bs-dismiss="modal">Cancel</button>
                <button class="btn admin_btn" id="confirmRoleChange">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div class="toast bg-success text-white" id="toastMessage" style="position: absolute; top: 20px; right: 20px; display: none;">
    <div class="toast-body"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  let selectedUserId = null;
  let selectedRole = null;
  let previousRole = null;
  let roleSelectElement = null;

  // Listen for changes on all selects with class 'roleSelect'
  document.querySelectorAll('.roleSelect').forEach(select => {
    select.addEventListener('change', function() {
      selectedUserId = this.dataset.id;
      selectedRole = this.value;
      previousRole = this.dataset.previous;
      roleSelectElement = this;

      // Show the Bootstrap confirmation modal
      let confirmModal = new bootstrap.Modal(document.getElementById('confirmRoleChangeModal'));
      confirmModal.show();
    });
  });

  // Confirm button click
  document.getElementById('confirmRoleChange').addEventListener('click', function() {
    const formData = new URLSearchParams();
    formData.append('id', selectedUserId);
    formData.append('role', selectedRole);

    fetch('manageAdmin/changeRole.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: formData.toString()
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        showToast('success', data.message);
        roleSelectElement.dataset.previous = selectedRole;
      } else {
        showToast('danger', data.error);
        roleSelectElement.value = previousRole; // revert selection
      }
      // Hide modal
      let confirmModalEl = document.getElementById('confirmRoleChangeModal');
      bootstrap.Modal.getInstance(confirmModalEl).hide();
    })
    .catch(() => {
      showToast('danger', 'Error updating role. Please try again.');
      roleSelectElement.value = previousRole;
      let confirmModalEl = document.getElementById('confirmRoleChangeModal');
      bootstrap.Modal.getInstance(confirmModalEl).hide();
    });
  });

  // Cancel button click - revert selection
  document.getElementById('cancelRoleChange').addEventListener('click', function() {
    if (roleSelectElement) {
      roleSelectElement.value = previousRole;
    }
  });

  // Toast notification helper
  function showToast(type, message) {
    const toastEl = document.getElementById('toastMessage');
    toastEl.className = 'toast bg-' + type + ' text-white';
    toastEl.querySelector('.toast-body').textContent = message;
    toastEl.style.display = 'block';

    let toast = new bootstrap.Toast(toastEl);
    toast.show();
  }
});
</script>


</body>
</html>
