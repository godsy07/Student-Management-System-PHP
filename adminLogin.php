<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css">

    <title>Admin Login Page</title>
</head>

<body>

    <div class="login">
        <div class="row">
            <h1 class="login-head">Admin Login</h1>
            <form class="form" action="./include/adminlogin.inc.php" method="POST">
                <input class="form-items" name="email" type="text" placeholder="Enter your Email" required />
                <input class="form-items" name="password" type="password" placeholder="Enter your Password" required />
                <button class="form-items" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>