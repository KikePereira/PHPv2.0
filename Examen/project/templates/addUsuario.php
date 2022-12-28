{% extends 'plantilla.php' %}

{% block title %}Crear Usuario{% endblock %}

{% block head %}
<style>
    body{
        background-color: #F0F0F0;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 500px;
        margin-bottom: 100px;
    }

    h1 {
        text-align: center;
        margin-top: 2%;
    }

    .container {
        border: 2px solid grey;
        background-color: white;
    }

    form a{
        margin-bottom: 10px;
    }
    .credenciales{
        margin-left: 40%;
    }
</style>
{% endblock %}


{% block content %}
<h1>AÑADIR TAREA</h1> <br>

<div class="container">
    <form action="/usuarios/create" method="post" class="row g-1">
        <label for="">Nombre Usuario: </label> 
        <input type="text" class="form-control" placeholder="Nombre de usuario" name="nombre"> 
        <label for="">Contraseña: </label> 
        <input type="text" class="form-control" placeholder="Contraseña" name="password">
        <label for="">Tipo: </label>
        <select name="tipo" id="" class="form-control">
            <option value="operario">Operario</option>
            <option value="admin">Administrador</option>
        </select>
        
        <input type="submit" class="btn btn-primary">
        <a href="/usuarios/create"><button type="button" class="btn btn-primary w-100" class="restablecer">Restablecer</button></a>
    </form>
</div>
{% endblock %}
