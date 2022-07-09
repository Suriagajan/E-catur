<?php
# nama host. localhost merupakan default
$nama_host = "localhost";

#username bagi SQL. root merupakan default
$nama_sql = "root";

# password bagi sql. Masukkan password anda.
$pass_sql = "";


#nama pangkalan data yang anda telah bangunkan sebelum ini.
$nama_db = "suria";

# membuka hubungan antara pangkalan data dan sistem
$condb = mysqli_connect($nama_host, $nama_sql, $pass_sql, $nama_db);

#menguji adakah hubungan berjaya dibuka
if (!$condb)
{
    die("Sambungkan ke pangkalan data gagal");
}
else{
    #echo "Sambungkan ke pangkalan data berjaya";
}
?>
