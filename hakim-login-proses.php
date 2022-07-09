<?php
#memulakan fungsi session
session_start();

#menyemak kewujudan data post yang dihantar dari peserta-login-borang.php
if(!empty($_POST['nokp'] and !empty($_POST['katalaluan'])))
{
    # jika data yang dihantar tidak empty

    #memanggil fail connection.php
    include('connection.php');

    # Arahan(query) untuk membandingkan data yang dimasukkan 
    $query_login = "select* from hakim
    where
            nokp_hakim          =   '".$_POST['nokp']."'
    and     katalaluan_hakim    =   '".$_POST['katalaluan']."'";

    # melaksanakan arahan membandingkan data 
    $laksana_query = mysqli_query($condb,$query_login);

    #jika terdapat 1 data yang sepadan, login berjaya
    if(mysqli_num_rows($laksana_query)==1)
    {
        #mengambil data yang ditemui
        $m = mysqli_fetch_array($laksana_query);

        # mengumpukkan kepada pembolehubah session
        $_SESSION['nama'] = $m['nama_hakim'];
        $_SESSION['nokp'] = $m['nokp_hakim'];
        $_SESSION['tahap'] = "hakim";

        #membuka laman hakim-menu.php
        echo "<script>window.location.href='hakim-menu.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman hakim-login-borang.php
        die("<script>alert('Login Gagal');
        window.location.href= 'hakim-login-borang.php';</script>");

    }

}
else
{
    # data yang dihantar dari laman hakim-login-borang.php kosong
    die("<script>alert('Sila masukkan nokp dan katalaluan');
    window.location.href= 'hakim-login-borang.php';</script>");

}
?>