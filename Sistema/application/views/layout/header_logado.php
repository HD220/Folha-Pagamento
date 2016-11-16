<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Payroll</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css" >

        <!-- Optional theme 
        <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css" >
        -->

        <!-- Custom CSS -->
        <link href="/assets/sb/css/sb-admin-2.min.css" rel="stylesheet">

        <link rel="stylesheet" href="/assets/css/folha.css">

        <!-- Custom Fonts -->
        <link href="/assets/sb/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/assets/js/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="/assets/js/bootstrap.min.js"></script>


    </head>
    <body>
        <nav class="navbar navbar-default" id="bz-navbar-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Payroll</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Cargos</a></li>
                        <li><a href="/usuario">Usuários</a></li>
                        <li><a href="/empresa">Empresas</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Opções <span class="glyphicon glyphicon-cog"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Configurações</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/usuario/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="page-header text-center" style="margin-top: -15px">
                <h1 style="color: #639ed2;"><?= $page_title ?> <small><?= (isset($page_subtitle)) ? $page_subtitle : "" ?></small></h1>
            </div>