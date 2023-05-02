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
    <section class="vh-100" style="background-image: url(" images>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">

                        <form onsubmit="return validateRegister()" name="registerForm" action="<?php echo htmlspecialchars('../handler/register_processing.php'); ?>" method="POST" class="card-body p-4 text-center">

                            <h3 class="mb-4 fw-bold text-uppercase">Sign up</h3>

                            <div class="form-outline mb-4">
                                <label class="d-flex justify-content-start form-label" for="typeEmailX-2">Username</label>
                                <input type="text" name="userName" id="username" class="form-control form-control-lg" required minlength="8" maxlength="12">
                                <p class="text-danger" id="username_err"></p>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="d-flex justify-content-start form-label" for="typePasswordX-2">Email</label>
                                <input type="email" name="userEmail" id="email" class="form-control form-control-lg" required>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="d-flex justify-content-start form-label" for="typePasswordX-2">Password</label>
                                <input type="password" name="userPassword" id="password" class="form-control form-control-lg" required minlength="8" maxlength="10">
                            </div>

                            <hr class="my-4">
                            <!-- <a href="login.php"> -->
                            <button class="btn btn-lg btn-block btn-primary" name="registerSubmit" style="background-color: #dd4b39;" type="submit">Register</button>
                            <!-- </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function validateRegister(){
            let userName = document.forms["registerForm"]["userName"].value;
            let userPassword = document.forms["registerForm"]["userPassword"].value;

            let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/

            let res = passwordRegex.test(userPassword)
            if(res == false)
            {
                alert("Password need to contain at least one uppercase letter, one lowercase letter, one number and one special character!!")
                return false;
            }
            return true;
        }

        function validateEmail()
        {
            let userEmail = document.forms["registerForm"]["userEmail"].value;
            var pattern = /^[\w\.-]+@[\w\.-]+\.\w+$/;
            if (pattern.test(email) == false)
            {
                alert("The Email is invalid!! Please check your email again!")
            }
        }
    </script>
</body>
</html>
