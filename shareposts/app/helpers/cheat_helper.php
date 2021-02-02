<?php
    // console log content from input, given id
    function console($id) {
        echo "<script>";
        echo 'console.log(document.querySelector("';
        echo "input[name='$id']";
        echo '"))';
        echo "</script>";
    }