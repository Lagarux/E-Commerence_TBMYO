<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- semantic web => yapay zeka ile öneri sağlama -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!--SweetAlert-->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  function KayitSil(id, tablo, p) {
    //alert('Deneme')
    $('#mdl-kayitsil-id').val(id)
    $('#mdl-kayitsil-tablo').val(tablo)
    $('#mdl-kayitsil-p').html(p)
    $('#modal-kayitsil').modal('show')
  }

  function KayitSilOnay() {
    var id = $('#mdl-kayitsil-id').val()
    var tablo = $('#mdl-kayitsil-tablo').val()
    //alert(tablo+id)

    window.location.replace("kayit_sil.php?tablo=" + tablo + "&id=" + id);
  }

  function StokAdetGuncelle(stok_id, stok_adet_input) {
    $(stok_adet_input).removeClass("is-valid");
    $(stok_adet_input).removeClass("is-invalid");
    $.ajax({
        method: "POST",
        url: "urun_stok_guncelle.php",
        data: {
          stok_id: stok_id,
          stok_adet: stok_adet_input.value
        }
      })
      .done(function(msg) {
        //alert("Data Saved: " + msg);
        if (msg == "true")
          $(stok_adet_input).addClass("is-valid");
        else
          $(stok_adet_input).addClass("is-invalid");
      })
      .fail(function() {
        $(stok_adet_input).addClass("is-invalid");
      });
  }


  $(function() {
    // toastr.success("İşlem başarılı bir şekilde gerçekleşti...");
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    let number = 999999999.99;
    number.toLocaleString('tr-TR', {
      currency: 'TRY',
      style: 'currency'
    });

    // $('[data-mask]').inputmask({'mask':"9{0,6}.99 TL", greedy: false},{ 'placeholder': '.00' });
    $("#urun_fiyat").maskMoney({
      suffix: ' ₺',
      allowNegative: true,
      thousands: '.',
      decimal: ',',
      affixesStay: false
    });
    $('[data-discount-mask]').inputmask({
      'mask': "%99.99",
      greedy: false
    }, {
      'placeholder': '.00'
    });

    // Summernote
    $('#summernote').summernote()

    $("#urun_tablosu").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#urun_tablosu_wrapper .col-md-6:eq(0)');


    <?php
    if (isset($_GET['sonuc'])) {
      if ($_GET['sonuc']) {
        echo "    
      Toast.fire({
        icon: 'success',
        title: 'İşlem Başarılı'
      });
    ";
      } else {
        echo "
      Toast.fire({
        icon: 'error',
        title: 'İşlem Geçersiz'
      });
    ";
      }
    }

    if (isset($_GET['sonuc_silme'])) {
      if ($_GET['sonuc_silme']) {
        echo "    
      Toast.fire({
        icon: 'success',
        title: 'Silme İşlemi başarılı'
      });
    ";
      } else {
        echo "
      Toast.fire({
        icon: 'error',
        title: 'Silme İşlemi gerçekleştirilemedi'
      });
    ";
      }
    }
    ?>

    $('#modal-danger').on('shown.bs.modal', function(event) {
      //var id = $(this).attr('data-id');
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id')

      $.ajax({
        url: "modal_ajax.php?id=" + id,
        cache: false,
        success: function(result) {
          $(".modal-content").html(result);

        }
      });
    });

    $('#modal-detail').on('shown.bs.modal', function(event) {
      //var id = $(this).attr('data-id');
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id')

      $.ajax({
        url: "modal_category_detail.php?id=" + id,
        cache: false,
        success: function(result) {
          $(".modal-content").html(result);

        }
      });
    });

   

    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

  });
</script>
</body>

</html>