<?php
    include_once "Usuario.php";

    $u = new Usuario();
    $u->setLogin('admin');
    $u->setEmail('admin@admin.com');
    $u->setNivel(9);
    $u->setNome('Administrador');
    $u->setSenha('123456');
    $u->save();


?>