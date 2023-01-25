<?php
include "baglan.php";

if (isset($_GET['tablo']) && isset($_GET['id'])) {
    if ($_GET['tablo'] == "urun") {
        $sorgu = $db->prepare("DELETE FROM urun WHERE urun_id=?");
        $sonuc = $sorgu->execute(array($_GET['id']));

        header("Location:urun_listesi.php?sonuc=" . $sonuc);
        exit;
    } elseif ($_GET['tablo'] == "urunstok") {
        $sorgu = $db->prepare("DELETE FROM urun_stok WHERE stok_id=?");
        $sonuc = $sorgu->execute(array($_GET['id']));

        header("Location:urun_listesi.php?sonuc=" . $sonuc);
        exit;
    }
}
header("Location:./");
?>