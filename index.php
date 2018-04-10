<?php session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
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
    <?php
        $operatorOptions = array("-","+");
        $randomOperator = array_rand($operatorOptions);
        $operator = $operatorOptions[$randomOperator];
    
        $currentScore = $_POST["currentScore"];
        $totalScore = $_POST["totalScore"];

        $rand1 = rand(0,50);
        $rand2 = rand(0,50);
        $answer = 0;
        $error = "";
        $correctWrong = "";
    
        if(!isset($_POST["currentScore"])) {
            $currentScore = 0;
        }
        if(!isset($_POST["totalScore"])) {
            $totalScore = 0;
        }
        
        switch ($operator) {
            case "-":
                $answer = $rand1 - $rand2;
                break;
            case "+":
                $answer = $rand1 + $rand2;
                break;
            default:
                break;
        }
        
    
        if (isset($_POST["input"]) && is_numeric($_POST["input"])){
            if ($_POST["answer"] == $_POST["input"]) {
                $currentScore = (int)$_POST["currentScore"] + 1;
                $correctWrong = "CORRECT";
            } else {
                $correctWrong = "WRONG";
            }
            $totalScore = (int)$_POST["totalScore"] + 1;
        }
    
        if (!isset($_POST["input"]) || !is_numeric($_POST["input"])) {
            $error = "You must enter a number for your answer.";
        }
    ?>
    <div class="container">
        <form action="index.php" method="post" role="form" class="form-horizontal">
            <input type="hidden" name="answer" value="<?php echo $answer;?>">
            <input type="hidden" name="currentScore" value="<?php echo $currentScore;?>">
            <input type="hidden" name="totalScore" value="<?php echo $totalScore;?>">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Math Game</h1>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-6 numbers">
                    <?php 
                        echo $rand1;
                        echo $operator;
                        echo $rand2;
                    ?>
                </label>
                <div class="col-sm-6 display">
                    <?php echo $error . $correctWrong; ?><br/>
                    Score: <?php echo $currentScore;?> / <?php echo $totalScore;?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="input" name="input" placeholder="Enter answer" size="6" autocomplete="off">
                </div>                    
            </div>
            <div class="row">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-primary btn-sm" onclick="location.href='logout.php';">Logout</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

