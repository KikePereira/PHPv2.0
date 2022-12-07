<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/526f5e2cea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>

        h1{
            display: flex;
            justify-content: center;
            align-items: center; 
            background-color: #218FC1;
            color: white;
        }

        .list{
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px solid grey;
        margin-left: 3%;
        width: 95%;
    }
    .titles{
        background-color: black;
        color: white;
    }
    .acciones{
        margin-left: 92.5%;
    }
    a{
        text-decoration: none;
    }
    .confirmar{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 6%;
    background-color: red;
    color: white;
    border: 2px solid black;
}
.botones{
    display: flex;
    justify-content: center;
    
}

.botones input, .botones button{
    margin-left: 50px;
    margin-right: 50px;
    border: 2px solid black;

}


    </style>
    <title>Tarea Completa</title>
</head>
<body>

    <!-- BARRA DE NAVEGACION -->
    {% include 'navbar.php' %}
<br>

<h1>Tarea {{tarea.tarea_id}}</h1>
    <div class="list">

<table class="table">
        <tr class="titles">
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Poblacion</th>
            <th>Codigo Postal</th>
            <th>Provincia</th>
            <th>Estado</th>
            <th>Fecha de Creacion</th>
            <th>Operario</th>
            <th>Fecha de finalizacion</th>
            <th>Anotaciones iniciales</th>
            <th>Anotacion Final</th>
        </tr>
        
            <tr>
            <td>{{tarea.tarea_id}}</td>
                <td>{{tarea.dni}}</td>
                <td>{{tarea.nombre}}</td>
                <td>{{tarea.apellido}}</td>
                <td>{{tarea.telefono}}</td>
                <td>{{tarea.correo}}</td> 
                <td>{{tarea.poblacion}}</td> 
                <td>{{tarea.codigo_postal}}</td> 
                <td>{{tarea.provincia}}</td> 
                <td>{{tarea.estado_tarea}}</td> 
                <td>{{tarea.fecha_creacion}}</td>
                <td>{{tarea.operario_encargado}}</td>
                <td>{{tarea.fecha_realizacion}}</td>
                <td>{{tarea.anotacion_inicio}}</td>
                <td>{{tarea.anotacion_final}}</td>
            </tr>
    </table>
    </div>
<style>

</style>



<div class="confirmar">
<h3>!ATENCION!      ¿Seguro que quiere Eliminar la tarea?</h3>
</div><br>
<div class="botones">
    <form action="/tareas/{{tarea.tarea_id}}" method="POST">
        <input type="hidden" name="_METHOD" value="DELETE">
        <input type="submit" value="SI" class="btn btn-success">
    </form>
        <a href="/tareas"><button herf="/tareas" class="btn btn-danger">No</button></a>
    
</div>

</body>
</html>
