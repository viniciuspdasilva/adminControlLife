<?php
error_reporting(E_ERROR);
require 'classes/Validator.php';
/*require '../../database/database.php';
require '../data/database_config.php';*/
$valid = new Validator();



if (!empty($_POST)):

    $nomeInput  = $_POST['nomeInput'];
    $validador = $valid->validaInput($nomeInput);

    $emailInput = $_POST['emailInput'];
    $validador = $valid->validaInput($emailInput);

    $telefoneInput = $_POST['telefoneInput'];
    $validador = $valid->validaInput($telefoneInput);

    $cpfinput  = $_POST['cpfInput'];
    $validador = $valid->validaInput($cpfinput);

    $rginput  = $_POST['rgInput'];
    $validador = $valid->validaInput($rginput);

    $ruainput  = $_POST['ruaInput'];
    $validador = $valid->validaInput($ruainput);

    $bairroinput  = $_POST['BairroInput'];
    $validador = $valid->validaInput($ruainput);

    $cidadeinput  = $_POST['CidadeInput'];
    $validador = $valid->validaInput($cidadeinput);

    $estadoinput  = $_POST['estadoInput'];
    $validador = $valid->validaInput($estadoinput);

    $paisinput  = $_POST['paisInput'];
    $validador = $valid->validaInput($paisinput);

    $logininput  = $_POST['loginInput'];
    $validador = $valid->validaInput($paisinput);

    $senhainput  = $_POST['senhaInput'];
    $validador = $valid->validaInput($senhainput);

    $repeteSenhaInput  = $_POST['repeteInput'];
    $validador = $valid->validaInput($repeteSenhaInput);
    if($senhainput != $repeteSenhaInput):
        $senhaError = "Campos não coincidem";
        $validador = $valid->setValid(false);
    endif;
    if ($validador):
        $stc = 'ativo';
        $data = date('d-m-Y h-m');
        $endereco = $ruainput .' - '. $bairroinput.' - '.$cidadeinput;

        $pdo = new PDO("mysql:host=localhost;dbname=controller", "root", "");
        $sql = "INSERT INTO clientes (idClientes , nomeClientes, cpfClientes, rgClientes, telefoneClientes, emailClientes, loginClientes, situacaoClientes, ruaClientes, estadoClientes, ufClientes, paisClientes)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
        $query = $pdo->prepare($sql);
        $query->execute(array(null,$nomeInput,$cpfinput,$rginput,$telefoneInput,$emailInput,$logininput,1,$endereco,$estadoinput,'--',$paisinput));

        $sql = "SELECT ifnull(max(clientes.idClientes),0) as id from clientes";
        $q = $pdo->query($sql);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $id_max = $data['id'];

        $sql ="INSERT INTO login (login, senha, situacaoLogin, dataAcesso, idCliente) 
               VALUES (?,?,?,?,?);";
        $query = $pdo->prepare($sql);
        $query->execute(array($logininput,$senhainput,$stc,$data,$id_max));


        header('location: http://localhost/controlLife/src/login.php');


        $pdo = null;
    endif;


endif;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Clientes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <link type="text/css" rel="stylesheet" href="../../css/datatables.css">
        <link type="text/css" rel="stylesheet" href="../../css/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="../../css/normalize.css">

        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script src="../../js/datatables.min.js" type="text/javascript"></script>
        <script src="../../js/fontawesome.js" type="text/javascript"></script>
        <script src="../../js/jquery-ui/jquery-ui.js" type="text/javascript"></script>

        <script>
            var url = '../login/login.ajax.php';
            function validaAcesso(login,senha){
                $.ajax
                ({
                    url:url,
                    typeData:'html',
                    data:{login:login,senha:senha},
                    success:function (data)
                    {
                        switch (data)
                        {
                            case 1:
                                window.location.href("http://localhost/controlLife/src/cliente/consulta.php");
                            break;
                            case 2:
                                alert('Caro usuario: ' + login + 'seu usuario está errado!!');
                                doLoad();
                            break;
                        }
                    },
                    error: function(data){
                        alert("Erro!");
                        console.log(data);
                        doLoad();
                    }
                });
            }
            function doLoad() {
                setTimeout("atualizar()", 1);
            }

            function atualizar() {
                window.location.href = window.location;
            }
        </script>
    </head>
    <body>
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
                        <div class="btn-group"><button class="btn btn-success" id="loginBnt" onclick="validaAcesso($('#login').val(),$('#senha').val());">Login</button></div>
                    </div>
                </form> 
            </div>
        </div>

    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-md-4">

            </div>
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-lg-8">
                        <p>
                          <h2 class="active">Cadastro de Clientes</h2>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <form action="cadastro.php" method="post" class="form-horizontal">
                            <div class="row">
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-2 control-label"><h4>Identificação </h4></label>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">Nome: </label>
                                    <div class="col-lg-9">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nomeInput" id="nomeId" placeholder="Digite seu nome" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">Email: </label>
                                    <div class="col-lg-9">
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="emailInput" id="emailId" placeholder="Digite seu email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">Telefone: </label>
                                    <div class="col-lg-5">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="telefoneInput" id="telefoneId" placeholder="Digite seu telefone" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">CPF: </label>
                                    <div class="col-lg-5">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="cpfInput" id="cpfId" placeholder="Digite seu CPF" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">RG: </label>
                                    <div class="col-lg-5">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="rgInput" id="rgId" placeholder="Digite seu RG" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-2 control-label"><h4>Endereço </h4></label>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">Endereco: </label>
                                    <div class="col-lg-7">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ruaInput" id="ruaId" placeholder="Digite seu Rua" required>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="BairroInput" id="ruaId" placeholder="Digite seu Bairro" required>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="CidadeInput" id="cidadeId" placeholder="Digite sua cidade" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">Estado: </label>
                                    <div class="col-lg-5">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="estadoInput" id="estadoId" placeholder="Digite seu Estado" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">País: </label>
                                    <div class="col-lg-5">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="paisInput" id="paisId" placeholder="Digite seu País" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-2 control-label"><h4>Login </h4></label>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">Login: </label>
                                    <div class="col-lg-8">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="loginInput" id="paisId" placeholder="Login de Acesso" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">Senha: </label>
                                    <div class="col-lg-8">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="senhaInput" id="paisId" placeholder="Senha de Acesso" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="nomeLabel" class="col-sm-3 control-label">Repita sua senha: </label>
                                    <div class="col-lg-8">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="repeteInput" id="paisId" placeholder="Senha de Acesso" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="bnt bnt-success" type="submit" value="Enviar" Id="bntForm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </body>
</html>


