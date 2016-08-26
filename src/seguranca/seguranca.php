<?php
/**
 * Created by PhpStorm.
 * User: vinicius.psilva
 * Date: 24/08/2016
 * Time: 15:56
 */
require 'constantes.php';

function validaUsuario($login,$senha){
    try {
        $link = new PDO('mysql:host=localhost;dbname=controller','root','');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $login = "'".$login."'";
    $senha = "'".$senha."'";
    $sql = "SELECT controller.login.idCliente, controller.login.login,controller.login.senha, controller.login.situacaoLogin
            FROM controller.login 
            WHERE login = $login  
              AND senha = $senha 
              AND situacaoLogin 
                  LIKE 1";
    $query = $link->query($sql);
    $result = $query->fetchAll();
    $id = $result[0]['idCliente'];
    if($result > 1):
        sec_session_start();
        $_SESSION['idCliente'] = $id;
        $sql = "SELECT clientes.idClientes, clientes.nomeClientes,loginClientes
         FROM controller.clientes WHERE loginClientes = $login AND idClientes LIKE $id";
        $query = $link->query($sql);
        try{
            $nome = $query->fetchAll();
        }catch (PDOException $e){
            echo $e ->getMessage();
            exit();
        }
        $_SESSION['nomeLogin'] = $nome[0]['nomeClientes'];
        $_SESSION['login']     = $login;
        $_SESSION['senha']     = $senha;
        return true;
    else:
        return false;
    endif;

}
function sec_session_start() {
    $session_name = 'sec_session_id';
    $httponly = true;
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params(
        $cookieParams["lifetime"],
        $cookieParams["path"],
        $cookieParams["domain"],
        $httponly
    );
    session_name($session_name);
    session_start();
    session_regenerate_id();
}

function protegePagina(){
    if (!isset($_SESSION['idCliente']) OR !isset($_SESSION['nomeLogin'])):
        expulsaVisitante();
    elseif (!validaUsuario($_SESSION['login'] ,$_SESSION['senha'])):
          expulsaVisitante();
    endif;
}

function expulsaVisitante(){
    unset($_SESSION['usuarioLogin '],$_SESSION['usuarioSenha'], $_SESSION['usuarioID'] , $_SESSION['usuarioNome']);
    header("Location: ../login.php");
}