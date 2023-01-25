<?php 
include "yonet/baglan.php";
if(isset($_GET['id'])){
    $silSorgusu=$db->prepare("DELETE FROM sepet WHERE sepet_kullanici_id=?");
    $sonuc=$silSorgusu->execute(array($_GET['id']));
}
header("Location:sepet.php?silme=".$sonuc);



?>