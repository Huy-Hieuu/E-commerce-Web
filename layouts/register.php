
<body>
    <section class="vh-100" style="background-image: url("images/jisoobg-11.jpg");">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">

                        <form action="../handler/logout_processing.php" method="POST" class="card-body p-4 text-center">

                            <h3 class="mb-4 fw-bold text-uppercase">Sign up</h3>

                            <div class="form-outline mb-4">
                                <label class="d-flex justify-content-start form-label" for="typeEmailX-2">User Name</label>
                                <input type="text" name="userName" id="username" class="form-control form-control-lg" />
                                <p class="text-danger" id="username_err"></p>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="d-flex justify-content-start form-label" for="typePasswordX-2">Email</label>
                                <input type="email" name="userEmail" id="email" class="form-control form-control-lg" />
                                <p class="text-danger" id="email_err">This email has already existed</p>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="d-flex justify-content-start form-label" for="typePasswordX-2">Password</label>
                                <input type="password" name="userPassword" id="password" class="form-control form-control-lg" />
                            </div>

                            <hr class="my-4">
                            <!-- <a href="login.php"> -->
                            <button class="btn btn-lg btn-block btn-primary" name="registerSubmit" style="background-color: #dd4b39;"type="submit">Register</button>
                            <!-- </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
