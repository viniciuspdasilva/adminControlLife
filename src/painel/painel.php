<?php
require '../../database/database.php';
require '../../constantes.php';

$pdo  = new Conexao;
$host = $pdo->setHost('localhost');
$user = $pdo->setUser('root');
$pass = $pdo->setPass('17159236');
$database = $pdo->setBanco('controller');

$conexao = $pdo -> getInstance($pdo->getHost(),$pdo->getUser(),$pdo->getPass(),$pdo->getBanco());
$sql = 'SELECT * FROM clientes';
$conexao->query($sql);



?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>ControlLife &reg Controle das Finanças</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link type="text/css" rel="stylesheet" href="../../css/datatables.css">
        <link type="text/css" rel="stylesheet" href="../../css/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="../../css/normalize.css">

        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script src="../../js/datatables.min.js" type="text/javascript"></script>
        <script src="../../js/fontawesome.js" type="text/javascript"></script>
        <script src="../../js/jquery-ui/jquery-ui.js" type="text/javascript"></script>

        <script type="text/javascript">
            var url = '../login/login.ajax.php';
            $(document).ready(function () {
                $("#loginBnt").click(function () {
                    $.ajax({
                        url:url,
                        type:'post',
                        dataType:'html',
                        data:{login:$("#login").val(), senha:$('#senha').val()},
                        success:function (data) {
                            alert(data);
                        }
                    });
                });
            });
        </script>
        <style type="text/css">
            @media (min-width: 768px){
            }



            }
        </style>
    </head>
    <body style="background-color: #fff;@font-family-base;@font-size-base;@line-height-base;@link-color;padding-top: 70px;">
        <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="painel.php">ControlLife</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-controlLife-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" href="../cliente/painel.php">Clientes
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="../cliente/cadastro.php">Cadastro</a></li>
                                    <li><a href="../cliente/consulta.php">Consulta</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../cliente/consultaAdm.php">Alterar</a></li>
                                    <li><a href="../cliente/excluirAdm.php">Excluir</a></li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" href="../cliente/painel.php">Produtos
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="../cliente/cadastro.php">Cadastro</a></li>
                                    <li><a href="../cliente/consulta.php">Consulta</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../cliente/consultaAdm.php">Alterar</a></li>
                                    <li><a href="../cliente/excluirAdm.php">Excluir</a></li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" href="../despesas/painel.php">Despesas
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="../despesas/cadastro.php">Cadastro</a></li>
                                    <li><a href="../despesas/consulta.php">Consulta</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../despesas/consultaAdm.php">Alterar</a></li>
                                    <li><a href="../despesas/excluirAdm.php">Excluir</a></li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" href="../receitas/painel.php">Receitas
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="../receitas/cadastro.php">Cadastro</a></li>
                                    <li><a href="../receitas/consulta.php">Consulta</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../receitas/consultaAdm.php">Alterar</a></li>
                                    <li><a href="../receitas/excluirAdm.php">Excluir</a></li>

                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right">
                            <div class="form-group">
                                <input class="form-control" placeholder="Login" type="text" id="login" name="login">
                                <input class="form-control" placeholder="Senha" type="password" id="senha" name="senha">
                                <div class="btn-group"><button class="btn btn-success" id="loginBnt">Login</button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" href="../login/login.php">Login
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li >
                                        <a href="../login/login.php">login</a>
                                    </li>

                                    <li><a href="../login/cadastro.php">Cadastro</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </nav>


        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <div class="inline">
                        <div class="container-fluid">
                            <nav class="navbar navbar-default" id="nav-horizontal">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="">Dashboard</a>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse">
                                    <ul class="nav navbar-nav" style="left:0;right:auto;">

                                        <li class="dropdown" style="float:none !important;">
                                            <a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" href="../despesas/painel.php">Options
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" style="left:0;right:auto;">
                                                <li><a href="../dashboard/config/config.php?type='menu'">Menu</a></li>
                                                <li><a href="../dashboard/config/config.php?type='layout'">Layout</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="../dashboard/config/config.php?type='login'">Login</a></li>
                                                <li><a href="../dashboard/config/config.php?type='sair'">Sair</a></li>

                                            </ul>
                                        </li>
                                        <li class="dropdown" style="float:none !important;">
                                            <a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" href="../despesas/painel.php">Despesas
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" style="left:0;right:auto;">
                                                <li><a href="../despesas/cadastro.php">Cadastro</a></li>
                                                <li><a href="../despesas/consulta.php">Consulta</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="../despesas/consultaAdm.php">Alterar</a></li>
                                                <li><a href="../despesas/excluirAdm.php">Excluir</a></li>

                                            </ul>
                                        </li>
                                        <li class="dropdown" style="float:none !important;">
                                            <a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" href="../receitas/painel.php">Receitas
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" style="left:0;right:auto;">
                                                <li><a href="../receitas/cadastro.php">Cadastro</a></li>
                                                <li><a href="../receitas/consulta.php">Consulta</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="../receitas/consultaAdm.php">Alterar</a></li>
                                                <li><a href="../receitas/excluirAdm.php">Excluir</a></li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xs-6 col-md-4">

            </div>
        </div>
    </body>
</html>



<div class="col-lg-3">
    jabsdf sdd
</div>
