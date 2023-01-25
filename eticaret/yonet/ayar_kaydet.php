<?php
include "baglan.php";

if(isset($_POST['ayar_baslik']) && isset($_POST['ayar_aciklama']) && isset($_POST['ayar_keywords']) && isset($_POST['ayar_mport']) && isset($_POST['ayar_msunucu']))
{
    $sorgu=$db->prepare("UPDATE ayar SET 
    ayar_baslik=:ayar_baslik,
    ayar_aciklama=:ayar_aciklama,
    ayar_keywords=:ayar_keywords,
    ayar_facebook=:ayar_facebook,
    ayar_twitter=:ayar_twitter,
    ayar_instagram=:ayar_instagram,
    ayar_youtube=:ayar_youtube,
    ayar_msunucu=:ayar_msunucu,
    ayar_madres=:ayar_madres,
    ayar_msifre=:ayar_msifre,
    ayar_mport=:ayar_mport

    WHERE ayar_id=1

    ");
    $update = $sorgu->execute(array(
        "ayar_baslik" => $_POST['ayar_baslik'],
        "ayar_aciklama" => $_POST['ayar_aciklama'],
        "ayar_keywords" => $_POST['ayar_keywords'],
        "ayar_facebook" => $_POST['ayar_facebook'],
        "ayar_twitter" => $_POST['ayar_twitter'],
        "ayar_instagram" => $_POST['ayar_instagram'],
        "ayar_youtube" => $_POST['ayar_youtube'],
        "ayar_msunucu" => $_POST['ayar_msunucu'],
        "ayar_madres" => $_POST['ayar_madres'],
        "ayar_msifre" => $_POST['ayar_msifre'],
        "ayar_mport" => $_POST['ayar_mport']
   ));
}

header("Location:ayar.php?sonuc=".$update);
?>