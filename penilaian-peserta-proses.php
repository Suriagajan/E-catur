<?php
# memulakan fungsi session
session_start();

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-peserta
if(empty($_GET))
{
    die("<script>window.location.href='penilaian-peserta.php';</script>");
}

#memanggil fail connection.php
include('connection.php');

#mengambil markah peserta
foreach($_POST as $key => $mata)
{
    # mengambil nilai primary key yang dihantar
    $kod_kategori = ltrim($key,"k");

    # Data validation dan had atas/bawah
    if(($mata>100 or $mata<0) or !is_numeric($mata))
    {
        die("<script>alert('Ralat pada data mata');
        window.history.back=();</script>");
    }

    #arahan kewujudan mata peserta di dalam jadual penyertaan 
    $semak_mata = "select* from penyertaan
    where
            nokp_peserta = '".$_GET['nokp']."'
    and     kod_kategori = '$kod_kategori'
    limit 1 ";

    # laksana arahan semak kewujudan mata
    $laksana_semak = mysqli_query($condb,$semak_mata);

    #jika data mata peserta telah wujud dalam jadual penyertaan
    if(mysqli_num_rows($laksana_semak)==1)
    {
        # menyediakan arahan(query) kemaskini mata peserta 
        $arahan = "update penyertaan 
        set
        mata            =   '$mata'
        where
        nokp_peserta    =   '".$_GET['nokp']."'
        and
        kod_kategori    =   '$kod_kategori'
        ";
    }
    else
    {
        # menyediakan arahan(query) untuk menyimpan data mata baru peserta
        $arahan = "insert into penyertaan
        (nokp_hakim, nokp_peserta, mata, kod_kategori)
        values
        ('".$_SESSION['nokp']."','".$_GET['nokp']."','$mata', '$kod_kategori')
        ";

    }

    # melaksankan arahan kemaskini / simpan 
    if(mysqli_query($condb,$arahan))
    {
        #jika proses kemaskini / simpan berjaya
        echo "<script>alert('Markah Berjaya Disimpan');
        window.location.href='penilaian-peserta.php';</script>";
    }
    else
    {
        #jika proses kemaskini / simpan gagal
        echo "<script>alert('Markah Gagal Disimpan');
        window.history.back=();';</script>";
    }
}
?>