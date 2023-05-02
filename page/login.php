<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- custom css -->
    <link rel="stylesheet" href="/E-commerce-Web/css_file/main.css">
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="../handler/login_processing.php" method="POST" class="card-body p-4 text-center">

                            <h3 class="mb-4 fw-bold text-uppercase">Sign in</h3>

                            <div class="form-outline mb-4">
                                <label class="d-flex justify-content-start form-label" for="typeEmailX-2">Email</label>
                                <input type="email" name="userEmail" id="typeEmailX-2" class="form-control form-control-lg">
                                <p class="text-danger" id="email_err"></p>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="d-flex justify-content-start form-label" for="typePasswordX-2">Password</label>
                                <input type="password" name="userPassword" id="typePasswordX-2" class="form-control form-control-lg">
                                <p class="text-danger" id="password_err"></p>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3">
                                <label class="form-check-label" for="form1Example3"> Remember password </label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" name="loginSubmit" type="submit">Login</button>

                            <hr class="my-4">
                            <a href="../handler/index.php?page=register">
                                <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="button">Register</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
