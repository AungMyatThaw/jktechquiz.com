<?php
require_once '../config.php';

// Check if the user is logged in
require_once "admin_auth_check.php";
$isLoggedIn = isset($_SESSION['id']);


$perPage = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $perPage;

$where = "";
$params = [];
$types = "";

if (!empty($_GET['search'])) {
    $where .= " WHERE username LIKE ? OR email LIKE ?";
    $searchTerm = "%" . $_GET['search'] . "%";
    $params[] = $searchTerm;
    $params[] = $searchTerm;
    $types .= "ss";
}

// Sorting logic
$order = "";
if (!empty($_GET['sort'])) {
    switch ($_GET['sort']) {
        case "username_asc":
            $order = " ORDER BY username ASC";
            break;
        case "username_desc":
            $order = " ORDER BY username DESC";
            break;
        case "email_asc":
            $order = " ORDER BY email ASC";
            break;
        case "email_desc":
            $order = " ORDER BY email DESC";
            break;
    }
}

$sql = "SELECT id, username, email,
        DATE_FORMAT(last_login, '%d.%m.%Y (%h:%i %p)') AS formatted_last_login,
        COALESCE(DATEDIFF(NOW(), last_login), 'None') AS days_since_last_login,
        IF(DATEDIFF(NOW(), last_login) > 180, 'YES', 'NO') AS expired_account
        FROM users $where $order LIMIT ? OFFSET ?";

$params[] = $perPage;
$params[] = $offset;
$types .= "ii";

$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) die("Prepare failed: " . mysqli_error($conn));

mysqli_stmt_bind_param($stmt, $types, ...$params);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) die("Execute failed: " . mysqli_error($conn));

$sqlCount = "SELECT COUNT(*) FROM users" . $where;
$countStmt = mysqli_prepare($conn, $sqlCount);
if (!empty($where)) {
    $countParams = array_slice($params, 0, -2);
    mysqli_stmt_bind_param($countStmt, substr($types, 0, -2), ...$countParams);
}
mysqli_stmt_execute($countStmt);
$countResult = mysqli_stmt_get_result($countStmt);

