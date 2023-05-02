<body>

<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'onlinestore';
    $port = '4306';

    $conn = mysqli_connect($servername, $username, $password,$database, $port);

    $nameErr = $priceErr = $popularityErr = $imageErr = "";
    $name = $price = $popularity = $image = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST['productName'])) $nameErr = "Product name is required";
        else $name = $_POST["productName"];
        if(empty($_POST['productPrice'])) $priceErr = "Product price is required";
        else $price = $_POST["productPrice"];
        if(empty($_POST['popularity'])) $popularityErr = "Popularity is required";
        else $popularity = $_POST["popularity"];

        if(isset($_FILES["uploadImage"]))
        {
            $file_name = $_FILES["uploadImage"]["name"];
            $file_size = $_FILES["uploadImage"]["size"];
            $file_tmp = $_FILES["uploadImage"]["tmp_name"];
            $file_type = $_FILES["uploadImage"]["type"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $file_name); //split
            $imageExtension = strtolower(end($imageExtension)); ////get extension
            if(!in_array($imageExtension, $validImageExtension)) ///check
            {
                echo
                "<script> alert('Invalid Image Extension'); </script>";
            }
            else{
                $newImageName = uniqid() . '.' . $imageExtension;

                $image = file_get_contents($file_tmp);
            }

            $stmt = $conn->prepare("INSERT INTO product(productName, price, popularity, productImage) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $price, $popularity, $image);
            $stmt->execute();
            $stmt->close();

        }

    }
    $conn -> close();

?>
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/nav.php'; ?>

    <section id="product" class="py-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class ="container" style="padding-top: 100px" >
            <div class="row">
                <div class="mb-3 col-md-6 offset-md-3 ">
                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                    <input type="text" name="productName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6 offset-md-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" name="productPrice" class="form-control" id="exampleInputPassword1">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6 offset-md-3">
                    <label for="productPopularity" class="form-label">Popularity</label>
                    <input type="text" name="popularity" class="form-control" id="productPopularity">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6 offset-md-3">
                    <label for="upload_Image">Upload Image</label>
                    <input type="file" name="uploadImage" accept=".jpg, .jpeg, .png" class="form-control" id="upload_Image">
                </div>
            </div>
            <div class="row">
                <div class="d-flex mb-3 col-md-6 form-check offset-md-3 justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </section>


</body>
