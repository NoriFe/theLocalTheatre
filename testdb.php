<?php
require_once 'php/db.class.php';

try {
    $conn = db::getInstance();
    echo "Connected OK";
} catch (Exception $a) {
    echo "Error: " . $a->getMessage();
}
