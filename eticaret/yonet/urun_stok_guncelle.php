<?php
include "baglan.php";

if (isset($_POST['stok_id'], $_POST['stok_adet'])) {
    $sorgu = $db->prepare("UPDATE urun_stok SET stok_adet=? WHERE stok_id=?");
    $sorgu->execute(array($_POST['stok_adet'], $_POST['stok_id']));

    if ($sorgu->errorInfo()[1] == "")
        echo "true";
    else
        echo "false";
} else
    echo "false";
?>