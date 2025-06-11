<?php
require("../config.php");

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT id, name, email, text, date FROM feedback LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$sqlCount = "SELECT COUNT(*) as total FROM feedback";
$resultCount = $conn->query($sqlCount);
$row = $resultCount->fetch_assoc();
$totalComments = $row['total'];
$totalPages = ceil($totalComments / $limit);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img alt="logo" height="60" src="img/1-removebg-preview.png" /></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-2"><a class="nav-link" href="adminRole.php"><i class="fa-solid fa-user-tie"></i> Admin</a></li>
                    <li class="nav-item px-2"><a class="nav-link" href="index.php"><i class="fa-solid fa-user"></i> User</a></li>
                    <li class="nav-item px-2"><a class="nav-link" href="comment.php"><i class="fa-solid fa-comment"></i> Comment</a></li>
                </ul>
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="text-center mb-5">Comments</h2>

        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-center mb-4 gap-2">
            <div>
                <button class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#deleteAllModal">Delete All Comments</button>

            </div>
            <div class="d-flex align-items-center">
                <input type="date" id="deleteDate" class="form-control d-inline-block w-auto">
                <button class="btn admin_btn ms-2" data-bs-toggle="modal" data-bs-target="#deleteByDateModal">Delete by Date</button>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <?php if ($result): ?>
                    <?php $counter = $offset + 1; ?>
                    <?php foreach ($result as $value): ?>
                        <div class="card p-3 text-center shadow position-relative mb-5">
                            <div class="form-check position-absolute start-0 top-0 m-2">
                                <input class="form-check-input delete-checkbox" type="checkbox" value="<?php echo $value['id']; ?>">
                            </div>
                            <div class="d-flex rounded-circle mx-auto align-items-center justify-content-center text-white fs-3 fw-bold bg-info border border-white border-4" style="width: 4rem; height:4rem; margin-top: -3rem;">
                                <?php echo $counter++; ?>
                            </div>
                            <h4><?php echo htmlspecialchars($value['name']); ?></h4>
                            <h5><?php echo htmlspecialchars($value['email']); ?></h5>
                            <span><?php echo $value['date']; ?></span>
                            <p class="text-muted">Comment : <?php echo htmlspecialchars($value['text']); ?></p>
                            <button type="button" class="btn btn-danger delete-btn d-block m-auto" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $value['id']; ?>">
                                Delete
                            </button>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">No comments available.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">&laquo;</a></li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item admin_btn<?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link admin_btn" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($page < $totalPages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">&raquo;</a></li>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $totalPages; ?>">Last</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <!-- Delete Modals -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete this comment?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteAllModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete All Comments</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete all comments?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteAll">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteByDateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Comments by Date</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete comments from the selected date?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteByDate">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let commentId;

        $(document).ready(function() {
            $(".delete-btn").click(function() {
                commentId = $(this).data("id");
                console.log("Selected comment ID:", commentId); // DEBUG line
            });

            $("#confirmDelete").click(function() {
                console.log("Clicked confirmDelete with ID:", commentId); // DEBUG
                if (!commentId) {
                    alert("No comment ID selected!");
                    return;
                }

                $.post("manageComment/deleteComment.php", {
                    id: commentId
                }, function(response) {
                    console.log("Server response:", response); // DEBUG
                    if (response.trim() === "success") {
                        location.reload();
                    } else {
                        alert("Error: " + response);
                    }
                }).fail(function() {
                    alert("AJAX failed to send request.");
                });
            });
        });

        // Delete All
        $("#confirmDeleteAll").click(function() {
            console.log("Triggered Delete All"); // 👈 DEBUG
            $.post("manageComment/deleteAllComments.php", function(response) {
                console.log("Response from delete all:", response); // 👈 DEBUG
                if (response.trim() === "success") location.reload();
                else alert("Error deleting all comments: " + response);
            }).fail(function() {
                alert("AJAX failed for delete all.");
            });
        });

        $("#confirmDeleteByDate").click(function() {
            let date = $("#deleteDate").val();
            console.log("Clicked delete by date. Selected date:", date); // DEBUG

            if (date) {
                $.post("manageComment/deleteCommentsByDate.php", {
                    date: date
                }, function(response) {
                    console.log("Server response:", response); // DEBUG

                    if (response.trim() === "success") {
                        location.reload();
                    } else {
                        alert("Error deleting comments: " + response);
                    }
                }).fail(function() {
                    alert("AJAX request failed. Check your network or URL.");
                });
            } else {
                alert("Please select a date.");
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>