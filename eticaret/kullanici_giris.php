<?php include "ust.php"; ?>

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Contact</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Contact</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-lg-12 contact-info">
					<h3 class="text-center">Giriş Yap</h3>
                    <?php if(isset($_GET['hata'])) echo '<p class="text-center text-danger">Kullanıcı mail veya şifre hatalı !!!!</p>' ?>
					</div>
					<form action="kullanici_giris_yap.php" method="POST" class="contact-form">
						<input type="mail" name="mail" placeholder="Mail Adresinizi Giriniz">
						<input type="password" name="password" placeholder="Şifrenizi Giriniz">
						<button class="site-btn">Giriş Yap</button>
					</form>
				</div>
			</div>
		</div>
		
	</section>



<?php include "alt.php" ?>
