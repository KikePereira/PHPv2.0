<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/tareas.css">
    <title>Tarea Completa</title>
</head>
<body>

    <!-- BARRA DE NAVEGACION -->
    {% include 'navbar.php' %}

<table class="table">
        <tr>
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
                <td>{{tarea.DNI}}</td>
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
                <td>{{tarea.fecha_final}}</td>
                <td>{{tarea.anotacion_inicio}}</td>
                <td>{{tarea.anotacion_final}}</td>
            </tr>
    </table>

    {% block main %}

    {% endblock %}
</body>
</html>

