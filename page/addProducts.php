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

                // move_uploaded_file($file_tmp,'img/'.$newImageName);

                $image = file_get_contents($file_tmp);
            }

            $stmt = $conn->prepare("INSERT INTO product(productName, price, popularity, productImage) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $price, $popularity, $image);
            $stmt->execute();
            $stmt->close();

            $result = $conn->query("select max(productID) from product");
            $row = mysqli_fetch_array($result);
            $new_productID = $row[0];
            $newProductHTML = '
                                <div class="col-sm-4">
                                    <img src="http://localhost:8012/E-commerce-Web/page/display_product.php?productID=' . $new_productID . '" class="img-fluid">
                                    <div class = "text-center">
                                        <div class = "rating mt-3">
                                            <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                            <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                            <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                            <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                            <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                        </div>
                                        <p class = "text-capitalize my-1">air jordan 1 low</p>
                                        <span class = "fw-bold">$ 100.50</span>
                                    </div>
                                </div>';

            // Step 2: Read the contents of the PHP file containing the HTML code for the existing products
            $existingProductsHTML = file_get_contents('../layouts/product_section.php');

            // Step 3: Append the HTML code for the new product to the existing HTML code
            $modifiedHTML = str_replace('<div id="product_list" class="row mb-5">', '<div id="product_list" class="row mb-5">' . $newProductHTML, $existingProductsHTML);

            // Step 4: Write the modified HTML code back to the original PHP file
            file_put_contents('../layouts/product_section.php', $modifiedHTML);
        }

    }
    $conn -> close();

?>
    <!-- navbar -->
    <!-- this navbar will be vertical if screen size is < md -->
    <?php include '../layouts/head.php'; ?>
    <?php include '../layouts/nav.php'; ?>
    <!-- end of navbar -->

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
