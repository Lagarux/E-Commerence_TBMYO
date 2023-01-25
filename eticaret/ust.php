<?php
ob_start();
session_start();
include "yonet/baglan.php";

$sorgu = $db->prepare("SELECT * FROM ayar");
$sorgu->execute();
$ayar = $sorgu->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?php echo $ayar['ayar_baslik'] ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $ayar['ayar_aciklama'] ?>">
    <meta name="keywords" content="<?php echo $ayar['ayar_keywords'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!--SweetAlert-->
  <link rel="stylesheet" href="yonet/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">


    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 text-center text-lg-left">
                        <!-- logo -->
                        <a href="./" class="site-logo">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <form class="header-search-form">
                            <input type="text" placeholder="Search on divisima ....">
                            <button><i class="flaticon-search"></i></button>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="user-panel">
                            <div class="up-item">
                                <i class="flaticon-profile"></i>
                                <?php if (isset($_SESSION['kullanici_id'])) { ?>
                                    <a href="kullanici_giris.php"><?php echo $_SESSION['kullanici_adsoyad'] ?></a> 
                                    | 
                                    <a href="kullanici_giris_yap.php?cikis">Çıkış Yap</a>
                                <?php } else { ?>
                                    <a href="kullanici_giris.php">Giriş Yap | Kaydol</a>
                                <?php } ?>
                            </div>
                            <div class="up-item">
                                <div class="shopping-card">
                                    <i class="flaticon-bag"></i>
                                    <?php
                                       if(isset($_SESSION['kullanici_id'])){
                                        $sepetSorgu=$db->prepare("SELECT * FROM sepet WHERE sepet_kullanici_id=?");
                                        $sepetSorgu->execute(array($_SESSION['kullanici_id']));
                                        $adet=$sepetSorgu->rowCount();
                                     ?>
                                    <span><?php echo $adet; ?></span>

                                    <?php } else{echo "<span>0</span>";} ?>
                                </div>
                                <a href="sepet.php">Sepete Git</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="main-navbar">
            <div class="container">
                <!-- menu -->
                <ul class="main-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Jewelry
                            <span class="new">New</span>
                        </a></li>
                    <li><a href="#">Shoes</a>
                        <ul class="sub-menu">
                            <li><a href="#">Sneakers</a></li>
                            <li><a href="#">Sandals</a></li>
                            <li><a href="#">Formal Shoes</a></li>
                            <li><a href="#">Boots</a></li>
                            <li><a href="#">Flip Flops</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="./product.html">Product Page</a></li>
                            <li><a href="./category.html">Category Page</a></li>
                            <li><a href="./cart.html">Cart Page</a></li>
                            <li><a href="./checkout.html">Checkout Page</a></li>
                            <li><a href="./contact.html">Contact Page</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Header section end -->