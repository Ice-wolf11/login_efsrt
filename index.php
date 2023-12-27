<?php 
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}

//include('header.php'); ?>
<div class="container p-12">
<div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
<div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
<div class="my-3 p-3">
<h2 class="display-5">Sistema de inicio de sesión</h2>
    <div>
        <a href="logout.php">salir</a>
    </div>
</div>
</div>

