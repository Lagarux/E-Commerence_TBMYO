<?php
include "baglan.php";
if(isset($_POST['urun_id'],$_POST['urun_kategori_id'],$_POST['urun_barkod'],$_POST['urun_adi'],$_POST['urun_aciklama'],$_POST['urun_fiyat'],$_POST['urun_indirim'],/*$_POST['urun_vitrin'],*/$_POST['urun_marka']))
{
    $sorgu="urun SET 
    urun_kategori_id=:urun_kategori_id,
    urun_barkod=:urun_barkod,
    urun_adi=:urun_adi,
    urun_aciklama=:urun_aciklama,
    urun_fiyat=:urun_fiyat,
    urun_indirim=:urun_indirim,
    urun_vitrin=:urun_vitrin,
    urun_marka=:urun_marka";

    $queryArray=array(
        'urun_kategori_id'=>$_POST['urun_kategori_id'],
        'urun_barkod'=>$_POST['urun_barkod'],
        'urun_adi'=>$_POST['urun_adi'],
        'urun_aciklama'=>$_POST['urun_aciklama'],
        'urun_fiyat'=>str_replace(",",".",str_replace(" TL","",str_replace(".","",$_POST['urun_fiyat']))),
        'urun_indirim'=>str_replace("%","",$_POST['urun_indirim']),
        'urun_vitrin'=>(isset($_POST['urun_vitrin']) ? 1 : 0),
        'urun_marka'=>$_POST['urun_marka']
    );

    if($_POST['urun_id']>0)
    {
        $sorgu="UPDATE ".$sorgu." WHERE urun_id=:urun_id";
        $queryArray['urun_id']=$_POST['urun_id'];
    }
    else{
        $sorgu="INSERT INTO " . $sorgu;
    }

    $sorgu = $db->prepare($sorgu);
    $sonuc= $sorgu->execute($queryArray);

    print_r($_POST);
    print_r($sorgu->errorInfo());

    if($_POST['urun_id']==0)
        $_POST['urun_id']=$db->lastInsertId();

    header("Location:urun_detay.php?id=".$_POST['urun_id'].'&sonuc='.$sonuc);
    exit;
}
print_r($_POST);
?>