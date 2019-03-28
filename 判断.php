<?php

header('Content-type:text/html;charset=utf-8');
if (!session_id()) session_start();
if(!isset($_SESSION['username'])){
    echo "<script>alert('请登录！'); location.href = 'login.html';</script>";

}