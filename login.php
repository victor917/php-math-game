<?php session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Math Game</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <meta charset="utf-8" />
</head>
<body>
    <div class="container frame">
        <form class="form-horizontal" action="authenticate.php" method="post" autocomplete="off">
            <h1>Please login to enjoy our math game.</h1>
            <div class="form-group">
                <span style="color:red">
                    &nbsp;&nbsp;
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </span><br />
                <label class="control-label col-sm-2" for="email">Email: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>