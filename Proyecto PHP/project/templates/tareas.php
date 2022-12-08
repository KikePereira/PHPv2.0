{% extends 'index.php' %}

{% block title %}Tareas{% endblock %}

{% block head %}
<style>
    body{
        background-color: #F0F0F0;
    }

    .list{
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px solid grey;
        margin-left: 5%;
        width: 90%;
    }
    .titles{
        background-color: black;
        color: white;
    }
    .buscador{
        margin-left: 80%;
    }
    .filtro{
        margin-left: 5%;
    }
    .paginacion{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .paginacion a{
        margin-right: 10px;
        margin-left: 10px;


    }
</style>
{% endblock %}


{% block content %}
<div class="filtro">
    <a href="/tareas/pendientes">Tareas Pendientes</a>
</div>

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
                        <a href="/tareas/{{tarea.tarea_id}}/delete"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="/tareas/{{tarea.tarea_id}}/update"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            {% endfor %}
            
        </table>

        
</div> <br>
    <div class="paginacion">
            <a href="/tareas?page=1">[PRIMERA]</a>
            <a href="/tareas?page={{paginaActual-1}}"><i class="fa-solid fa-arrow-left"></i></a>
            <h5>{{paginaActual}} de {{paginas}}</h5>
            <a href="/tareas?page={{paginaActual+1}}"><i class="fa-solid fa-arrow-right"></i></a>
            <a href="/tareas?page={{paginas}}">[ULTIMA]</a>
        </div>

<div class="buscador">
    <form action="/tareas/" method="post">
        <input type="text" name="find">
        <input type="submit" value="Buscar">
    </form>
</div>
{% endblock %}
