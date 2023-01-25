
<?php
include "baglan.php";
if(isset($_POST['id']))
{
   $query = $db->prepare("DELETE FROM urun WHERE urun_id = :id");
   $delete = $query->execute(array(
      'id' => $_POST['id']
   ));
   header("Location:urun_listesi.php?sonuc_silme=".$delete);
}
 else{
    header("Location:urun_listesi.php?sonuc_silme=0");
 }

?>