<body>
<nav class="d-flex navbar navbar-expand-md py-4 sticky-top navbar-light bg-white">
    <div class="container ">
        <a class="navbar-brand d-flex flex-row align-items-center order-lg-0 order-md-0" href="#">
            <!-- <img src="/E-commerce-Web/images/nike.jpg" alt="jisoo" style="width:70px; height:50px"> -->
            <i class="fab fa-node-js fa-2x"></i>
            <span class="text-uppercase fw-lighter ms-2">JISOO</span>
        </a>
        <button class="navbar-toggler navbar-light " type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-expanded="false" aria-controls="navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-lg-1 order-md-2 " id="navMenu">
            <ul class="nav navbar-nav mx-auto text-center d-flex justify-content-between" id='nav-tabs'>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-dark" href="../handler/index.php?page=home" id="nav-item1">home</a>
                </li>
                <li class="nav-item px-2 py-2 dropdown">
                    <a class="nav-link text-uppercase text-dark" href="../handler/index.php?page=product" id="nav-item2"">products</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-dark" href="../handler/index.php?page=special" id="nav-item3">specials</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-dark" href="../handler/index.php?page=home" id="nav-item4">blogs</a>
                </li>
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase text-dark" href="../handler/index.php?page=about" id="nav-item5">about us</a>
                </li>
                <li class="nav-item px-2 py-2 border-0">
                    <a class="nav-link text-uppercase text-dark" href="../handler/index.php?page=home" id="nav-item6">popular</a>
                </li>
            </ul>
        </div>
        <div class="order-lg-2 order-md-1 dropdown">
            <i class="fa fa-search dropdown-toggle" id="search_dd" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-hidden="false"></i>
            <ul class="dropdown-menu search-menu" aria-labelledby="search_dd">
                <input class="form-control " id="mySearch" type="text" placeholder="Search.." style="width:15vw;">
                <div class="drop_leftside" id="search_rs">
                </div>
            </ul>
        </div>
        <div class="dropdown order-md-3">
            <i class="far fa-user-circle fa-2x ms-5" id="profile_dd" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-hidden="false"></i>
            <ul class="dropdown-menu" aria-labelledby="profile_dd">
                <li class="d-block 1 px-5 py-2">
                    <a class="dropdown-item" href="#">User Name</a>
                </li>
                <li class="d-block  px-5 py-2"><a class="dropdown-item" href="#">Edit Profile</a></li>
                <li class="d-block  px-5 py-2"><a class="dropdown-item" href="#">Settings and Privacy</a></li>
                <li class="d-block  px-5 py-2"><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </div>
        <script src="../javascript/nav.js"></script>

    </div>
</nav>

</body>
