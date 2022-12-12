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
            
            {% for usuarios in usuarios %}
                <tr>
                    <td>{{usuarios.usuario_id}}</td>
                    <td>{{usuarios.nombre}}</td> 
                    <td>{{usuarios.password}}</td> 
                    <td>{{usuarios.tipo}} </td> 
                    <td>{{usuarios.hora}}</td>
                    <td>
                        
                    </td>
                </tr>
            {% endfor %}
            
        </table>

        
</div>
{% endblock %}