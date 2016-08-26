<?php
/*require '../seguranca/seguranca.php';
protegePagina();*/

?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard-Cliente</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <link type="text/css" rel="stylesheet" href="../../css/datatables.css">
    <link type="text/css" rel="stylesheet" href="../../css/jquery-ui.css">
    <link type="text/css" rel="stylesheet" href="../../css/normalize.css">

    <script src="../../js/jquery.js" type="text/javascript"></script>
    <script src="../../js/datatables.min.js" type="text/javascript"></script>
    <script src="../../js/fontawesome.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui/jquery-ui.js" type="text/javascript"></script></head>
<body>
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
            </div>
        </div>
    </nav>
    <div class="container">
      <nav class=""></nav>
    </div>
</body>
</html>
