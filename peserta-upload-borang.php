<?php
#memulakan fungsi session
session_start();

# memanggil fail header, guard hakim dan connection
include('header.php');
include('guard-hakim.php');
include('connection.php');
?>

<!-- Tajuk laman-->
<h3>MUAT NAIK DATA PESERTA (*.txt)</h3>

<!--Borang untuk memuat naik fail-->
<form action="peserta-upload-proses.php"    method="POST"   enctype="multipart/form-data">

    <h3><b>SILA PILIH FAIL txt YANG INGIN DIUPLOAD</b></h3>
    <input      type='file'     name='data_peserta'>
    <button     type='submit'   name='btn-upload'>MUAT NAIK</button>

</form>
<?php include('footer.php'); ?>