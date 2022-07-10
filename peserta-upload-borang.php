
<?php
#memulakan fungsi session
session_start();

# memanggil fail header, guard hakim dan connection
include('header.php');
include('guard-hakim.php');
include('connection.php');
?>
<style><?php include('style.css'); ?></style>
<!-- Tajuk laman-->
<div class="pesertaUpload">
<h3 id="pesertaUpload-title">MUAT NAIK DATA PESERTA (*.txt)</h3>

<!--Borang untuk memuat naik fail-->
<form action="peserta-upload-proses.php"    method="POST"   enctype="multipart/form-data">

    <h3 id="pesertaUpload-text"><b>SILA PILIH FAIL txt YANG INGIN DIUPLOAD</b></h3>
    <input  id="pesertaUpload-form"    type='file'     name='data_peserta'>
    <button id="pesertaUpload-form"   type='submit'   name='btn-upload'>MUAT NAIK</button>

</form>
<div id="pesertaUpload-footer">
<?php include('footer.php'); ?>
</div>
</div>