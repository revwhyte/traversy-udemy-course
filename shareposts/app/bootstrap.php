<?php
    // load config
    require_once 'config/config.php';
    // load helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    // my personal cheat sheet functions
    require_once 'helpers/cheat_helper.php';

    // autoload core libs
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });