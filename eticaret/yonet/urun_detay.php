<?php include "ust.php";
if (isset($_GET['id'])) {
  $try = $db->prepare("SELECT * FROM urun WHERE urun_id=?");
  $try->execute(array($_GET['id']));

  $row = $try->fetch(PDO::FETCH_ASSOC);
} else {
  $row = array(
    'urun_id' => 0,
    'urun_kategori_id' => '',
    'urun_vitrin' => '',
    'urun_barkod' => '',
    'urun_adi' => '',
    'urun_aciklama' => '',
    'urun_fiyat' => '',
    'urun_indirim' => '',
    'urun_marka' => ''
  );
}


?>

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
              <h5 class="m-0"><?php echo (isset($_GET['id']) ? $row['urun_adi'] : 'Yeni Ürün Ekle') ?></h5>
            </div>
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs" id="urun-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="urun-detay-tab" data-toggle="pill" href="#urun-detay" role="tab" aria-controls="urun-detay" aria-selected="true">Detay</a>
                </li>
                <?php if ($row['urun_id'] > 0) { ?>
                  <li class="nav-item">
                    <a class="nav-link" id="urun-stok-tab" data-toggle="pill" href="#urun-stok" role="tab" aria-controls="urun-stok" aria-selected="false">Stok</a>
                  </li>
                <?php } ?>
              </ul>
            </div>

            <div class="tab-content" id="urun-tabContent">
              <div class="tab-pane fade show active" id="urun-detay" role="tabpanel" aria-labelledby="urun-detay-tab">
                <form action="urun_kaydet.php" method="POST" class="form-horizontal">
                  <input type="hidden" name="urun_id" value="<?php echo $row['urun_id'] ?>">

                  <div class="card-body">
                    <hr>
                    <div class="form-group row">
                      <label for="Kategori ID" class="col-sm-2 col-form-label">Kategori ID</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="urun_kategori_id" id="urun_kategori_id" placeholder="Ürün kategori ID bilgisini giriniz" value="<?php echo $row['urun_kategori_id'] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="Barkod - Kod" class="col-sm-2 col-form-label">Barkod / Kod</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="urun_barkod" id="urun_barkod" placeholder="Ürün barkodunu giriniz" value="<?php echo $row['urun_barkod'] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ürünün Adı</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="urun_adi" id="urun_adi" placeholder="Ürün adını giriniz" value="<?php echo $row['urun_adi'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Fiyat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" data-mask="" inputmode="decimal" name="urun_fiyat" id="urun_fiyat" placeholder="Ürün fiyatını giriniz" value="<?php echo $row['urun_fiyat'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ürün Açıklaması</label>
                      <div class="col-sm-10">
                        <textarea rows="5" cols="30" class="form-control" name="urun_aciklama" id="summernote" placeholder="Ürün Açıklamasını Giriniz"><?php echo $row['urun_aciklama'] ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ürün İndirim Yüzdesi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" data-discount-mask="" name="urun_indirim" id="urun_indirim" placeholder="Ürün İndirim Yüzdesi giriniz" value="<?php echo $row['urun_indirim'] ?>">
                      </div>
                    </div>
                    <div class="form-group clearfix row">
                      <label class="col-sm-2 col-form-label">Ürün Vitrin Durumu</label>
                      <div class="col-sm-10" style="display: flex;justify-content: space-around;">
                        <div class="icheck-primary d-inline"> <input <?php echo (($row['urun_vitrin'] == 0) ?  "checked" : ""); ?> type="radio" class="form-control" name="urun_vitrin" id="showcased" placeholder="Ürün İndirim Yüzdesi giriniz" value="0"><label for="showcased">Vitrinde Değil</label> </div>
                        <div class="icheck-primary d-inline"> <input <?php echo (($row['urun_vitrin'] == 1) ?  "checked" : ""); ?> type="radio" class="form-control" name="urun_vitrin" id="n_showcased" placeholder="Ürün İndirim Yüzdesi giriniz" value="1"><label for="n_showcased">Vitrinde</label> </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Ürün Markası</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="urun_marka" id="urun_marka" placeholder="Ürün Markasını giriniz" value="<?php echo $row['urun_marka'] ?>">
                      </div>
                    </div>
                    <?php
                    if (isset($_GET['id'])) {
                    ?>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ürün Görüntülenme Sayısı</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="urun_gorulme_sayisi" id="urun_gorulme_sayisi" value="<?php echo $row['urun_gorulme_sayisi'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ürün Eklenme Tarihi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="urun_eklenme_tarihi" id="urun_eklenme_tarihi" value="<?php echo $row['urun_eklenme_tarihi'] ?>">
                        </div>
                      </div>
                    <?php } ?>

                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-outline-info btn-block toastrDefaultSuccess sonuc">Kaydet</button>

                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <?php if ($row['urun_id'] > 0) { ?>
                <div class="tab-pane fade" id="urun-stok" role="tabpanel" aria-labelledby="urun-stok-tab">
                  <div class="card-body">
                    <h1>Stok Bilgileri</h1>
                    <table class="table">
                      <tr>
                        <th>#</th>
                        <th>Renk</th>
                        <th>Beden</th>
                        <th>Adet</th>
                        <th></th>
                      </tr>
                      <?php
                      $satirNo = 0;
                      $try = $db->prepare("SELECT * FROM urun_stok WHERE urun_id=?");
                      $try->execute(array($row['urun_id']));

                      while ($row = $try->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                        <tr>
                          <td><?php echo ++$satirNo ?></td>
                          <td>
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-square mr-2" style="color: #<?php echo $row['stok_renk'] ?>;"></i>
                                #<?php echo $row['stok_renk'] ?>
                              </span>
                            </div>
                          </td>
                          <td><?php echo $row['stok_beden'] ?></td>
                          <td><input type="number" class="form-control" name="stok_adet" value="<?php echo $row['stok_adet'] ?>"  onchange="StokAdetGuncelle(<?php echo $row['stok_id'] ?>,this)"></td>
                          <td>
                            <button type="button" class="btn btn-danger btn-xs" onclick="KayitSil(
                                      <?php echo $row['stok_id'] ?>
                                      ,'urunstok'
                                      ,'Ürüne ait <b><?php echo $row['stok_beden'] ?> bedenli</b> stok kaydı silinecek.<br>Onaylıyor musunuz?'
                                      )">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                      <form action="urun_stok_kaydet.php" method="POST">
                        <input type="hidden" name="urun_id" value="<?php echo $_GET['id'] ?>">
                        <tr>
                          <td><?php echo ++$satirNo ?></td>
                          <td>
                            <div class="input-group my-colorpicker2">
                              <input type="text" class="form-control" name="stok_renk">

                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square"></i></span>
                              </div>
                            </div>
                          </td>
                          <td><input type="text" class="form-control" name="stok_beden"></td>
                          <td><input type="text" class="form-control" name="stok_adet"></td>
                          <td>
                            <button type="submit" class="btn btn-success btn-xs">
                              <i class="fas fa-save"></i>
                            </button>
                          </td>
                        </tr>
                      </form>
                    </table>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
      <!-- Registery Deletation Modal Start -->
      <div class="modal fade" id="modal-kayitsil">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Kayıt Silme Onayı</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="mdl-kayitsil-id">
              <input type="hidden" id="mdl-kayitsil-tablo">
              <p id="mdl-kayitsil-p"></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">İptal</button>
              <button type="button" class="btn btn-outline-light" onclick="KayitSilOnay()">Evet</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "alt.php" ?>