{% extends 'index.php' %}

{% block title %}Tarea Pendientes{% endblock %}

{% block head %}
<style>
    body {
        background-color: #F0F0F0;
    }

    .list {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 5%;
        width: 90%;
    }

    .table {
        border: 2px solid grey;
        background-color: white;
    }

    .titles {
        background-color: black;
        color: white;
    }

    .buscador {
        margin-left: 80%;
    }

    .acciones {
        margin-left: 92.5%;
    }
</style>
{% endblock %}

{% block content %}
<div class="list">


    <table class="table">
        <tr class="titles">
            <th>ID</th>
            <th>Estado</th>
            <th>Operario</th>
            <th>Cliente</th>
            <th>Telefono</th>
            <th>Provincia</th>
            <th>Fecha de finalizacion</th>
            <th>Anotaciones iniciales</th>
            <th></th>
        </tr>

        {% for tarea in tareas %}
        <tr>
            <td>{{tarea.tarea_id}}</td>
            <td>{{tarea.estado_tarea}}</td>
            <td>{{tarea.operario_encargado}}</td>
            <td>{{tarea.nombre}} {{tarea.apellido}}</td>
            <td>{{tarea.telefono}}</td>
            <td>{{tarea.provincia}}</td>
            <td>{{tarea.fecha_creacion}}</td>
            <td>{{tarea.anotacion_inicio}}</td>
            <td>
                <a href="/tareas/{{tarea.tarea_id}}"><i class="fa-solid fa-eye"></i></a>
                <a href="/tareas/{{tarea.tarea_id}}/complete"><i class="fa-solid fa-check"></i></a> 
                <a href="/tareas/{{tarea.tarea_id}}/delete"><i class="fa-solid fa-trash-can"></i></a>
                <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
        {% endfor %}

    </table>

</div> <br>

<div class="acciones">
    <a href="/tareas"><button class="btn btn-primary">Volver</button></a>
</div>

{% endblock %}