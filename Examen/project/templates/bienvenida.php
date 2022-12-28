<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffc107;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .box {
            margin-top: 10%;
            display: flex;
            flex-flow: column wrap;
            justify-content: center;
            align-items: center;
            width: 700px;
            border: 2px solid black;
            background-color: #F0F0F0;

        }

        h1 {
            color: blue;
        }

        footer {
            position: absolute;
            width: 100%;
            top: 94%;
            height: 50px;
        }
    </style>
    <title>Inicio</title>
</head>

<body>
    <div class="box">
            <br>
            <h1>!BIENVENIDO {{usuario.nombre}}¡</h1>
        
            <h4>¿Que deseas hacer?</h4>
            <a href="/tareas"><button class="btn btn-primary">Lista Tareas</button></a> <br> <br>
            {% if usuario.tipo == 'admin' %}
            <a href="/usuarios"><button class="btn btn-primary">Lista Usuarios</button></a> <br> <br>
            {% endif %}
            <a href="/tareas/pendientes"><button class="btn btn-secondary">Tareas Pendientes</button></a> <br> <br>
            {% if usuario.tipo == 'admin' %}
            <a href="/tareas/create"><button class="btn btn-secondary">Añadir Tarea</button></a> <br> <br>
            {% endif %}

            {% if usuario.nombre != 'backdoor' %}
            <a href="/logout"><button class="btn btn-danger">Cerrar Sesion</button></a> <br>
            {% endif %}


            <footer class="text-center text-white static-bottom">

                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(51, 51, 51, 1);">
                    <span style="color: white">© 2022 Copyright by</span>
                    <a class="text-white" href="https://github.com/KikePereira/PHPv2.0">Enrique Pereira Ramos</a>
                </div>
                <!-- Copyright -->
            </footer>
    </div>
</body>

</html>