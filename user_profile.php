<?php
require("config.php");
session_start();

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    
    // Fetch the user from database using $username
    // Example:
    // $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    // $stmt->execute([$username]);
    // $user = $stmt->fetch();

//     echo "Showing results for: " . htmlspecialchars($username);
// } else {
//     echo "No user selected.";
}


// Check if the user is logged in
$isLoggedIn = $_SESSION['user_id'];

// Fetch user details (username & email)
$userQuery = "SELECT userName, email FROM users WHERE id = ?";
$userStmt = $conn->prepare($userQuery);
$userStmt->bind_param("i", $isLoggedIn);
$userStmt->execute();
$userResult = $userStmt->get_result();
$userDetails = $userResult->fetch_assoc();

$userName = $userDetails['userName'] ?? 'Unknown';
$email = $userDetails['email'] ?? 'Unknown';

// Fetch user quiz results
$sql = "SELECT users.userName, users.email, result.quiz_type, result.score, result.quiz_date 
        FROM users 
        JOIN result ON users.id = result.user_id 
        WHERE users.id = ?";

$stmt = $conn->prepare($sql); // Prepare statement
$stmt->bind_param("i", $isLoggedIn);  /// Bind parameters
$stmt->execute(); // Execute the statement
$result = $stmt->get_result(); // Get result
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/JQ.png" type="image/x-icon">
    <!-- Primary Meta Tags -->
    <title>JKTechQuiz</title>
    <link
        rel="stylesheet"
        href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="main.css" />
    <link rel="shortcut icon" href="images/TechQUiz.png" type="image/x-icon">
</head>

<body class="primary-font">
    <div class="wrapper">
        <!-- Navbar -->
        <nav
            class="navbar navbar-expand-lg sticky-top bg-white px-4"
            id="header">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand me-auto me-sm-auto nav-responsive " href="index.php"><img src="images/JKTechQuiz.svg" alt="" width="50" class="my-0">JKTech<span style="color: #48cae4">Quiz</span></a>

                <div
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            JKTech<span style="color: #48cae4">Quiz</span>
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul
                            class="navbar-nav justify-content-center flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a
                                    class="nav-link mx-lg-2"
                                    aria-current="page"
                                    href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="aboutUs.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <a href="login.php" class="login-button">Login</a> -->
                <?php if ($isLoggedIn): ?>
                    <div class=""><a href="user_profile.php" class=" ms-2 btn btn-info me-1 border border-3 border-info rounded-circle text-white"><i class="fa-solid fa-user-graduate"></i></a>
                        <a href="logout.php" class="login-button">Logout</a>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="login-button">Login</a>
                <?php endif; ?>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!-- Main Content -->
        <main class="flex-grow-1">
            <p class="text-center mt-5 w-50 m-auto text-danger"><b>Reminder:</b>Your account will be deleted by the system automatically when the inactive period is over 6 months. Only the result history up to two months will be saved.</p>
            <?php if ($isLoggedIn): ?>
                <div class="text-center mt-3">
                    <p class="text-muted mb-2"> <strong><?php echo htmlspecialchars($userName); ?></strong></p>
                    <p class="text-muted"><strong><?php echo htmlspecialchars($email); ?></strong></p>
                </div>
            <?php endif; ?>


            <div class="table-responsive mb-5 pb-5">
                <table class="table mb-5 px-5 mx-auto text-center table-bordered border-dark table-hover" style="width: 43.75rem;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Quiz Type</th>
                            <th scope="col">Score</th>
                            <th scope="col">Exam Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($value = $result->fetch_assoc()) {  // Use fetch_assoc for fetching data row by row
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($value['quiz_type']); ?></td>
                                    <td><?php echo htmlspecialchars($value['score']); ?></td>
                                    <td><?php echo htmlspecialchars($value['quiz_date']); ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            // If no results are found
                            ?>
                            <tr>
                                <td colspan="3">No results found</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer class="py-4 footer-shadow">
            <div class="container">
                <div class="row align-items-center border-2">
                    <div
                        class="col-12 col-lg-3 text-center text-lg-start d-flex align-items-center justify-content-center pb-3 pb-sm-2 pb-lg-0 pb-xl-0">
                        <img
                            alt="JKT Logo"
                            class="img-fluid rounded-circle"
                            height=""
                            src="images/JKT-logo.jpg"
                            width="50" />
                        <h6 class="fw-bolder ms-2 mb-0">
                            <span class="fw-light fs-6">Organized by</span><br />
                            JKT Digital Institute
                        </h6>
                    </div>
                    <div class="col-12 col-lg-6 navbar-expand text-center text-black-50 pb-4 pb-sm-4 pb-lg-0 pb-xl-0">
                        &copy; <?php echo date("Y"); ?> JKTechQuiz. All rights reserved
                    </div>
                    <div class="col-12 col-lg-3 text-center text-lg-end pb-2 pb-sm-2 pb-lg-0 pb-xl-0">
                        <a class="me-2" href="https://www.facebook.com/jktdigital" target="_blank"><i class="fa-brands fa-facebook fs-3 text-info"></i></a>
                        <a class="me-2" href="http://jktmyanmarint.com/index.html" target="_blank"><i class="fa-solid fa-globe fs-3 text-info "></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="login.js"></script>
</body>

</html>