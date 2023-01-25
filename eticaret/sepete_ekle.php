<?php
session_start();
include "yonet/baglan.php";

if (isset($_SESSION['kullanici_id'])) {
    if (isset($_GET['urun_id'], $_GET['stok_id'], $_GET['miktar'])) {
        $sorgu = $db->prepare("SELECT sepet_id FROM sepet WHERE sepet_kullanici_id=? AND sepet_urun_id=? AND sepet_stok_id=?");
        $sorgu->execute(array($_SESSION['kullanici_id'], $_GET['urun_id'], $_GET['stok_id']));
        if ($sorgu->rowCount() == 0) {
            $sorgu = $db->prepare("INSERT INTO sepet(sepet_kullanici_id,sepet_urun_id,sepet_stok_id,sepet_miktar)
                VALUES (?,?,?,?)");
            $sonuc = $sorgu->execute(array($_SESSION['kullanici_id'], $_GET['urun_id'], $_GET['stok_id'], $_GET['miktar']));
        } else {
            $sepet_id = $sorgu->fetch(PDO::FETCH_NUM)[0];

            $sorgu = $db->prepare("UPDATE sepet SET sepet_miktar=? WHERE sepet_id=?");
            $sonuc = $sorgu->execute(array($_GET['miktar'], $sepet_id));
        }
        header("Location:sepet.php?sonuc=" . $sonuc);
        exit;
    } else if (isset($_GET['sepet_id'], $_GET['miktar'])) {
        $sorgu = $db->prepare("UPDATE sepet SET sepet_miktar=? WHERE sepet_id=? AND sepet_kullanici_id=?");
        $sonuc = $sorgu->execute(array($_GET['miktar'], $_GET['sepet_id'], $_SESSION['kullanici_id']));

        $satirFiyat = $db->prepare("SELECT (urun.urun_fiyat-(urun.urun_fiyat * urun.urun_indirim)/100) * sepet.sepet_miktar FROM urun
                INNER JOIN sepet ON urun.urun_id=sepet.sepet_urun_id
                WHERE sepet.sepet_kullanici_id=? AND sepet_id=?");
        $satirFiyat->execute(array($_SESSION['kullanici_id'], $_GET['sepet_id']));

        $genelFiyat = $db->prepare("SELECT SUM((urun.urun_fiyat-(urun.urun_fiyat * urun.urun_indirim)/100) * sepet.sepet_miktar) FROM urun
        INNER JOIN sepet ON urun.urun_id=sepet.sepet_urun_id
        WHERE sepet.sepet_kullanici_id=?");
        $genelFiyat->execute(array($_SESSION['kullanici_id']));

        echo number_format($satirFiyat->fetch(PDO::FETCH_NUM)[0],2,",",".")
        ."|".number_format($genelFiyat->fetch(PDO::FETCH_NUM)[0],2,",",".");
    }
} else {
    header("Location:kullanici_giris.php");
    exit;
}
