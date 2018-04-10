<?php session_start();
$cred = file_get_contents("credentials.config");
$user = explode("\n", $cred);

$id = array();
$pw = array();
$isCorrect = true;


for ($x = 0; $x < count($user); $x++) {
    $data = explode(', ', $user[$x]);
    array_push($id, $data[0]);
    array_push($pw, $data[1]);
}


for ($x = 0; $x < count($id); $x++) {
    if ($_POST["email"] == $id[$x] && $_POST["password"] == trim($pw[$x])) {
        $_SESSION['user'] = $_POST["email"];
        header("Location: index.php"); 
        die(); 
    } else {
        $isCorrect = false;
    }
}
if ($isCorrect == false) {
    $_SESSION['error'] = "Your info does not match";
    header("Location: login.php?");
    die();
}

?>