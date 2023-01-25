<?php
include "baglan.php";

$id = $_GET['id'];
$query = $db->prepare("SELECT * from kategori WHERE kategori_id='{$id}'");
$query->execute();
$veri = $query->fetch(PDO::FETCH_ASSOC);
$selectedTopID = $veri['kategori_ust_id'];

$query2 = $db->prepare("SELECT kategori_adi from kategori WHERE kategori_id='" . $veri['kategori_ust_id'] . "'");
$query2->execute();
$veriUst = $query2->fetch(PDO::FETCH_ASSOC);

function ListCategory($CategoryID = 0)
{
    global $db, $id, $selectedTopID;
    $sQuery = $db->prepare("SELECT * FROM kategori WHERE kategori_ust_id=? ORDER BY kategori_sira");
    $sQuery->execute(array($CategoryID));

    if ($sQuery->rowCount() == 0)
        return;

    while ($row = $sQuery->fetch(PDO::FETCH_ASSOC)) {
        if ($row['kategori_id'] == $id)
            continue;
        echo '<option value="' . $row['kategori_id'] . '" ' . ($row['kategori_id'] == $selectedTopID ? "selected" : "") . '>' . $row['kategori_adi'] . '</option>';
        ListCategory($row['kategori_id']);
    }
}

?>

<div class="modal-header">
    <h4 class="modal-title">Kategori Detayları ve İşlemleri</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <input type="hidden" name="kategori_id" id="kategori_id" value=" <?php echo $veri['kategori_id'] ?>">
    <div class="form-group">
        <label for="kategori_adi">Kategori Adı </label>
        <input class="form-control" type="text" name="kategori_adi" id="kategori_adi" value="<?php echo $veri['kategori_adi'] ?>">
    </div>

    <div class="form-group">
        <label for="kategori_ust_adi">Üst Kategori Başlığı</label>
        <select name="kategori_ust_adi" id="kategori_ust_adi" class="form-control">
            <?php ListCategory() ?>
        </select>
    </div>

    <div class="form-group">
        <label for="kategori_sira">Kategori Sırası </label>
        <input class="form-control" type="text" name="kategori_sira" id="kategori_sira" value="<?php echo $veri['kategori_sira'] ?>">
    </div>

    <div class="form-group">
        <label for="kategori_sira">Ana Kategori mi? </label>
        <div class="form-check">
            <input class="form-check-input" id="Main" type="radio" name="Secim" value="0" <?php echo ($veri['kategori_ust_id'] == 0) ? 'checked' : '' ?>>
            <label class="form-check-label">Evet</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" id="Sub" type="radio" name="Secim" value="1" <?php echo ($veri['kategori_ust_id'] != 0) ? 'checked' : '' ?>>
            <label class="form-check-label">Hayır</label>
        </div>
    </div>


    <p>Bu kategori için hangi işlemi yapmak istersiniz?</p>
</div>
<div class="modal-footer justify-content-between">
    <!-- <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button> -->
    <input id="delete-val" type="hidden" name="id" value="<?php echo $veri['kategori_id'] ?>">
    <button type="submit" class="btn btn-outline-danger">Sil</button>

    <button id="update_category" class="btn btn-outline-info">Güncelle</button>

</div>

<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('#Sub').click(function(){
            $('#Sub').attr('checked',true);
            $('#Main').removeAttr('checked');
        })
        $('#Main').click(function(){
            $('#Main').attr('checked',true);
            $('#Sub').removeAttr('checked');
        })


        $('#update_category').click(function() {
            var catID = $('#kategori_id').val();
            var catName = $('#kategori_adi').val();
            var catQuery=$('#kategori_sira').val();
            var catBaseID;
            if($('input[name="Secim"]:checked').val()=="0"){
                catBaseID=$('input[name="Secim"]:checked').val();
            }
            else{
                catBaseID=$('#kategori_ust_adi').val();
            }
            
            $.ajax({
                type: 'POST',
                url: "kategori_guncelle.php",
                data: {
                    id: catID,
                    name: catName,
                    query_id:catQuery,
                    base_id:catBaseID
                },
                success: function(result) {
                      setTimeout(function() {
                          location.reload();
                      }, 250);
                    Toast.fire({
                        icon: 'success',
                        title: 'Veri Başarıyla Güncellendi'
                    });
                    console.log(result);
                    // console.log(catID+" "+catName+" "+catQuery+" "+catBaseID);
                },
                error: function(error) {
                    console.log(error);
                }
            })
        });
    })
</script>