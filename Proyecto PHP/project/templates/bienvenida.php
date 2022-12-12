{% extends 'plantilla.php' %}

{% block title %}Tareas{% endblock %}

{% block head %}
<style>
    body{
        background-color: #F0F0F0;
    }

    .list{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 5%;
        width: 90%;
    }
    .table{
        border: 2px solid grey;
        background-color: white;
    }
    .titles{
        background-color: black;
        color: white;
    }
    .buscador{
        margin-left: 80%;
    }
    .paginacion{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .paginacion a, .paginacion span{
        margin-right: 10px;
        margin-left: 10px;
    }
</style>
{% endblock %}


{% block content %}
<div class="list">
<h1>BIENVENIDO {{usuario.nombre}}!</h1>
</div>

{% endblock %}