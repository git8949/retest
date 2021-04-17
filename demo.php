<?php
    include_once 're.func.php';
    $str = 'abc13822226666s';
    match('/1[3-9]\d{9}/', $str, '提取手机号');
?>