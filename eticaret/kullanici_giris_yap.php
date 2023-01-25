<?php
session_start();
include "yonet/baglan.php";

if(isset($_POST['mail'],$_POST['password'])){
    $sorgu=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=? AND kullanici_sifre=?");
    $sorgu->execute(array($_POST['mail'],$_POST['password']));

    if($sorgu->rowCount()==1){
        $kullanici=$sorgu->fetch(PDO::FETCH_ASSOC);
        $_SESSION['kullanici_id']=$kullanici['kullanici_id'];
        $_SESSION['kullanici_adsoyad']=$kullanici['kullanici_adsoyad'];

        header("Location:./");
        exit;
    }
}
else if(isset($_GET['cikis'])){
    session_destroy();
    header("Location:./");
    exit;
}
header("Location:kullanici_giris.php?hata");


?>