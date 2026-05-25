<?php
/**
 * Plugin Name: Custom Login Style
 * Description: Custom login page styling for Kishore Gowthaman's blog
 * Version: 2.0
 * Author: Kishore Gowthaman
 */

function custom_login_style() {
    echo '
    <style>
        body.login {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        body.login #login {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 212, 255, 0.2);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 0 40px rgba(0, 212, 255, 0.1);
        }
        body.login #login h1 a {
            font-size: 0 !important;
            width: auto;
            height: auto;
            text-indent: 0;
            display: block;
            text-align: center;
            text-decoration: none;
            background-image: none !important;
            margin-bottom: 10px;
        }
        body.login #login h1 a::before {
            content: "Kishore Gowthaman";
            font-family: Arial, sans-serif;
            font-size: 26px;
            color: #00d4ff;
            font-weight: bold;
            display: block;
        }
        body.login #login h1 a::after {
            content: "Admin Portal";
            display: block;
            font-size: 13px;
            color: #a0aec0;
            font-weight: normal;
            margin-top: 4px;
        }
        body.login .login-username label,
        body.login .login-password label {
            color: #a0aec0;
            font-size: 13px;
        }
        body.login input[type="text"],
        body.login input[type="password"] {
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(0, 212, 255, 0.3);
            border-radius: 8px;
            color: #ffffff;
            padding: 10px 14px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
            transition: border 0.3s;
        }
        body.login input[type="text"]:focus,
        body.login input[type="password"]:focus {
            border-color: #00d4ff;
            outline: none;
            box-shadow: 0 0 10px rgba(0, 212, 255, 0.2);
        }
        body.login .forgetmenot label {
            color: #a0aec0;
            font-size: 13px;
        }
        body.login input[type="checkbox"] {
            accent-color: #00d4ff;
        }
        body.login #wp-submit {
            background: linear-gradient(90deg, #00d4ff, #0099bb);
            border: none;
            border-radius: 8px;
            color: #1a1a2e;
            font-weight: bold;
            font-size: 15px;
            width: 100%;
            padding: 12px;
            cursor: pointer;
            transition: opacity 0.3s;
            margin-top: 10px;
        }
        body.login #wp-submit:hover {
            opacity: 0.85;
        }
        body.login #nav,
        body.login #backtoblog {
            text-align: center;
        }
        body.login #nav a,
        body.login #backtoblog a {
            color: #a0aec0;
            font-size: 13px;
            text-decoration: none;
        }
        body.login #nav a:hover,
        body.login #backtoblog a:hover {
            color: #00d4ff;
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