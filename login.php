<?php

require_once 'function.php';
session_start();

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    if (is_null(login($_POST))) {
        echo "<script>
            alert('Username not registered!');
        </script>";
    } else if (!login($_POST)) {
        echo "<script>
            alert('Wrong username/ password!');
        </script>";
    } else {
        $userData = getUserData($_POST['username']);
        $_SESSION['level'] = $userData['level'];
        $_SESSION['name'] = $userData['username'];
        $_SESSION['id'] = $userData['id'];
        // $_SESSION['photo'] = $userData['image'];
        $_SESSION['login'] = true;
        header('Location: index.php');
        // if ($userLevel == 'admin') {
        //     header('Location: admin.php');
        // }

        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="main">

       

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="submit">SUBMIT</button>
                            </div>
                        </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>