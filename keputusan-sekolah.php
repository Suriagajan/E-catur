<?php
#memulakan fungsi session
session_start();

# Memanggil fail header, guard-hakim, connection dan fungsi
include('header.php');
include('guard-hakim.php');
include('connection.php');
include('fungsi.php');
?>
<style><?php include('style.css') ?></style>
<div class="keputusanSekolah">
<h3 id="keputusanSekolah-title">Senarai Peserta</h3>
<!--Memanggil fail butang saiz-->
<?php include('butang-saiz.php'); ?>

<!--Header Jadual Keputusan-->
<table width="100%" border="1"  id="saiz">
    <caption><?= $k=semak(); ?></caption>
    <tr>
        <td>Kedudukan</td>
        <td>Sekolah</td>
        <td>Mata</td>
    </tr>

<?php
# arahan query untuk mencari jumlah mata terkumpul bagi setiap sekolah
$arahan_papar = "SELECT
sekolah.nama_sekolah,
SUM(penyertaan.mata) AS jumlah
FROM peserta
JOIN sekolah
ON peserta.kod_sekolah = sekolah.kod_sekolah
left JOIN penyertaan
ON peserta.nokp_peserta = penyertaan.nokp_peserta
GROUP BY peserta.kod_sekolah
order by jumlah DESC
";

# laksanakan arahan mencari 
$laksana = mysqli_query($condb,$arahan_papar);
$bil=0;
#mengambil data yang ditemui
    while($m=mysqli_fetch_array($laksana))
    {
        #memaparkan senarai nama dalam jadual
        echo"<tr>
                <td>".++$bil."</td>
                <td>".$m['nama_sekolah']."</td>
                <td>".$m['jumlah']."</td>
            </tr>";
    }
?>
</table>
<div class="keputusanSekolah-footer">
<?php include('footer.php'); ?>
</div>
</div>