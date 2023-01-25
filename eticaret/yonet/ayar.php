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
              <h5 class="m-0">Ayarlar Kısmı</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Bu kısımdan ilgili düzenlemeleri yapabilirsiniz</h6>

              <p class="card-text">Yapmak istediğiniz ayarlamalar aşağıda bulunmaktadır</p>
              <a href="./" class="btn btn-primary">Ana Sayfaya Dön</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Horizontal Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="ayar_kaydet.php" method="POST" class="form-horizontal">
          <div class="card-body">
            <hr>
            <div class="form-group row">
              <label for="Başlık" class="col-sm-2 col-form-label">Başlık</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ayar_baslik" id="ayar_baslik" placeholder="Web sayfanızın başlığını giriniz" value="<?php echo $ayar['ayar_baslik'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="Açıklama" class="col-sm-2 col-form-label">Açıklama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ayar_aciklama" id="ayar_aciklama" placeholder="Web sayfanızın açıklamasını giriniz" value="<?php echo $ayar['ayar_aciklama'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="Anahtar Kelimeler" class="col-sm-2 col-form-label">Anahtar Kelimeler</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ayar_keywords" id="ayar_keywords" placeholder="Web sayfanızın anahtar kelimelerini giriniz" value="<?php echo $ayar['ayar_keywords'] ?>">
              </div>
            </div>
            <hr>

            <div class="form-group row">
              <label for="Facebook" class="col-sm-2 col-form-label">Facebook Adresi</label>
              <div class="input-group  col-sm-10">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-brands fa-facebook"></i></span>
                </div>
                <input type="text" class="form-control" name="ayar_facebook" id="ayar_facebook" placeholder="Varsa Facebook Adresiniz" value="<?php echo $ayar['ayar_facebook'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="Twitter" class="col-sm-2 col-form-label">Twitter Adresi</label>
              <div class="input-group  col-sm-10">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-brands fa-twitter"></i></span>
                </div>
                <input type="text" class="form-control" name="ayar_twitter" id="ayar_twitter" placeholder="Varsa Twitter Adresiniz" value="<?php echo $ayar['ayar_twitter'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="Instagram" class="col-sm-2 col-form-label">Instagram Adresi</label>
              <div class="input-group  col-sm-10">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-brands fa-instagram"></i></span>
                </div>
                <input type="text" class="form-control" name="ayar_instagram" id="ayar_instagram" placeholder="Varsa Instagram Adresiniz" value="<?php echo $ayar['ayar_instagram'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="Youtube" class="col-sm-2 col-form-label">Youtube Adresi</label>
              <div class="input-group  col-sm-10">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-brands fa-youtube"></i></span>
                </div>
                <input type="text" class="form-control" name="ayar_youtube" id="ayar_youtube" placeholder="Varsa Youtube Adresiniz" value="<?php echo $ayar['ayar_youtube'] ?>">
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <label for="Mail" class="col-sm-2 col-form-label">Mail SMTP Sunucusu</label>
              <div class="input-group  col-sm-10">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control" name="ayar_msunucu" id="ayar_msunucu" placeholder="Mail Sunucunuzu giriniz" value="<?php echo $ayar['ayar_msunucu'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="Sunucu Portu" class="col-sm-2 col-form-label">Sunucu Portu</label>
              <div class="col-sm-10">
                <input type="number" maxlength="4" class="form-control" name="ayar_mport" id="ayar_mport" placeholder="Web sayfanızın başlığını giriniz" value="<?php echo $ayar['ayar_mport'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="Mail Şifresi" class="col-sm-2 col-form-label">Mail Şifresi</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="ayar_msifre" id="ayar_msifre" placeholder="Mail Şifrenizi Giriniz" value="<?php echo $ayar['ayar_msifre'] ?>">
              </div>
            </div>


            <div class="form-group row">
              <label for="Admin E-Posta" class="col-sm-2 col-form-label">Admin E-Posta Adresi</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="ayar_madres" id="ayar_madres" placeholder="Web sayfanızın başlığını giriniz" value="<?php echo $ayar['ayar_madres'] ?>">
              </div>
            </div>

          </div>
          
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-outline-info btn-block toastrDefaultSuccess sonuc">Kaydet</button>
            
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "alt.php" ?>