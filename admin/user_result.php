<?php
require_once '../config.php';

if (!isset($_GET['id'])) {
    die("User ID not provided.");
}

$userId = (int)$_GET['id'];

// Fetch user
$userQuery = mysqli_prepare($conn, "SELECT username FROM users WHERE id = ?");
mysqli_stmt_bind_param($userQuery, "i", $userId);
mysqli_stmt_execute($userQuery);
$userResult = mysqli_stmt_get_result($userQuery);
$user = mysqli_fetch_assoc($userResult);

if (!$user) {
    die("User not found.");
}

// Fetch result
$resultQuery = mysqli_prepare($conn, "SELECT * FROM result WHERE user_id = ?");
mysqli_stmt_bind_param($resultQuery, "i", $userId);
mysqli_stmt_execute($resultQuery);
$resultData = mysqli_stmt_get_result($resultQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($user['username']) ?> - Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../style/admin.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Results for <?= htmlspecialchars($user['username']) ?></h3>
        <form method="POST" action="delete_selected_results.php" id="bulkDeleteForm">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="admin_bg_color text-center"><input type="checkbox" id="selectAll"></th>
            <th class="admin_bg_color text-center">No</th>
            <th class="admin_bg_color text-center">Quiz Title</th>
            <th class="admin_bg_color text-center">Score</th>
            <th class="admin_bg_color text-center">Date</th>
            <th class="admin_bg_color text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($resultData)): ?> 
            <tr>
                <td class="text-center"><input type="checkbox" name="result_ids[]" value="<?= $row['id'] ?>"></td>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= htmlspecialchars($row['quiz_type']) ?></td>
                <td class="text-center"><?= htmlspecialchars($row['score']) ?></td>
                <td class="text-center"><?= htmlspecialchars($row['quiz_date']) ?></td>
                <td class="text-center">
                    <form method="POST" action="delete_user_result.php" onsubmit="return confirm('Delete this result?');">
                        <input type="hidden" name="result_id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
        <div class="d-flex m-auto gap-3">
            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Delete selected results?')">
                Delete Selected
            </button>
             <a href="index.php" class="btn btn-secondary mt-2">← Back to Users</a>
        </div>
</form>
           
    <script>
document.getElementById("selectAll").addEventListener("change", function () {
    const checkboxes = document.querySelectorAll("input[name='result_ids[]']");
    checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>
</body>


</html>
<?php mysqli_close($conn); ?>