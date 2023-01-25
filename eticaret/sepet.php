<?php include "ust.php";

if (!isset($_SESSION['kullanici_id'])) {
	header("Location:kullanici_giris.php");
	exit;
}
?>



<!-- Page info -->
<div class="page-top-info">
	<div class="container">
		<h4>Sepetiniz</h4>
		<div class="site-pagination">
			<a href="">Ana Sayfa</a> /
			<a href="">Sepet</a>
		</div>
	</div>
</div>
<!-- Page info end -->
<?php
$kSepetSorgusu = $db->prepare("SELECT sepet_id,urun.urun_id,urun.urun_indirim as indirim_orani,urun.urun_fiyat-(urun.urun_fiyat * urun.urun_indirim)/100 as indirimli_fiyat,sepet_stok_id,urun.urun_adi,urun.urun_fiyat ,sepet_miktar,(urun.urun_fiyat-(urun.urun_fiyat * urun.urun_indirim)/100) * sepet_miktar AS total_u_f FROM urun
INNER JOIN sepet ON urun.urun_id=sepet.sepet_urun_id
WHERE sepet_kullanici_id=?");
$kSepetSorgusu->execute(array($_SESSION['kullanici_id']));
$grandTotal = 0;

?>

<!-- cart section end -->
<section class="cart-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="cart-table">
					<div class="row">
						<div class="col-lg-6">
							<h3>Sepet Listesi</h3>
						</div>
						<?php if($kSepetSorgusu->rowCount()!=0){ ?>
						<div class="col-lg-6"><a href="sepet_temizle.php?id=<?php echo $_SESSION['kullanici_id'] ?>" class="site-btn">Sepeti Temizle</a></div>
						<?php }else{ echo "<h6 style='margin: 0 auto;color:red;font-size:24px'>Sepetiniz boş</h6>";} ?>

					</div>
					<div class="cart-table-warp">
						<table>
							<thead>
								<tr>
									<th class="product-th">Ürün</th>
									<th class="quy-th">Miktar</th>
									<th class="size-th">İndirim Oranı</th>
									<th class="total-th"> Ürün Total Fiyatı</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
								while ($row = $kSepetSorgusu->fetch(PDO::FETCH_ASSOC)) { ?>
									<tr>
										<td class="product-col">
											<div class="pc-title">
												<input type="hidden" name="sepet_id" value="<?php echo $row['sepet_id'] ?>">
												<input type="hidden" name="urun_id" value="<?php echo $row['urun_id'] ?>">
												<input type="hidden" name="sepet_stok_id" value="<?php echo $row['sepet_stok_id'] ?>">
												<h4><?php echo $row['urun_adi'] ?></h4>
												<?php if($row['indirim_orani']!=0){ ?>
												<p style="text-decoration:line-through;"><?php echo $row['urun_fiyat'] . " ₺" ?></p>
												<?php } ?>
												<p><?php echo number_format($row['indirimli_fiyat'], 2, ".", ",") . " ₺" ?></p>
											</div>
										</td>
										<td class="quy-col">
											<div class="quantity">
												<div class="pro-qty">
													<input class="itemQty" type="text" value="<?php echo $row['sepet_miktar'] ?>">
												</div>
											</div>
										</td>
										<td class="size-col">
											<h4><?php echo "%" . $row['indirim_orani'] ?></h4>
										</td>
										<td class="total-col">
											<h4 class="satirTotal"><?php echo number_format($row['total_u_f'], 2, ".", ",") . " ₺" ?></h4>
										</td>
										<td class="total-col">
											<a href="sepetten_sil.php?urun_id=<?php echo $row['urun_id'] ?>">
												<script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
												<lord-icon src="https://cdn.lordicon.com/jmkrnisz.json" trigger="hover" colors="primary:#e83a30" style="width:25px;height:25px;cursor:pointer">
												</lord-icon>
											</a>
										</td>
									</tr>
									<?php $grandTotal += $row['total_u_f']; ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="total-cost">
						<h6>Genel Toplam <span class="grandTotal"><?php echo $grandTotal . " ₺" ?></span></h6>
					</div>
				</div>
			</div>
			<div class="col-lg-4 card-right">
				<a href="" class="site-btn">Ödemeyi Gerçekleştir</a>
				<a href="./" class="site-btn sb-dark">Alışverişe Devam Et</a>
			</div>
		</div>
	</div>
</section>
<!-- cart section end -->

<!-- Related product section end -->
<?php include "alt.php" ?>