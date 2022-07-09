<?php
# memulakan fungsi session
session_start();

# memanggil fail header, guard-peserta, connection dan fungsi
include('header.php');
include('connection.php');
include('fungsi.php');

# pembolehubah $k semak mengambil nilai yang dipulangkan oleh fungsi semak
$k=semak();

# jika nilai yang dipulangkan oleh fungsi semak seperti di bawah
if($k=="Semua peserta telah dinilai.")
{
    # arahan untuk mencari dan menyusun peserta yang mempunyai mata tertinggi
    $query_semak= "select* from peserta order by mata DESC";

    # laksanakan proses pencarian 
    $laksana = mysqli_query($condb,$query_semak);
    $bil=1;

    #mengambil data hasil proses pencarian di atas
    while($m=mysqli_fetch_array($laksana))
    {
        # jika data yang ditemu sepadan dengan nokp peserta yang sedang log masuk
        if($m['nokp_peserta']==$_SESSION['nokp'])
        {
            # paparkan kedudukan keputusan peserta tersebut
            echo "Anda mendapat tempat ke: ".$bil."<br>";
        }
        $bil++;
    }
}
echo $k;
?>
<div class="footerContainer">
<?php include('footer.php'); ?>
</div>
<style> <?php include('style.css'); ?> </style>

