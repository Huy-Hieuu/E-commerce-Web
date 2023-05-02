
    <!-- navbar -->
    <!-- this navbar will be vertical if screen size is < md -->
    <?php
        include '../layouts/head.php';
        include '../layouts/nav.php';
    ?>

    <?php
        include ('../handler/conn.php');

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $previous = $page - 1;
        $next = $page + 1;
        $limit = 9;
        $start =(int) (($page - 1) * $limit);
        $stmt = $conn -> prepare("select * from product LIMIT  ?, ?");
        $stmt -> bind_param("ii",$start, $limit);
        $stmt -> execute();
        $products = $stmt -> get_result();

        $count = $conn -> query("select count(productID) as numProds from product");
        $prodsCount = $count -> fetch_all(MYSQLI_ASSOC);
        $total = $prodsCount[0]['numProds'];
        $numPages = ceil($total / $limit);

    ?>
    <section id="collection" class="py-5">
            <div class="container">
                <div class="title text-center">
                    <h2 class="position-relative d-inline-block">New Collection</h2>
                </div>
                <div class="row">
                    <div class="container-fluid d-flex flex-wrap justify-content-center my-3">
                        <button class="m-2 p-2 m-md-3 p-md-3 rounded-pill order-lg-0 btn btn-outline-secondary text-dark" type="button">All</button>
                        <button class="m-2 p-2 m-md-3 p-md-3 rounded-pill order-lg-1 btn btn-outline-secondary text-dark" type="button">Best Sellers</button>
                        <button class="m-2 p-2 m-md-3 p-md-3 rounded-pill order-lg-2 btn btn-outline-secondary text-dark" type="button">Featured</button>
                        <button class="m-2 p-2 m-md-3 p-md-3 rounded-pill order-lg-3 btn btn-outline-secondary text-dark" type="button">New Arrival</button>
                        <div id="addProBtn"><button class="m-2 p-2 m-md-3 p-md-3 rounded-pill order-lg-3 btn btn-outline-secondary text-dark" type="button" onclick='location.href="../page/addProducts.php"'>Add Product</button></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div id="product_list" class="row mb-5">
                    <?php foreach($products as $product) : ?>
                        <div class="col-sm-4">
                            <img  class="img-fluid lazy-load" data-src="http://localhost:8012/E-commerce-Web/page/display_product.php?productID=<?= $product["productID"] ?>">
                            <div class = "text-center">
                                <div class = "rating mt-3">
                                    <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                    <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                    <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                    <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                    <span class = "text-danger"><i class = "fas fa-star"></i></span>
                                </div>
                                <p class = "text-capitalize my-1"><?= $product["productName"] ?></p>
                                <span class = "fw-bold">$<?= $product["price"] ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <nav aria-label="Page navigation" class="d-flex justify-content-center fs-5">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link text-secondary" href="../handler/index.php?page=product&product_page=<?= $previous; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                    </li>

                    <?php for($i = 1; $i < $numPages + 1; $i++) :?>

                        <li class="page-item">
                            <a  class="page-link text-secondary" href="../handler/index.php?page=product&product_page=<?= $i; ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link text-secondary" href="../handler/index.php?page=product&product_page=<?= $next; ?>" aria-label="Previous">
                            <span aria-hidden="true">Next &raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
    </section>


    <script src="../javascript/product.js"></script>

    <?php
        include '../layouts/footer.php';
    ?>
    <!-- end of footer -->
