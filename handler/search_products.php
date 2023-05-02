<?php
// Perform database search based on the keyword
 // Get the keyword from the POST data

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'onlinestore';
$port = '4306';

$conn = mysqli_connect($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$prod_name = $_GET['product'];

$stmt = $conn->prepare("SELECT productName FROM product WHERE productName LIKE ?");
$searchKeyword = '%'.$prod_name . '%';
$stmt->bind_param("s", $searchKeyword);
$stmt->execute();
$result = $stmt->get_result();
$products = '';
$start = '<li class="d-block  px-5 py-2"><a class="dropdown-item" href="#">';
$end = '</a></li>';

$dom = new DOMDocument();
$root = $dom -> createElement('div');
$dom -> appendChild($root);

while ($row = $result->fetch_assoc()) {
    $products .= $start;
    $products .= $row["productName"];
    $products .= $end;

    $child = $dom -> createElement('li');
    $child -> setAttribute('class', 'd-block px-5 py-2');

    $child2 = $dom -> createElement('a');
    $child2 -> setAttribute('class', 'dropdown-item');
    $child2 -> setAttribute('href', '#');
    $child2 -> textContent = $row["productName"];

    $child -> appendChild($child2);
    $root -> appendChild($child);
}
$stmt->close();
$conn->close();

$convertToStr = $dom -> saveHTML();
// Return the products array as JSON
echo ($convertToStr);
?>
