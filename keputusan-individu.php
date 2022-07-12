
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
<div class="keputusanIndividu">
<h3 id="main_title">Keputusan Individu</h3>
<!--Memanggil fail butang saiz-->
<?php include('butang-saiz.php'); ?>

<!--Header Jadual Keputusan-->
<table width="100%" border="1"  id="saiz">
    <caption><?= $s=semak(); ?></caption>
    <tr>
        <td>Kedudukan</td>
        <td>Nama</td>
        <td>No KP</td>
        <td>Sekolah</td>
        <td>Jumlah Mata</td>
    </tr>

<?php
# arahan query untuk mencari senarai pemenang
$arahan_papar = "SELECT
peserta.nama_peserta,
peserta.nokp_peserta,
sekolah.nama_sekolah,
SUM(penyertaan.mata) AS jumlah 
FROM peserta
JOIN sekolah
ON peserta.kod_sekolah = sekolah.kod_sekolah
left JOIN penyertaan
ON peserta.nokp_peserta = penyertaan.nokp_peserta
GROUP BY penyertaan.nokp_peserta
order by jumlah DESC ";

# laksanakan arahan mencari data peserta
$laksana = mysqli_query($condb,$arahan_papar);
$bil=0;
#mengambil data yang ditemui
    while($m=mysqli_fetch_array($laksana))
    {
        #memaparkan senarai nama dalam jadual
        echo"<tr>
                <td>".++$bil."</td>
                <td>".$m['nama_peserta']."</td>
                <td>".$m['nokp_peserta']."</td>
                <td>".$m['nama_sekolah']."</td>
                <td>".$m['jumlah']."</td>
            </tr>";
    }
?>
</table>
<div class="keputusanIndividu-footer">
<?php include('footer.php'); ?>
</div>
</div>