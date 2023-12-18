<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <!-- Nav Section Start -->
    <?php include 'component/header.php';?>
    <!-- Nav Section -->
    </header>
    <!-- Link Register -->

    <!-- <div class="login-register">
        <p>Don't have an account?</p>
        <a href="#" class="register-link">Register</a>
    </div> -->

    <!-- Link Register -->
    <div class="form">
        <h2>Sign up</h2>
        <div class="form-box">
                <form action="#"></form>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="text" required>
                        <label for="">Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="Password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required>
                        <label for="">First name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required>
                        <label for="">Last name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required>
                        <label for="">Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="today"></ion-icon></span>
                        <input type="text" required>
                        <label for="">Date of birth</label>
                    </div>
                    <div class="gender">
                        <span class="icon"><ion-icon name="transgender"></ion-icon></span>
                        <select placeholder="gender" id="gender">
                            <option value="gender">gender</option>
                            <option value="gender">male</option>
                            <option value="gender">female</option>
                        </select>
                    </div>
                    <button type="sign-up" class="btnSignup">Sign up</button>
        </div>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>