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
              <h5 class="m-0">Featured</h5>
            </div>
            <div class="card-body">
              <?php
              function kategoriListele($kategoriID=0){
                global $db;
                $sorgu=$db->prepare("SELECT * from kategori WHERE kategori_ust_id=? ORDER BY kategori_sira");
                $sorgu->execute(array($kategoriID));
                if($sorgu->rowCount() == 0)
                      return;
                
                echo "<ul>";
                while($satir=$sorgu->fetch(PDO::FETCH_ASSOC)){
                  echo "<li><a href='' data-id='".$satir['kategori_id']."' data-toggle='modal' data-target='#modal-detail'>".$satir['kategori_adi'];
                  kategoriListele($satir['kategori_id']);
                  echo "</a></li>";
                }
                echo "</ul>";

              }
              kategoriListele();
              
              ?>
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
<!--Category Detail Modal-->
<div class="modal fade" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content bg-warning">
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.content-wrapper -->
<?php include "alt.php" ?>