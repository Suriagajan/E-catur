<?php
# memulakan fungsi session
session_start();

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-peserta
if(empty($_GET))
{
    die("<script>window.location.href='penilaian-peserta.php';</script>");
}

#memanggil fail header, guard-hakim dan connection
include('header.php');
include('guard-hakim.php');
include('connection.php');
?>

<!-- Tajuk Laman -->
<h3>Senarai Peserta</h3>
<a href="penilaian-peserta.php">Senarai Nama Peserta</a>

<?php
# arahan query untuk mencari senarai nama peserta
$arahan_papar = "SELECT* FROM penyertaan
where nokp_peserta = '".$_GET['nokp_peserta']."' ";

# laksnakan arahan mencari data peserta
$laksana = mysqli_query($condb,$arahan_papar);

# mengambil data peserta yang ditemui
$p = mysqli_fetch_array($laksana);

?>

<form action='penilaian-peserta-proses.php?nokp=<?=$_GET['nokp_peserta'] ?>'method='POST'>

<!--Memaparkan data yang diterima-->
<table border="1"   width="50%">
    <tr>
        <td>Nama Peserta</td>
        <td><?= $_GET['nama_peserta'] ?></td>
    </tr>
    <tr>
        <td>NoKP Peserta</td>
        <td><?= $_GET['nokp_peserta'] ?></td>
    </tr>
    <tr>
        <td>Sekolah Peserta</td>
        <td><?= $_GET['nama_sekolah'] ?></td>
    </tr>
    <tr>
        <td colspan='2' bgcolor='blue'>Penilaian</td>
    </tr>

<?php
        # query untuk mencari data kategori dan juga mata murid jika ada
        $arahan_kategori = "SELECT
        kategori.kod_kategori,
        kategori.kategori_markah,
        penyertaan.mata
        from kategori
        left join penyertaan
        on kategori.kod_kategori    =       penyertaan.kod_kategori
        and penyertaan.nokp_peserta =       '".$_GET['nokp_peserta']."' ";
        
        # melaksanakan arahan untuk mencari 
        $laksana_kategori = mysqli_query($condb,$arahan_kategori);

        # mengambil SEMUA data yang ditemui
        while($m=mysqli_fetch_array($laksana_kategori))
        {
            $kod="k".$m['kod_kategori']

        ?>
            <!--Umpukan markah yang sedia ada ke dala text box-->
            <tr>
                <td><?= $m['kategori_markah'] ?></td>
                <td>
                    <input type='text'  name='<?= $kod?>'  value='<?=$m['mata'] ?>'  required>
                </td>
            </tr>

        <?php } ?>

<tr>
    <td></td>
    <td><input  type='submit'  value='simpan'></td>
</tr>
</table>
</form>
<?PHP include('footer.php'); ?>