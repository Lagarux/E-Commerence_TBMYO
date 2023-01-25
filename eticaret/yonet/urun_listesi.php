<?php include "ust.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">


          <div class="card card-primary card-outline mt-4">
            <div class="card-header">
              <h5 class="m-0">Ürünler</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-dark table-striped" id="urun_tablosu">
                <thead>
                  <tr>
                    <th>Ürünü Düzenle</th>
                    <th>Barkod</th>
                    <th>Ürün Adı</th>
                    <th>Fiyat</th>
                    <th>İndirim Oranı</th>
                    <th>Marka</th>
                    <th>Görüntülenme</th>
                    <th>Ürünü Sil</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sorgu = $db->prepare("SELECT * FROM urun");
                  $sorgu->execute();
                  while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                    <tr>
                      <td><a href="urun_detay.php?id=<?php echo $satir['urun_id'] ?>"><i class="fa-solid fa-pen-to-square"></i> Ürünü Düzenle</a></td>
                      <td><?php echo $satir['urun_barkod'] ?></td>
                      <td><?php echo $satir['urun_adi'] ?></td>
                      <td><?php echo $satir['urun_fiyat']." ₺" ?></td>
                      <td><?php echo $satir['urun_indirim'] ?></td>
                      <td><?php echo $satir['urun_marka'] ?></td>
                      <td><?php echo $satir['urun_gorulme_sayisi'] ?></td>
                      <td style="text-align:center ;">
                      <a href="" class="openModal2" style="color:red" data-id="<?php echo $satir['urun_id'] ?>" data-toggle="modal" data-target="#modal-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>

                  <?php
                  }

                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!--Product Delete Modal-->
<div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.content-wrapper -->
<?php include "alt.php" ?>