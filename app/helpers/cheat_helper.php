<?php
    // console log content from input, given id
    function console($id) {
        echo "<script>";
        echo 'console.log(document.querySelector("';
        echo "input[name='$id']";
        echo '"))';
        echo "</script>";
    }

    // print something at console
    function terminal($var) {
        echo "<script>";
        echo "console.log($var)";
        echo "</script>";
        die;
    }

    // customize date and hour
    function dateTimeBR($dt) {
        $boom = explode(' ', $dt);
        $date = explode('-', $boom[0]);
        $time = explode(':', $boom[1]);

        $date = implode('/', array_reverse($date));
        $boom[0] = $date;
        $boom = implode(', ', $boom);

        return $boom;
    }