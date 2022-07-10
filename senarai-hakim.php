<?php
# memulakan fungsi session
session_start();

#memanggil fail header, guard-hakim dan connection
include('header.php');
include('guard-hakim.php');
include('connection.php');
?>
<div class="senaraiHakim">
<h3 id="senaraiHakim-title">SENARAI HAKIM</h3>
<!--memanggil fail butang-saiz-->
<?php include('butang-saiz.php'); ?>

<!--Navigasi untuk mendaftar hakim baru-->
<div class="daftarHakim-btn">
<a href="hakim-daftar-borang.php">Daftar Hakim Baru</a>
</div>
<!--Header bagi jadual untuk memaparkan senarai peserta--> 
<table width="100%" border="1"  id="saiz">
    <tr>
        <td>NAMA</td>
        <td>NOKP</td>
        <td>KATALALUAN</td>
    </tr>

<?php
#arahan query untuk mencari senarai nama hakim
$arahan_papar="Select* from hakim";

#laksanakan arahan mencari data hakim
$laksana = mysqli_query($condb,$arahan_papar);

#mengambil data yang ditemui
    while($data=mysqli_fetch_array($laksana))
    {
        #memaparkan senarai dalam jadual
        echo"<tr>
        <td>".$data['nama_hakim']."</td>
        <td>".$data['nokp_hakim']."</td>
        <td>".$data['katalaluan_hakim']."</td>
        </tr>";
    }
?>
</table>
<div class="senaraiHakim-footer">
<?php include('footer.php'); ?>
</div>
</div>