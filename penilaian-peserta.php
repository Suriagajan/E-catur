<?php
# memulakan fungsi session
session_start();

#memanggil fail header, guard-hakim, fungsi dan connection
include('header.php');
include('guard-hakim.php');
include('connection.php');
include('fungsi.php');
?>

<!-- Tajuk Laman -->
<h3>Senarai Peserta</h3>

<!-- Borang carian nama peserta --> 
<form action="" method="post">
    Carian Peserta  <br>
    Nama Peserta    <input type="text"  name="nama">
                    <input type="submit"    value="Cari">
</form>

<!-- Header jadual bagi memaparkan senarai peserta  -->
<table width="100%"    border="1">
    <tr>
        <td>Nama</td>
        <td>No KP</td>
        <td>Sekolah</td>
        <td>Markah</td>
        <td>Penilaian</td>
    </tr>
<?php
$tambahan="";
if(!empty($_POST['nama']))
{
    $tambahan = "where peserta.nama_peserta like '%".$_POST['nama']."%'";
}

# arahan query untuk mencari senarai nama peserta
$arahan_papar="SELECT* FROM peserta
LEFT JOIN sekolah
ON peserta.kod_sekolah = sekolah.kod_sekolah
$tambahan";

#laksanakan arahan mencari data peserta
$laksana = mysqli_query($condb,$arahan_papar);

#Mengambil data yang ditemui
    while($m=mysqli_fetch_array($laksana))
    {
        $data_get=array(
            'nokp_peserta'  =>  $m['nokp_peserta'],
            'nama_peserta'  =>  $m['nama_peserta'],
            'nama_sekolah'  =>  $m['nama_sekolah']
        );

    # memaparkan senarai nama jadual
        echo"<tr>
            <td>".$m['nama_peserta']."</td>
            <td>".$m['nokp_peserta']."</td>
            <td>".$m['nama_sekolah']."</td>
            <td>".$k=markah_individu($m['nokp_peserta'])."</td>

            <td><a href='penilaian-peserta-borang.php?".http_build_query($data_get)."'>Penilaian</a></td>
            </tr>";
    }
?>
</table>
<?php include('footer.php'); ?>