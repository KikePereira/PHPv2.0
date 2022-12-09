{% extends 'index.php' %}

{% block title %}Completar Tarea Nº{{tarea.tarea_id}}{% endblock %}

{% block head %}
    <style>
        body{
        background-color: #F0F0F0;
        }
        .container{
            background-color: white;
            width: 700px;
            border: 2px solid grey;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .btn{
            margin-bottom: 10px;
        }
        form{
            margin:2px
        }
        a button{
            width: 100%;
        }
    </style>
{% endblock %}

{% block content %}
    <div class="container">
        <form action="/tareas/{{tarea.tarea_id}}/update" class="row g-3 medidas" method="post">
            
            <div class="row g-3">
                <h4 for="">DATOS CONTACTO</h4>
                <div class="col-md-4">
                        <label for="">DNI: </label> 
                        <input name="dni" type="text" class="form-control"value="{{tarea.dni}}" readonly>
                </div>

                <div class="col-md-4">
                    <label for="">Nombre: </label> 
                    <input name="nombre" type="text" class="form-control"value="{{tarea.nombre}}" readonly>
                </div>

                <div class="col-md-4">
                    <label for="">Apellido: </label> 
                    <input name="apellido" type="text" class="form-control"value="{{tarea.apellido}}" readonly>
                </div>
        
                <div class="col-md-6">
                    <label for="">Telefono: </label> 
                    <input name="telefono" type="text" class="form-control"value="{{tarea.telefono}}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="">Correo: </label> 
                    <input name="correo" type="text" class="form-control"value="{{tarea.correo}}" readonly>
                </div>
                <div class="col-md-12">
                    <label for="">Direccion: </label> 
                    <input name="direccion" type="text" class="form-control"value="{{tarea.direccion}}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="">Codigo Postal: </label>
                    <input name="codigo_postal" type="text" class="form-control"value="{{tarea.codigo_postal}}" readonly>
                </div>

                <div class="col-md-4">
                    <label for="">Poblacion: </label> 
                    <input name="poblacion" type="text" class="form-control"value="{{tarea.poblacion}}" readonly>
                </div>

                <div class="col-md-4">
                    <label for="">Provincia: </label>
                    <input name="provincia" type="text" class="form-control"value="{{tarea.provincia}}" readonly>
                </div>
            </div>
            
            <div class="row g-3">
                <h4 for="">DATOS TAREA</h4>

                <div class="col-md-4">
                    <label for="">ID: </label> 
                    <input name="tarea_id" type="text" class="form-control"value="{{tarea.tarea_id}}" readonly>
                </div>

                <div class="col-md-4">
                    <label for="">Estado: </label>
                    <select name="estado_tarea" id="" class="form-control">
                        <option hidden value="Realizada" selected>Realizada</option>
                        <option value="Cancelada">Cancelada</option>
                        <option value="Pendiente">Pendiente</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="">Operario: </label>
                    <input type="text" name="operario" class="form-control" value="{{tarea.operario_encargado}}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="">Fecha Creacion: </label> 
                    <input name="fecha_creacion" type="date" class="form-control"value="{{tarea.fecha_creacion}}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="">Fecha Realizacion: </label> 
                    <input name="fecha_realizacion" type="date" class="form-control"value="{{tarea.fecha_realizacion}}" readonly>
                </div>

                <label for="">Anotacion: </label> 
                <textarea name="anotacion_inicio" class="form-control" id="" cols="30" rows="10" readonly>{{tarea.anotacion_inicio}}</textarea>

                <label for="">Anotacion Final: </label> 
                <textarea name="anotacion_final"  class="form-control" id="" cols="30" rows="10" placeholder="Añade las anotaciones al completar la tarea">{{tarea.anotacion_final}}</textarea>

            </div>
            <input type="hidden" name="_METHOD" value="PUT">
            <input type="submit" class="btn btn-primary">
            <a href="/tareas"><button class="btn btn-primary">Cancelar</button></a>
    </form>
</div>
{% endblock %}