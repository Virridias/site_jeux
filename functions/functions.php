<?php
function encodePwd($pwd) {
$salt = 'UnPeuDeSel1234@';
$saltedPwd = $pwd.$salt;
$encodedPwd = hash('sha1', $saltedPwd);
return $encodedPwd;
}



