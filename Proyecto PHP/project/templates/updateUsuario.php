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
    form{
        margin-top: 10px;

        margin-bottom: 10px;
    }

    form a{
        margin-bottom: 10px;
    }
</style>
{% endblock %}


{% block content %}
<h1>Modificar Usuario</h1> <br>

<div class="container">
    <form action="/usuarios/{{usuarios.usuario_id}}/update" method="post" class="row g-1">
        <label for="">Nombre Usuario: </label> 
        <input type="text" class="form-control" placeholder="Nombre de usuario" name="nombre" value="{{usuarios.nombre}}"> 
        <label for="">Contraseña: </label> 
        <input type="text" class="form-control" placeholder="Contraseña" name="password" value="{{usuarios.password}}">
        <label for="">Tipo: </label>
        <select name="tipo" id="" class="form-control">
            <option hidden selected value="{{usuarios.tipo}}">{{usuarios.tipo}}</option>
            <option value="admin">Administrador</option>
            <option value="operario">Operario</option>
        </select>
        <input type="hidden" name="_METHOD" value="PUT">
        <input type="submit" class="btn btn-primary">
    </form>
</div>

{% endblock %}
