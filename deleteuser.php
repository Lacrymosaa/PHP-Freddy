<?php
    require_once('./assets/config/connect.php')

    $conn->prepare("DELETE FROM cadastros WHERE id == $fid");
?>