if (!$countResult) die("Count query failed: " . mysqli_error($conn));
$totalRows = mysqli_fetch_row($countResult)[0];
$totalPages = ceil($totalRows / $perPage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../main.css" />

    <title>User Management</title>
</head>


<body>
    <nav class="navbar navbar-expand-lg bg-light  fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto me-sm-auto nav-responsive " href="../index.php"><img alt="logo" width="50" src="img/1-removebg-preview.png" /></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-2 active"><a class="nav-link" href="adminRole.php"><i class="fa-solid fa-user-tie"></i> Admin</a></li>
                    <li class="nav-item px-2"><a class="nav-link" href="index.php"><i class="fa-solid fa-user"></i> User</a></li>
                    <li class="nav-item px-2"><a class="nav-link" href="comment.php"><i class="fa-solid fa-comment"></i> Comment</a></li>
                </ul>
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex flex-column align-items-center mb-2 mx-auto">
    <h3 class="mb-3 mt-5">User Table</h3>
    
    <div class="d-flex mb-3">
        <form class="d-flex" method="GET">
            <input type="text" name="search" class="form-control me-2" placeholder="Search username or email" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <select name="sort" class="form-select me-2" style="max-width:200px;">
                <option value="">Sort By</option>
                <option value="username_asc" <?= ($_GET['sort'] ?? '') === 'username_asc' ? 'selected' : '' ?>>Name ↑</option>
                <option value="username_desc" <?= ($_GET['sort'] ?? '') === 'username_desc' ? 'selected' : '' ?>>Name ↓</option>
                <option value="email_asc" <?= ($_GET['sort'] ?? '') === 'email_asc' ? 'selected' : '' ?>>Email ↑</option>
                <option value="email_desc" <?= ($_GET['sort'] ?? '') === 'email_desc' ? 'selected' : '' ?>>Email ↓</option>
            </select>
            <button type="submit" class="btn me-2 admin_btn" >Apply</button>
        </form>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteExpiredModal">
            Delete Expired Acc
        </button>
    </div>
</div>

        <form method="POST" action="manageUser/deleteSelectedAcc.php" id="bulkDeleteForm">
            <table class="table table-striped table-bordered border-dark mb-5 px-5 mx-auto text-center table-hover ">
                 
                <thead>
                    <tr>
                        <th class="admin_bg_color text-center"><input type="checkbox" id="selectAll"></th>
                        <th class="admin_bg_color text-center">No</th>
                        <th class="admin_bg_color text-center">Username</th>
                        <th class="admin_bg_color text-center">Email</th>
                        <th class="admin_bg_color text-center">Last Login Date</th>
                        <th class="admin_bg_color text-center">Last Login</th>
                        <th class="admin_bg_color text-center">Expired</th>
                        <th class="admin_bg_color text-center">Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = $offset + 1;
                    while ($row = mysqli_fetch_assoc($result)):
                    ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" name="user_ids[]" value="<?= $row['id'] ?>"></td>
                            <td class="text-center"><?= $counter++ ?></td>
                            <td class="text-center">
                                <a href="user_result.php?id=<?= urlencode($row['id']) ?>" class="text-decoration-none">
                                    <?= htmlspecialchars($row["username"]) ?>
                                </a>
                            </td>

                            <td class="text-center"><?= htmlspecialchars($row["email"]) ?></td>
                            <td class="text-center">
                                <?php
                                if (!empty($row["formatted_last_login"])) {
                                    $dateTimeParts = explode(' ', $row["formatted_last_login"], 2);
                                    echo htmlspecialchars($dateTimeParts[0]) . "<br>" . htmlspecialchars($dateTimeParts[1]);
                                } else {
                                    echo "None";
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($row["days_since_last_login"] === 'None') {
                                    echo "None";
                                } else {
                                    $days = (int)$row["days_since_last_login"];
                                    if ($days == 0) {
                                        echo "Today";
                                    } elseif ($days == 1) {
                                        echo "1 day ago";
                                    } elseif ($days < 30) {
                                        echo "$days days ago";
                                    } elseif ($days < 365) {
                                        $months = floor($days / 30);
                                        echo $months == 1 ? "1 month ago" : "$months months ago";
                                    } else {
                                        $years = floor($days / 365);
                                        echo $years == 1 ? "1 year ago" : "$years years ago";
                                    }
                                }
                                ?>
                            </td>
                            <td class="text-center"><?= htmlspecialchars($row["expired_account"]) ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= htmlspecialchars($row['id']) ?>)">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Are you sure you want to delete selected users?')">
                Delete Selected
            </button>
        </form>
    </div>
    <!-- Delete User Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete this user?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="manageUser/deleteAcc.php">
                        <input type="hidden" id="deleteUserId" name="id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Expired Accounts Modal -->
    <div class="modal fade" id="deleteExpiredModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Expired Account?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete all expired accounts?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="manageUser/deleteExpiredAcc.php">
                        <button type="submit" class="btn btn-danger">Delete All</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm Bulk Delete Modal -->
    <div class="modal fade" id="confirmBulkDeleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Bulk Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete selected users?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="bulkDeleteForm" class="btn btn-danger">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link text-secondary" href="?page=<?= $page - 1 ?>"><b>Previous</b></a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="admin_bg_color page-link active" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                        <a class="page-link text-secondary" href="?page=<?= $page + 1 ?>"><b>Next</b></a>
                    </li>
                </ul>
            </nav>
       
    </div>
</div>
    <script>
        function confirmDelete(userId) {
            document.getElementById("deleteUserId").value = userId;
            var modal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
            modal.show();
        }
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.userCheckbox');
        const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
            toggleDeleteButton();
        });
        checkboxes.forEach(cb => {
            cb.addEventListener('change', toggleDeleteButton);
        });

        function toggleDeleteButton() {
            const anyChecked = [...checkboxes].some(cb => cb.checked);
            deleteSelectedBtn.disabled = !anyChecked;
        }
        document.getElementById("selectAll").addEventListener("change", function() {
            const checkboxes = document.querySelectorAll("input[name='user_ids[]']");
            checkboxes.forEach(cb => cb.checked = this.checked);
        });

        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php mysqli_close($conn); ?>
