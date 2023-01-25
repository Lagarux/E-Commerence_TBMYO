<?php
include "baglan.php";
if (isset($_POST['id'], $_POST['name'], $_POST['query_id'], $_POST['base_id'])) {
    $sorgu = $db->prepare("UPDATE kategori SET kategori_adi=:kategori_adi,
                                             kategori_sira=:kategori_sira,
                                             kategori_ust_id=:kategori_ust_id WHERE kategori_id=:kategori_id");
    $sonuc = $sorgu->execute(array(
        'kategori_adi' => $_POST['name'],
        'kategori_sira' => $_POST['query_id'],
        'kategori_ust_id' => $_POST['base_id'],
        'kategori_id' => $_POST['id']
    ));

    print_r($sorgu->errorInfo());
    echo $_POST['id'] . " " . $_POST['name'] . " " . $_POST['query_id'] . " " . $_POST['base_id'] . " => Sonuç : " . $sonuc;
}
