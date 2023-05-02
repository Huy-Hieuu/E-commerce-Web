
    <?php
        include ('../layouts/head.php');
        switch($_GET['page'])
        {
            case "home":
                // echo file_get_contents("../page/home.php");
                include "../page/home.php";
                break;
            case "product":
                // echo file_get_contents("../page/collection.php");
                include "../page/product.php";
                break;
            case "special":
                include "../page/product.php";
                break;
            case "blog":
                include "../page/blog.php";
                break;
            case "about":
                include "../page/about.php";
                break;
            case "login":
                include "../page/login.php";
                break;
            case "register":
                include "../page/register.php";
                break;
            default:
                break;
        }
    ?>


