<div class="login-borang">
<?php
# memulakan fungsi session
session_start();
?>
<style><?php include('style.css'); ?></style>
<!-- Tajuk antaramuka log masuk peserta -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<h3 id="login-title">Login Peserta</h3>

<!-- Borang daftar masuk (signup) peserta -->

<div class="form-container">
<div id="login-form">
<form action='peserta-login-proses.php' method="POST" >
    Nokp Peserta    <input id="nokp-login" type="text"          name="nokp"               ><br>
    Katalaluan      <input id="pass-login" type="password"      name="katalaluan"         ><br>
                    <input id="login-btn" type="submit"         value="Login"             >
</form>
</div>
</div>
<?php include('footer.php'); ?>
</div>