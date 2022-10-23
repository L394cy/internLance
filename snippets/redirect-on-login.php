<?php
/**
 * Redirect user after login.
 * https://stackoverflow.com/questions/60548120/how-to-redirect-the-user-to-another-location-after-login-wordpress
 */

function redirect_on_login() {
    $login_url = 'https://makeuc22.temphost.org/listings/';
    wp_redirect( $login_url );
    exit;
}
add_action( 'wp_login', 'redirect_on_login', 1 );