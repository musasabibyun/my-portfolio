<?php
session_start();

if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    mb_language('ja');
    mb_internal_encoding('UTF-8');

    $to = 'murakami.shushushun@gmail.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['email']}
内容：
{$post['contact']}
EOT;
    mb_send_mail($to, $subject, $body, "From: {$from}\r\nReturn-Path: {$from}", "-f$from");

    unset($_SESSION['form']);
    header('Location: thanks.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shuntaro's Portfolio Site | confirm</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="SRBThemes" />

        <link rel="shortcut icon" href="./img/rose.png">

        <!--Bootstrap Css-->
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />

        <!-- Materialdesign icons Css -->
        <link href="./css/materialdesignicons.min.css" rel="stylesheet">

        <!-- Mobirise icons Css -->
        <link href="./css/mobiriseicons.css" rel="stylesheet"> 

        <!-- Magnific-popup -->
        <link rel="stylesheet" href="./css/magnific-popup.css">

        <!-- OWL SLIDER -->
        <link rel="stylesheet" href="./css/owl.carousel.css" />
        <link rel="stylesheet" href="./css/owl.theme.css" />
        <link rel="stylesheet" href="./css/owl.transitions.css" />

        <!-- ANIMATE CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

        <!-- Custom style Css -->
        <link href="./css/style.css" rel="stylesheet">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/91c395d092.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">Loading...</div>
            </div>
        </div>

        <!--Navbar -->
    	<nav class="navbar navbar-expand-lg fixed-top custom-nav stickyadd">
            <div class="container">

                <a class="navbar-brand p-0 logo" href="/">
                    <img src="./img/logo_1.png" alt="" class="img-fluid logo-light">
                    <img src="./img/logo_2.png" alt="" class="img-fluid logo-dark">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mdi mdi-menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#skils">My Skils</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#works">My Works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><!-- /Navbar -->

        <!--CONFIRM -->
        <section class="section bg-light mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h2>Confirm</h2>
                            <p class="text-muted mx-auto section-subtitle mt-3">入力内容をご確認ください．</p>
                        </div>
                    </div>
                </div> 
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="form-kerri contact_form">
                            <div id="message"></div>
                            <form action="" id="working_form" name="contact-form" method="POST" novalidate>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        <p class="mb-3 text-custom">お名前</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="text-muted"><?php echo htmlspecialchars($post['name']); ?></p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        <p class="mb-3 text-custom">メールアドレス</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="text-muted"><?php echo htmlspecialchars($post['email']); ?></p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        <p class="mb-3 text-custom">件名</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="text-muted"><?php echo htmlspecialchars($post['subject']); ?></p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        <p class="mb-3 text-custom">お問い合わせ内容</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="text-muted"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <a class="btn border border-secondary text-muted" href="/#contact" >戻る</a>
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom text-uppercase" value="送信">
                                    </div>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        </section><!-- /CONFIRM -->

        <!--FOOTER-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-12">
                        <div class="text-center text-white footer-alt">
                            <ul class="list-unstyled list-inline mb-3">
                                <li class="list-inline-item"><a href="https://twitter.com/musasabi_byun"><i class="mdi mdi-twitter text-muted"></i></a></li>
                                <li class="list-inline-item"><a href="https://github.com/musasabibyun?tab=repositories"><i class="mdi mdi-github-circle text-muted"></i></a></li>
                                <li class="list-inline-item"><a href="https://qiita.com/musasabi_byun"><i class="mdi mdi-quicktime text-muted"></i></a></li>
                            </ul>
                            <p class="text-muted mb-0">&copy; Copyright | Shuntaro 2019-2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--/FOOTER-->

        <!-- JAVASCRIPTS -->
        <script src="./js/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <!--EASING JS-->
        <script src="./js/jquery.easing.min.js"></script>
        <script src="./js/scrollspy.min.js"></script>
        <!--PORTFOLIO FILTER JS-->
        <script src="./js/isotope.min.js"></script>
        <!-- Magnific Popup Js -->
        <script src="./js/jquery.magnific-popup.min.js"></script>
        <!-- TYPED -->
        <script src="./js/typed.min.js"></script>
        <!--PARTICLES ANIMATE JS-->
        <script src="./js/particles.min.js"></script>  
        <script src="./js/particles.app.min.js"></script> 
        <!-- CONTACT JS -->
        <script src="./js/contact.min.js"></script>
        <!-- OWL CAROUSEL -->
        <script src="./js/owl.carousel.min.js"></script>
        <!--CUSTOM JS-->
        <script src="./js/custom.js"></script>
        <!-- WOW JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

        <script src="./js/script.min.js"></script>
    </body>
</html>