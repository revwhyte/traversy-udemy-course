<?php
    // simple page redirect
    function redirect($page) {
        header('location: ' . URLROOT . '/' . $page);
    }

    function dump($arr) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        die;
    }