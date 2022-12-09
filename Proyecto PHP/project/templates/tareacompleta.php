{% extends 'index.php' %}

{% block title %}Tarea Nº{{tarea.tarea_id}}{% endblock %}

{% block head %}
<style>
    body {
        background-color: #F0F0F0;
    }

    h1 {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #218FC1;
        color: white;
    }

    .table{
        border: 2px solid grey;
        background-color: white;
    }

    .list {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 3%;
        width: 95%;
    }

    .titles {
        background-color: black;
        color: white;
    }

    .acciones {
        margin-left: 95%;
    }
</style>
{% endblock %}

{% block content %}

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
                <th></th>
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
                <td class="botones">
                    <a href="/tareas/{{tarea.tarea_id}}/delete"><i class="fa-solid fa-trash-can"></i></a>
                    <a href="/tareas/{{tarea.tarea_id}}/complete"><i class="fa-solid fa-check"></i></a>
                    <a href="/tareas/{{tarea.tarea_id}}/update"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="acciones">
        <a href="/tareas"><button class="btn btn-primary">Volver</button></a>
    </div>

    {% block delete %}    {% endblock %}

    {% endblock %}
