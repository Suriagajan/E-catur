<?php
# memulakan fungsi session
session_start();

#memanggil fail guard-hakim.php 
include('guard-hakim.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
    # memanggil fail connection.php
    include('connection.php');

    # pengesahan data (validation) nokp peserta
    if(strlen($_POST['nokp'] != 12 or !is_numeric($_POST['nokp'])))
    {
        die("<script>alert('Ralat Nokp');
        window.history.back();</script>");
    }
    #arahan (query) untuk kemaskini maklumat peserta
    $arahan =   "update peserta set
    nama_peserta            =   '".$_POST['nama']."',
    nokp_peserta            =   '".$_POST['nokp']."',
    katalaluan_peserta      =   '".$_POST['katalaluan']."',
    kod_sekolah             =   '".$_POST['kod_sekolah']."'
    where
    nokp_peserta            =   '".$_POST['nokp_lama']."' ";

# melaksanakan dan menyemak proses kemaskini 
if(mysqli_query($condb,$arahan))
{
    # kemaskini berjaya
    echo "<script>alert('Kemaskini Berjaya');
    window.location.href='senarai-peserta.php';</script>";
}
else
{
    #kemaskini gagal
    echo "<script>alert('Kemaskini gagal');
    window.history.back();</script>";
}
}
else
{
    #data POST empty
    die("<script>alert('sila lengkapkan data');
    window.location.href='hakim-daftar-borang.php';</script>");
}
?>