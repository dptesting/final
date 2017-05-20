<?php

namespace Movie\Validation;

function valid($data) {
    return preg_match('/^[a-zA-Z0-9_]*$/', $data);
}

function validtext($data) {
    return preg_match('/^[a-zA-Z0-9. ]*$/', $data);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
