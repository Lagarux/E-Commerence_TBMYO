<?php
      include "baglan.php";

    $id=$_GET['id'];
    $query=$db->prepare("SELECT * from urun WHERE urun_id='{$id}'");
    $query->execute();
    $veri=$query->fetch(PDO::FETCH_ASSOC);


?>

<div class="modal-header">
    <h4 class="modal-title">Ürün Silme Ekranı</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <p>Ürün ID : <b><?php echo $veri['urun_id'] ?></b></p>
    <p>Ürün Adı : <b style="font-size:1.1rem ;"><?php echo $veri['urun_adi'] ?></b></p>
    <p>Seçili ürünü silmek istediğinizden emin misiniz?</p>
</div>
<div class="modal-footer justify-content-between">
<form action="urun_sil.php" method="POST">
    <!-- <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button> -->
    <input id="delete-val" type="hidden" name="id" value="<?php echo $veri['urun_id']?>">
    <button type="submit" class="btn btn-outline-light">Evet</a>
    </form>
</div>

<!-- jQuery Confirm methodu -->
<?php ?>