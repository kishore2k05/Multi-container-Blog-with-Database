<?php
/**
 * Plugin Name: Custom Login Style
 * Description: Custom login page styling for Kishore Gowthaman's blog
 * Version: 1.0
 * Author: Kishore Gowthaman
 */

// Custom Login Page Styles
function custom_login_style() {
    echo '
    <style>
        body.login {
            background-color: #1a1a2e;
        }
        .login h1 a {
            background-image: none !important;
            background-color: transparent;
            text-indent: 0;
            width: auto;
            height: auto;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .login h1 a::before {
            content: "Kishore Gowthaman";
            font-family: Arial, sans-serif;
            font-size: 28px;
            color: #00d4ff;
            font-weight: bold;
        }
        .login form {
            border-radius: 10px;
            border-top: 4px solid #00d4ff;
        }
        .login #wp-submit {
            background-color: #00d4ff;
            border-color: #00d4ff;
            color: #1a1a2e;
            font-weight: bold;
            width: 100%;
        }
        .login #wp-submit:hover {
            background-color: #0099bb;
        }
    </style>
    ';
}
add_action('login_enqueue_scripts', 'custom_login_style');

function custom_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'custom_login_url');

function custom_login_title() {
    return 'Kishore Gowthaman';
}
add_filter('login_headertext', 'custom_login_title');