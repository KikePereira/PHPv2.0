<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: column;
            margin-top: 20%;
        }
       a{
        text-decoration: none;
        color: black;
       }
       a:hover{
        color: white;
       }
       button{
        margin-top: 10px;
        width: 10%;
       }

    </style>
    <title>Inicio</title>
</head>
<body>
       <button class="btn btn-primary"><a href="/tareas">Ver Lista</a></button> 
       <button class="btn btn-secondary"><a href="/tareas/create">Añadir Tarea</a>
       <button class="btn btn-secondary"><a href="">Modificar Tarea</a></button>
</button>
</body>
</html>