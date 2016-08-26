<?php
require '../../database/database.php';
require '../../constantes.php';
require '../seguranca/seguranca.php';

$login  = $_REQUEST['login'];
$senha  = $_REQUEST['senha'];
$valida = validaUsuario($login,$senha);
if($valida):
    echo 1;
else:
    echo 2;
endif;
