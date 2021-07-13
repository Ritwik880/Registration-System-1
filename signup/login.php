<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <title>Hello, world!</title>
    <?php include './links/links.php' ?>
    <style>
        .main {
            background-color: silver;
            /* height: 100vh;
            width: 100%; */
        }

        .container {
            display: flex;
            justify-content: center;
            text-align: center;
            height: 100vh;
            width: 50%;
            text-align: center;
        }

        h1,
        p {
            text-align: center;
            margin-top: 5px;
        }

        .btn1 {
            text-decoration: none;
            margin-bottom: 3px;
            color: darkblue;
        }
    </style>
</head>

<body>
    <?php
    include './dbconnect.php';
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = "SELECT * FROM `registration` WHERE email = '$email'";
        $query = mysqli_query($conn, $email_search);
        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $_SESSION['name'] = $email_pass['name'];
            $pass_decode = password_verify($password, $db_pass);
            if ($pass_decode) {
                echo "login succesfull";
    ?>
                <script>
                    location.replace("home.php");
                </script>
    <?php
            } else {
                echo "password incorrect";
            }
        } else {
            echo "Invalid email";
        }
    }
    ?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Source Code</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./registration.php">Go Back</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <div class="main">
        <h1>Create Account</h1>
        <p>Get started with your free account</p>
        <div class="container my-5">

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <button type="button" class="btn btn-primary">Login via Gmail</button>
                <button type="button" class="btn btn-danger">Login via facebook</button>
                <h5>OR</h5>
                <div class="mb-3">
                    <input placeholder="Email address" type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <input placeholder="password" type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login Now</button>
                <br>
                <span style="font-weight: bold;" class="my-3">Not Have an account?</span>
                <a class="btn1" style="font-weight: bold;" href="./registration.php">SignUp Now</a>
            </form>

        </div>
    </div>
    <footer class="container-fluid bg-dark my-0 py-3 text-light">
        <p class="mb-0 text-center">&copy; 2021-2022</p>
        <p class="mb-0 text-center">
            <a href="#">Back to top |</a>
            <a href="#">Privacy |</a>
            <a href="#">Terms</a>
        </p>

    </footer>



</body>

</html>