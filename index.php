<?php
session_start();
$error = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if($post['name'] === ''){
        $error['name'] = 'blank';
    }
    if($post['email'] === ''){
        $error['email'] = 'blank';
    } else if( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) ){
        $error['email'] = 'email';
    }
    if($post['contact'] === ''){
        $error['contact'] = 'blank';
    } 
    if(count($error) === 0){
        $_SESSION['form'] = $post;
        header('Location: confirm.php');
        exit();
    }
} else {
    if(isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shuntaro's Portfolio Site</title>
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

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:site" content="@musasabi_byun" />
        <meta property="og:url" content="http://musasabibyun.php.xdomain.jp/"/>
        <meta property="og:title" content="Shuntaro's Portfolio Site" />
        <meta property="og:description" content="I'M A Web Engineer. | これまでの道のりを詰め込んだポートフォリオサイトです"/>
        <meta property="og:image" content="./img/work_1"/>

        <meta property="og:url" content="http://musasabibyun.php.xdomain.jp/"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="Shuntaro's Portfolio Site"/>
        <meta property="og:description" content="I'M A Web Engineer. | これまでの道のりを詰め込んだポートフォリオサイトです"/>
        <meta property="og:site_name" content="Shuntaro's Portfolio Site"/>
        <meta property="og:image" content="./img/work_1"/>
    </head>

    <body>

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">Loading...</div>
            </div>
        </div>

        <!--Navbar -->
    	<nav class="navbar navbar-expand-lg fixed-top custom-nav sticky">
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
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#skils">My Skils</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#works">My Works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><!-- /Navbar -->

        <!--HOME -->
        <section class="section header-bg-img h-100vh" id="home">
            <div class="bg-overlay"></div>
            <div class="header-table">
                <div class="header-table-center">
                    <div class="container position-relative z-index">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="text-center header-content mx-auto">
                                    <h4 class="text-white first-title mb-4">Welcome</h4>
                                    <h1 class="header-name text-white text-capitalize mb-0">I'M <span class="element font-weight-bold" data-elements="Shuntaro.,A Web Engineer.,A Challenger."></span></h1>
                                    <p class="text-white mx-auto header-desc mt-4 lead">これまでの道のりを詰め込んだポートフォリオサイト</p>
                                    <div class="mt-4 pt-2">
                                        <a href="#contact" class="btn btn-outline-custom btn-round">お問い合わせフォーム</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /HOME -->

        <!--ABOUT -->
        <section class="section" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <img src="./img/me.jpg" alt="プロフィール写真" class="img-fluid mx-auto d-block img-thumbnail">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <h2><span class="font-weight-bold">About</span> Me</h2>
                            <h4 class="mt-4">Hello! <span class="text-custom font-weight-bold">I'M Shuntaro.</span></h4>
                            <p class="text-muted mt-4">プログラミングに恋した大学生．</p>
                            <p class="text-muted mt-2">大学１年次 (2020年3月) から個人事業主としてWeb制作中心に活動しております．</p>
                            <p class="text-muted mt-2">大好きなプログラミングを通じて，多くの人の笑顔に繋がる未来をつくっていきます．</p>
                            <div class="text-muted mb-3">
                                <p class="mb-0">1998年 宮城県出身</p>
                                <p class="mb-0">2017年 宮城県仙台南高等学校 卒業</p>
                                <p class="mb-0">2019年 北海道大学 入学</p>
                                <p class="mb-0">2023年 北海道大学 卒業予定</p>
                            </div>
                            <div>
                                <ul class="mb-0 about-social list-inline mt-0">
                                    <li class="list-inline-item"><a href="https://twitter.com/musasabi_byun"><i class="mdi mdi-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="https://github.com/musasabibyun?tab=repositories"><i class="mdi mdi-github-circle"></i></a></li>
                                    <li class="list-inline-item"><a href="https://qiita.com/musasabi_byun"><i class="mdi mdi-quicktime"></i></a></li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /ABOUT -->

        <!--Service -->
        <section class="section bg-light" id="skils">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h2 class="font-weight-bold">My Skils</h2>
                            <p class="text-muted mx-auto section-subtitle mb-5">使用頻度が高く，特に自信のある技術についてご紹介いたします．</p>
                        </div>
                    </div>
                </div>
                <div class="row services-boxes justify-content-center">
                    <div class="col-md-6 col-lg-4 mb-4 wow fadeInLeftBig" data-wow-offset="200">
                        <div class="services-box border rounded shadow py-4 px-3">
                            <h4 class="text-custom text-center mb-4">HTML/CSS</h4>
                            <div class="text-center">
                                <i class="fab fa-4x fa-html5"></i>
                                <i class="fab fa-4x fa-css3-alt"></i>
                            </div>
                            <p class="text-muted mt-4 mb-0">個人事業主としてのWeb制作活動の中で，最も使用頻度が高い言語です．10以上のサイト開発に携わってきました．</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 wow fadeInUpBig" data-wow-offset="200">
                        <div class="services-box border rounded shadow py-4 px-3">
                            <h4 class="text-custom text-center mb-4">JavaScript</h4>
                            <div class="text-center">
                                <i class="fab fa-4x fa-js-square"></i>
                            </div>
                            <p class="text-muted mt-4 mb-0">Web制作活動の中で，HTML/CSSの次に頻繁に使用している言語です．素のJavaScriptも書く機会も多いですが，jQueryも頻繁に使用しています．</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 wow fadeInRightBig" data-wow-offset="200">
                        <div class="services-box border rounded shadow py-4 px-3">
                            <h4 class="text-custom text-center mb-4">PHP</h4>
                            <div class="text-center">
                                <i class="fab fa-4x fa-php"></i>
                            </div>
                            <p class="text-muted mt-4 mb-0">HTML/CSSやJavaScriptと比較すると使用頻度は低いですが，動的処理が求められる場合に使用しています．本ページ下にあるお問い合わせフォームはPHPを使用して実装しております．</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 wow fadeInLeftBig" data-wow-offset="200">
                        <div class="services-box border rounded shadow py-4 px-3">
                            <h4 class="text-custom text-center mb-4">WordPress</h4>
                            <div class="text-center">
                                <i class="fab fa-4x fa-wordpress"></i>
                            </div>
                            <p class="text-muted mt-4 mb-0">静的サイトだけでなく，WordPressなどのCMSを用いた動的サイトの開発機会も頻繁にございます．オリジナルテーマを使用し，0から制作を行った経験もございます．</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4 wow fadeInRightBig" data-wow-offset="200">
                        <div class="services-box border rounded shadow py-4 px-3">
                            <h4 class="text-custom text-center mb-4">Shopify</h4>
                            <div class="text-center">
                                <i class="fab fa-4x fa-shopify"></i>
                            </div>
                            <p class="text-muted mt-4 mb-0">Shopifyは世界的に普及しているECサイトプラットフォームです．開発にはRubyを元にしたLiquidという言語を使用します．コロナ禍の需要を見極め，最近ではShopifyサイト開発に力を注いでいます．</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Service -->

        <!--WORK -->   
        <section class="section text-center bg-white" id="works">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h2>My <span class="font-weight-bold">Works</span></h2>
                            <p class="text-muted mx-auto section-subtitle mt-3">過去の制作物の一部です．クリックすると各サイトに遷移します．</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <ul class="col list-unstyled list-inline mb-0 text-uppercase work_menu" id="menu-filter">
                        <li class="list-inline-item"><a class="active" data-filter="*">All</a></li>
                        <li class="list-inline-item"><a class="" data-filter=".web">Web Site</a></li>
                        <li class="list-inline-item"><a class="" data-filter=".wp">WordPress</a></li>
                        <li class="list-inline-item"><a class="" data-filter=".ec">EC Site</a></li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row mt-4 work-filter">
                    <div class="col-lg-4 work_item web">
                        <a href="/">
                            <div class="work_box">
                                <div class="work_img">
                                    <img src="./img/work_1.jpg" class="img-fluid mx-auto d-block rounded" alt="work-img">
                                </div>
                                <div class="work_detail">
                                    <p class="mb-2">Web Site</p>
                                    <h4 class="mb-0">ポートフォリオサイト</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 work_item web">
                        <a href="https://recpro.biz/">
                            <div class="work_box">
                                <div class="work_img">
                                    <img src="./img/work_2.jpg" class="img-fluid mx-auto d-block rounded" alt="work-img">
                                </div>
                                <div class="work_detail">
                                    <p class="mb-2">Web Site</p>
                                    <h4 class="mb-0">動画制作サービス<br>ホームページ</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 work_item wp">
                        <a href="https://aiiroday.com/">
                            <div class="work_box">
                                <div class="work_img">
                                    <img src="./img/work_3.jpg" class="img-fluid mx-auto d-block rounded" alt="work-img">
                                </div>
                                <div class="work_detail">
                                    <p class="mb-2">Word Press</p>
                                    <h4 class="mb-0">放課後デイサービス<br>ホームページ</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 work_item ec">
                        <a href="https://kura-shop.com/">
                            <div class="work_box">
                                <div class="work_img">
                                    <img src="./img/work_4.jpg" class="img-fluid mx-auto d-block rounded" alt="work-img">
                                </div>
                                <div class="work_detail">
                                    <p class="mb-2">EC Site</p>
                                    <h4 class="mb-0">生パスタのネットショップ</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 work_item ec">
                        <a href="https://saneiagri-shop.jp/">
                            <div class="work_box">
                                <div class="work_img">
                                    <img src="./img/work_5.jpg" class="img-fluid mx-auto d-block rounded" alt="work-img">
                                </div>
                                <div class="work_detail">
                                    <p class="mb-2">EC Site</p>
                                    <h4 class="mb-0">北海道野菜のネットショップ</h4>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </section><!--/WORK -->

        <section class="section bg-light" id="blog">
            <div class="container">
                <div class="row justify-content-center"> 
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h2>Blog</h2>
                            <p class="text-muted mx-auto section-subtitle mt-3">QiitaでShopifyに関する技術記事を書きました．</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                            <blockquote class="twitter-tweet" data-theme="light"><p lang="ja" dir="ltr">Qiita 初投稿<br><br>先日対応した案件で面白い機能を実装したので、アウトプットかねてまとめました。<br><br>◆実装した機能<br>・商品ページに，その商品に関連するブログ記事を表示する<br><br>・商品管理ページのメタフィールド欄に，ブログ記事のタイトルを入力する<a href="https://twitter.com/hashtag/Shopify?src=hash&amp;ref_src=twsrc%5Etfw">#Shopify</a> <a href="https://twitter.com/hashtag/Qiita?src=hash&amp;ref_src=twsrc%5Etfw">#Qiita</a><a href="https://t.co/zyNnmI4K41">https://t.co/zyNnmI4K41</a></p>&mdash; むささび びゅん太郎/大学生フリーランス (@musasabi_byun) <a href="https://twitter.com/musasabi_byun/status/1503699416146116617?ref_src=twsrc%5Etfw">March 15, 2022</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </section>

        <!--CONTACT -->
        <section class="section bg-wthite" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h2><span class="font-weight-bold">Contact</span> Me</h2>
                            <p class="text-muted mx-auto section-subtitle mt-3">こちらのフォームはPHPで実装しております．</p>
                            <p class="text-muted mx-auto section-subtitle mt-3">入力が完了した後に確認ボタンをクリックすると，確認ページへ遷移します．さらに確認ページで送信ボタンをクリックすると，情報が送信されます．</p>
                        </div>
                    </div>
                </div> 
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <div>
                                <i class="mbri-mobile2 text-custom h1"></i>
                            </div>
                            <div class="mt-3">
                                <h5 class="mb-0 contact_detail-title font-weight-bold">お電話</h5>
                                <p class="text-muted">070-2013-0050</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-center">
                            <div>
                                <i class="mbri-letter text-custom h1"></i>
                            </div>
                            <div class="mt-3">
                                <h5 class="mb-0 contact_detail-title font-weight-bold">メール</h5>
                                <p class="text-muted">murakami.shushushun@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="form-kerri contact_form">
                            <div id="message"></div>
                            <form action="/#contact" id="working_form" name="contact-form" method="POST" novalidate>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="お名前 (必須)" value="<?php echo htmlspecialchars($post['name']); ?>">
                                        </div>
                                        <?php if($error['name'] === 'blank'): ?>
                                            <p class="mb-3 text-custom">※ お名前をご入力ください．</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <input name="email" id="email" type="email" class="form-control" placeholder="メールアドレス (必須)" value="<?php echo htmlspecialchars($post['email']); ?>">
                                        </div>
                                        <?php if($error['email'] === 'blank'): ?>
                                            <p class="mb-3 text-custom">※ メールアドレスをご入力ください．</p>
                                        <?php elseif($error['email'] === 'email'): ?>
                                            <p class="mb-3 text-custom">※ メールアドレス正しくをご入力ください．</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-2">
                                            <input name="subject" id="subject" type="text" class="form-control" placeholder="件名" value="<?php echo htmlspecialchars($post['subject']); ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-2">
                                            <textarea name="contact" id="contact" rows="4" class="form-control" placeholder="お問い合わせ内容 (必須)" ><?php echo htmlspecialchars($post['contact']); ?></textarea>
                                        </div>
                                        <?php if($error['contact'] === 'blank'): ?>
                                            <p class="mb-3 text-custom">※ お問い合わせ内容をご入力ください．</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom text-uppercase" value="確認画面へ">
                                        <div id="simple-msg"></div>
                                    </div>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        </section><!-- /CONTACT -->

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
        <script src="./js/isotope.js"></script>
        <!-- Magnific Popup Js -->
        <script src="./js/jquery.magnific-popup.min.js"></script>
        <!-- TYPED -->
        <script src="./js/typed.js"></script>
        <!--PARTICLES ANIMATE JS-->
        <script src="./js/particles.js"></script>  
        <script src="./js/particles.app.js"></script> 
        <!-- OWL CAROUSEL -->
        <script src="./js/owl.carousel.min.js"></script>
        <!-- WOW JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <!--CUSTOM JS-->
        <script src="./js/custom.js"></script>
    </body>
</html>