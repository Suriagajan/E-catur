<?PHP
# Fungsi untuk memaparkan drop nama sekolah
function senarai_sekolah(){
    include('connection.php');
    $arahan = "Select* from sekolah";
    $laksana=mysqli_query($condb,$arahan);
    $list="";
    while($m=mysqli_fetch_array($laksana))
    {
        $list=$list."<option value='".$m['kod_sekolah']."'>
        ".$m['nama_sekolah']."</option>";
    }
    return $list;
}

# mencari markah individu
function markah_individu($nokp){
    include('connection.php');
    $arahan_markah = "select sum(mata) as jumlah
    from penyertaan
    where nokp_peserta='$nokp' ";

    $laksana_markah = mysqli_query($condb,$arahan_markah);
    $m = mysqli_fetch_array($laksana_markah);
    return $m['jumlah'];

}

function semak(){
    include('connection.php');
    # arahan mendapatkan bilangan markah sepatutnya
    $arahan_sebenar = "SELECT
    (SELECT COUNT(*) AS bilangan FROM peserta) *
    (SELECT COUNT(*) AS bil FROM kategori) AS jumlah";
    $laksana_sebenar = mysqli_query($condb,$arahan_sebenar);
    $sb = mysqli_fetch_array($laksana_sebenar);

    #arahan untuk mendapatkan jumlah markah yang telah dimasukkan oleh hakim
    $arahan_semasa  = "SELECT COUNT(*) AS bil FROM penyertaan";
    $laksana_semasa = mysqli_query($condb,$arahan_semasa);
    $ss             = mysqli_fetch_array($laksana_semasa);

    if($ss['bil']!=$sb['jumlah'])
    {
        $umum = "Penilaian peserta belum selesai.<br>
        Keputusan Rasmi Tidak Dikeluarkan lagi";
    }
    else
    {
        $umum = "Semua peserta telah dinilai.";
    }
    return $umum;
}

function keputusan_individu(){
    include('connection.php');
    echo" <table width='100%' border='1' id='saiz'>
    <tr>
        <td>Kedudukan</td>
        <td>Nama</td>
        <td>Sekolah</td>
        <td>Jumlah Mata</td>
    </tr>";
# arahan query untuk mencari 5 peserta mendapat markah tertinggi
$arahan_papar = "SELECT peserta.nama_peserta, peserta.nokp_peserta, sekolah.nama_sekolah, 
SUM(penyertaan.mata) AS jumlah FROM peserta
 JOIN sekolah ON peserta.kod_sekolah = sekolah.kod_sekolah
 left JOIN penyertaan ON peserta.nokp_peserta = penyertaan.nokp_peserta
 GROUP BY penyertaan.nokp_peserta order by jumlah DESC limit 5 ";
 
 #laksanakan arahan mencari data peserta
$laksana = mysqli_query($condb,$arahan_papar);
$bil=0;

# Mengambil data yang ditemui
while($m=mysqli_fetch_array($laksana))
{
    #memaparkan senarai nama dalam jadual 
    echo"<tr>
            <td>".++$bil."</td>
            <td>".$m['nama_peserta']."</td>
            <td>".$m['nama_sekolah']."</td>
            <td>".$m['jumlah']."</td>
        </tr>";
    }
echo"</table>";
}

function keputusan_sekolah() {
    include('connection.php');
    echo "<table width = '100%' border='1' id='saiz'>
    <tr>
        <td>Kedudukan</td>
        <td>Sekolah</td>
        <td>Mata</td>
    </tr> ";

#arahan query untuk mencari jumlah mata terkumpul bagi setiap sekolah
$arahan_papar = "SELECT sekolah.nama_sekolah, SUM(penyertaan.mata) AS jumlah
FROM peserta JOIN sekolah ON peserta.kod_sekolah = sekolah.kod_sekolah
left JOIN penyertaan ON peserta.nokp_peserta = penyertaan.nokp_peserta
GROUP BY peserta.kod_sekolah order by jumlah DESC "; 

#laksana arahan mencari
$laksana = mysqli_query($condb,$arahan_papar);
$bil=0;
# Mengambil data yang ditemui
    while($m=mysqli_fetch_array($laksana)){
        # memaparkan senarai nama sekolah dalam jadual
        echo"<tr>
            <td>".++$bil."</td>
            <td>".$m['nama_sekolah']."</td>
            <td>".$m['jumlah']."</td>
        </tr>";
    }
    echo"</table>";
}
?>

