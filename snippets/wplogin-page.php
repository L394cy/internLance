<?php
function custom_login_logo() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
 background-image: url(https://makeuc22.temphost.org/wp-content/themes/makeuc22/images/login-lock.svg);
padding-bottom: 30px; 
} 
</style>
 <?php 
} add_action( 'login_enqueue_scripts', 'custom_login_logo' );