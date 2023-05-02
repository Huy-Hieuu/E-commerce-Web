<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'onlinestore';
$port = '4306';

$conn = mysqli_connect($servername, $username, $password,$database, $port);

if(isset($_POST['loginSubmit']))
{
    $userEmail = $_POST['userEmail'];
    $userPassword = sha1($_POST['userPassword']);

    $selectstmt = $conn -> prepare('select * from user where email = ? and password = ?');
    $selectstmt -> bind_param("ss",$userEmail, $userPassword);
    $selectstmt -> execute();
    $result = $selectstmt -> get_result();
    $selectstmt -> close();
    $row = $result -> fetch_assoc();

    $dom = new DOMDocument();
    $dom -> loadHTMLFile('../page/login.php');
    $modifyErr = $dom -> getElementById('password_err');

    if(mysqli_num_rows($result) == 0)
    {

        $modifyErr -> nodeValue = 'Incorrect username or password!';
        $dom -> saveHTMLFile('../page/login.php');
        header('Location: ../page/login.php');
    }
    else
    {
        $modifyErr -> nodeValue = '';
        $dom -> saveHTMLFile('../page/login.php');

        // $dom -> loadHTMLFile('../layouts/nav.php');
        // $modLink = $dom -> getElementById('inout');
        // $modLink -> setAttribute('href', '../handler/logout.php');
        // $modBtn = $dom -> getElementById('inout-text');
        // $modBtn -> nodeValue = 'log out';
        // $dom -> saveHTMLFile('../layouts/nav.php');

        //COOKIE //
        $user_cookie_name = sha1($userEmail);
        setcookie($user_cookie_name,$userEmail, time() + (86400 * 7),"/");

        //SESSION//

        $sessionID = session_id($user_cookie_name);
        session_start();

        $_SESSION['userEmail'] = $userEmail;
        $_SESSION['userName']  = $row['username'];
        $_SESSION['sessionID'] = $sessionID;

        echo "session ID: " . $sessionID . "<br/>";
        echo "userEmail: " . $_SESSION['userEmail'] . "<br/>";
        echo "userName: " . $_SESSION['userName']. "<br/>";
        echo $row['username'];


        // $dom -> loadHTMLFile('../layouts/nav.php');
        // $modName = $dom -> getElementById('profile_name');
        // $modName -> nodeValue = $row['username'];

        // $modPos = $dom -> getElementById('profile_position');
        // $modPos -> nodeValue = $row['level'];
        // $dom -> saveHTMLFile('../layouts/nav.php');


        $dom -> loadHTMLFile('../layouts/product_section.php');
        $modBtn = $dom -> getElementById('addProBtn');

        if ($row['level'] == "manager" && !($modBtn -> hasChildNodes()))
        {
            echo("go here");
            $addBtn = $dom->createElement('button');
            $addBtn->setAttribute('class', 'm-2 p-2 m-md-3 p-md-3 rounded-pill order-lg-3 btn btn-outline-secondary text-dark');
            $addBtn->setAttribute('type', 'button');
            $addBtn->setAttribute('onclick', 'location.href="../page/addProducts.php"');
            $addBtn -> textContent = 'Add Product';
            $modBtn -> appendChild($addBtn);
        }
        else if($row['level'] != 'manager'){
            $modBtn -> nodeValue = '';
        }
        $dom -> saveHTMLFile('../layouts/product_section.php');

        header('Location: ../handler/index.php?page=home');

    }
}
?>
