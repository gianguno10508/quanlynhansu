<?php include('view/custom/header.php'); ?>
<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Login</h4>
                                <p class="mb-0">Enter your email and password to login</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="Post">
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password">
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="message mb-2" style="color: #ee001d;">
                                        <?php if (isset($count)) : ?>
                                            <?php if ($count == 0) : ?>
                                                <p>Tên tài khoản hoặc mật khẩu không đúng!</p>
                                            <?php elseif ($count > 0) : ?>
                                                <?php header('location: http://localhost/quanlynhansu/'); ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-lg w-100 mb-0">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('./assets/img/banner.jpg');
          background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <br /> <br /> <br /> <br /> <br />
                            <h1 class="mt-5 text-white font-weight-bolder position-relative">"OK"</h1>
                            <h3 class="text-white position-relative">Tự hào là một thành viên của OK</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('view/custom/footer.php'); ?>