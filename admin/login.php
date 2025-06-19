<?php
require('../config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Prepare SQL
    $sql = "SELECT id, email, password, role FROM admins WHERE email = ? LIMIT 1";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        // Bind result variables
        mysqli_stmt_bind_result($stmt, $db_id, $db_email, $db_password, $db_role);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Validate credentials
        if (!empty($db_email) && password_verify($password, $db_password)) {
            if ($db_role === "admin") {
                $_SESSION["id"]=$db_id;
                $_SESSION["admin"] = $db_email;
                $_SESSION["role"] = $db_role;
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Access Denied: You are not authorized to log in as an admin.');</script>";
            }
        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
    } else {
        die("Database error: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>My Login Page</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="col-12 ... animate__animated animate__bounceIn">
    <link rel="stylesheet" type="text/css" href="css/my-login.css" />
</head>

<body class="my-login-page bg-info">
    <section
        class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="card-wrapper">
                    <div class="brand shadow-lg bg-white">
                        <img src="img/1-removebg-preview.png" alt="logo" />
                    </div>
                    <div class="card shadow p-3">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">Login</h4>
                            <form
                                method="POST"
                                class="my-login-validation"
                                novalidate="">
                                <div class="form-group">
                                    <label for="email" class="mb-2 fw-medium">E-Mail Address</label>
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        value=""
                                        required
                                        autofocus />
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label
                                        for="password"
                                        class="my-2 d-flex justify-content-between fw-medium">Password
                                        <a
                                            href="forgot.php"
                                            class="float-right">
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        required
                                        data-eye />
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>


                                <div class="form-group m-0">
                                    <button
                                        type="submit"
                                        class="btn btn-info rounded-2 w-100 text-white shadow-sm fw-bold">
                                        Login
                                    </button>
                                </div>
                                <div class="mt-4 text-center fw-medium">
                                    Don't have an account?
                                    <a href="register.php">Create One</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script>
        window.addEventListener('load', () => {
    const spinner = document.querySelector('.spinner');
    const content = document.querySelector('.content');
    if (spinner) {
        spinner.classList.add('spinner--hidden');
        document.body.classList.remove('loading');
        spinner.addEventListener('transitionend', () => {
            spinner.remove();
            content.style.display = 'block';

            // Re-trigger Animate.css animation
            const animatedEls = document.querySelectorAll('.animate__animated');
            animatedEls.forEach(el => {
                el.classList.remove('animate__bounceIn');
                void el.offsetWidth; // Trigger reflow
                el.classList.add('animate__bounceIn');
            });
        });
    }
});

    </script>
    <script src="js/my-login.js"></script>
</body>

</html>
