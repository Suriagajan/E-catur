<?php
# Memulakan fungsi session
session_start();

# Mewujudkan kewujudan data post 
if(!empty($_POST))
{
    # Jika data post wujud

    # panggil fail connection.php
    include('connection.php');

    # Data Validation : Had Atas & Had Bawah
    if (strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp']))
    {
        die("<script>alert('Ralat Pada No Kad Pengenalan');
        window.location.href='peserta-signup-borang.php'; </script>");
    }

    # Arahan (Query) untuk menyimpan data peserta baharu
    $query_login = "insert into peserta
    (nama_peserta,nokp_peserta,katalaluan_peserta,kod_sekolah)
    values
    ('".$_POST['nama']."','".$_POST['nokp']."','".$_POST['katalaluan']."','".$_POST['kod_sekolah']."')
    ";

    # Melaksanakan arahan menyimpan data peserta baru
    $laksana_query = mysqli_query($condb,$query_login);

    # menyemak proses pemyimpanan data
    if($laksana_query)
    {
        # jika data berjaya disimpan 
        die("<script>alert('Pendaftaran Berjaya. Sila login untuk melihat keputusan.');
        window.location.href= 'index.php';</script>");
    }
    else
    {
        # jika data gagal disimpan
        die("<script>alert('Pendaftaran Gagal');
        window.location.href= 'peserta-signup-borang.php';</script>");
    }
}
else
{
    # jika data post tidaj wujud (empty)
    die("<script>alert('Sila lengkap maklumat berikut');
    window.location.href= 'peserta-signup-borang.php';</script>");

}
?>