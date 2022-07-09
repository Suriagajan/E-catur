<?php
# Menyemak nilai pembolehubah session['tahap']
if($_SESSION['tahap'] != "hakim")
{
    # jika nilainya tidak sama dengan hakim. aturcara akan dihentikan 
    die("<script>alert('sila login'); window.location.href='logout.php';</script>");
}
?>