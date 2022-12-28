{% extends 'plantilla.php' %}

{% block title %}Lista Usuarios{% endblock %}

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
    .confirmar {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 6%;
        background-color: red;
        color: white;
        border: 2px solid black;
    }

    .botones {
        display: flex;
        justify-content: center;
        margin-bottom: 25%;

    }

    .botones input,
    .botones button {
        margin-left: 50px;
        margin-right: 50px;
        border: 2px solid black;

    }

</style>
{% endblock %}

{% block content %}

<div class="list">


    <table class="table">
            <tr class="titles">
                <th>ID</th>
                <th>Nombre</th>
                <th>Password</th>
                <th>Tipo</th>
                <th>Ultima Conexion</th>
                <th></th>
            </tr>
            
                <tr>
                    <td>{{usuarios.usuario_id}}</td>
                    <td>{{usuarios.nombre}}</td> 
                    <td>{{usuarios.password}}</td> 
                    <td>{{usuarios.tipo}} </td> 
                    <td>{{usuarios.hora}}</td>
                    <td>
                        
                    </td>
                </tr>
            
        </table>

        
        
</div>

<div class="confirmar">
        <h3>!ATENCION! ¿Seguro que quiere Eliminar el Usuario {{usuarios.nombre}}?</h3>
    </div><br>
    <div class="botones">
        <form action="/usuarios/{{usuarios.usuario_id}}" method="POST">
            <input type="hidden" name="_METHOD" value="DELETE">
            <input type="submit" value="SI" class="btn btn-success">
        </form>
        <a href="/usuarios"><button herf="/usuarios" class="btn btn-danger">No</button></a>

    </div>
{% endblock %}