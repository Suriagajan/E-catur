<?php
#memulakan fungsi session
session_start();

#memanggil fail guard-hakim
include('guard-hakim.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
    #memanggil fail connection
    include('connection.php');

    #pengesahan data nokp & had atas / bawah
    if(strlen($_POST['nokp']) !=12 or !is_numeric($_POST['nokp']))
    {
        die("<script>alert('Ralat pada No kad pengenalan');
        window.location.href='hakim-daftar-borang.php';</script>");
    }

    #arahan untuk menyimpan data hakim baru ke dalam jadual hakim
    $arahan = "insert into hakim
    (nokp_hakim,nama_hakim,katalaluan_hakim)
    values
    ('".$_POST['nokp']."','".$_POST['nama']."','".$_POST['katalaluan']."')";

    # melaksanakan arahan simpan dan menguji proses penyimpanan data 
    if(mysqli_query($condb,$arahan))
    {
        #jika data berjaya disimpan. papar popup berjaya 
        echo" <script>alert('Pendaftaran Berjaya');
        window.location.href='senarai-hakim.php';</script>";
    }
    else
    {
        #jika data gagal disimpan, papar popup gagal
        echo" <script>alert('Pendaftaran Gagal');
        window.location.href='hakim-daftar-borang.php';</script>";
    }
}
else
{
    # jika data POST empty
    die(" <script>alert('sila lengkapkan data');
    window.location.href='hakim-daftar-borang.php';</script>");
}
?>