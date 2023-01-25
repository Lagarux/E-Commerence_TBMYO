<?php
include "baglan.php";

if (isset($_POST['urun_id'], $_POST['stok_renk'], $_POST['stok_beden'], $_POST['stok_adet'])) {
    $sorgu = $db->prepare("INSERT INTO urun_stok(urun_id,stok_renk,stok_beden,stok_adet)
        VALUES(:urun_id,:stok_renk,:stok_beden,:stok_adet)");
    $sonuc = $sorgu->execute(array(
        'urun_id' => $_POST['urun_id'],
        'stok_renk' => str_replace("#", "", $_POST['stok_renk']),
        'stok_beden' => $_POST['stok_beden'],
        'stok_adet' => $_POST['stok_adet']
    ));

    header("Location:urun_detay.php?id=" . $_POST['urun_id'] . '&sonuc=' . $sonuc);
    exit;
}

//print_r($_POST);
header("Location:./");
?>