<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'onlinestore';
$port = '4306';

$conn = mysqli_connect($servername, $username, $password,$database, $port);

// if(isset($_POST['registerSubmit']))
// {
//     $userName = $_POST['userName'];
//     $userEmail = $_POST['userEmail'];
//     $userPassword = sha1($_POST['userPassword']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] == 'application/json') {
    // Get the JSON payload from the request body
    $json_payload = file_get_contents('php://input');
    // Decode the JSON payload into a PHP object
    $data = json_decode($json_payload);

    // Extract the relevant data from the object
    $userName = $data->userName;
    $userEmail = $data->userEmail;
    $userPassword = sha1($data->userPassword);

    $selectStmt = $conn -> prepare('select * from user where email = ?');
    $selectStmt -> bind_param("s",$userEmail);
    $selectStmt -> execute();
    $result = $selectStmt -> get_result();
    $selectStmt -> close();

    $dom = new DOMDocument();
    $dom -> loadHTMLFile('../page/register.php');
    $modifyError = $dom -> getElementById('email');


    if(mysqli_num_rows($result) > 0)
    {
        $modifyError -> nodeValue = 'This email has already existed';
        $dom -> saveHTMLFile('../page/register.php');
        header('Location: ../page/register.php');
    }
    else{
        $modifyError -> nodeValue = '';
        $dom -> saveHTMLFile('../page/register.php');

        $stmt = $conn -> prepare("insert into user(username, email, password) values(?,?,?)");
        $stmt -> bind_param("sss",$userName,$userEmail,$userPassword);
        $stmt -> execute();
        $stmt -> close();
        header('Location: ../page/login.php');
    }
    
}
$conn -> close();


?>