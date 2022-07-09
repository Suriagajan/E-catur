<div class="loginHakim-borang">
<?php
# Memulakan fungsi session
session_start();

#Memanggil fail header.php
?>
<style> <?php include('style.css'); ?></style>
<!-- tajuk antaramuka log masuk hakim -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<div class="container">
<h3 id="loginHakim-title">Login Hakim</h3>
<div class="hakimContainer">
<form id="loginHakim-form" action='hakim-login-proses.php' method='POST'>

    Nokp hakim  <input id="kpHakim-login"   type="text"      name="nokp"         ><br>
    Katalaluan  <input id="passHakim-login" type="password"  name="katalaluan"   ><br>
                <input id="loginHakim-btn"  type="submit"    value="login"       >
</form>
</div>
</div>
<?php include('footer.php'); ?>

</div>