<?php

if(isset($_POST['email']) && isset($_POST['password'])){
    $user = new User();
    if($user->create(trim($_POST['email']),trim($_POST['password']))){
        header('Location: index.php?register=true');
    };
}

?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
    <title>TODO App</title>
    <style>
        .form-container {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="row d-flex justify-content-center">
        <div class="col-4 form-container">
            <h1>Sign up</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                           placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <a href="#">Sign-up (Ro'yxatdan o'tish)</a>
                <button type="submit" class="btn btn-primary">Submit (Yuborish)</button>
            </form>

        </div>
    </div>

</div>

</body>
</html>