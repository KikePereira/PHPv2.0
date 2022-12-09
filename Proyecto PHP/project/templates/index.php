<!DOCTYPE html>
<style>
    body{
        background-color: #F0F0F0;
    }
    .footer{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    nav {
        color: white;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/526f5e2cea.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../assets/css/estilo.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %}</title>
</head>
    <head>        
    
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    Inicio</a>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/tareas">Ver lista</a>
                        <a class="nav-link" href="/tareas/pendientes">Tareas Pendientes</a>
                        <a class="nav-link" href="/tareas/create">Añadir tarea</a>
                    </div>
                </div>
            </div>
        </nav>
        {% block head %}{% endblock %}
    </head>

    <body>
    <br>
    <div id="content">{% block content %}{% endblock %}</div>

    <div class="footer">
    {% block footer %}
        &copy; Copyright 2022 by <a href="https://github.com/KikePereira/PHPv2.0/tree/master/Proyecto%20PHP"> Enrique Pereira</a>.
    {% endblock %}    
    </div>
    </body>
    
</html>