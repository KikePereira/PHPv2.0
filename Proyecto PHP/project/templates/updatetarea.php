{% extends 'plantilla.php' %}

{% block title %}Modificar Tarea Nº{{tarea.tarea_id}}{% endblock %}

{% block head %}
    <style>
        body{
        background-color: #F0F0F0;
        }
        .container{
            background-color: white;
            width: 900px;
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
        footer {
        position: sticky;
        }
        .credenciales{
        margin-left: 40%;
    }
    </style>
{% endblock %}

{% block content %}
    <div class="container">
        <form action="/tareas/{{tarea.tarea_id}}/update" class="row g-3 medidas" method="post">
            
            <div class="row g-3">
                <h4 for="">DATOS CONTACTO</h4>
                <div class="col-md-4">
                        <label for="">DNI: {{error.ErrorFormateado('dni')|raw}}</label> 
                        <input name="dni" type="text" class="form-control"value="{{tarea.dni}}">
                </div>

                <div class="col-md-4">
                    <label for="">Nombre: {{error.ErrorFormateado('nombre')|raw}}</label> 
                    <input name="nombre" type="text" class="form-control"value="{{tarea.nombre}}">
                </div>

                <div class="col-md-4">
                    <label for="">Apellido: {{error.ErrorFormateado('apellido')|raw}}</label> 
                    <input name="apellido" type="text" class="form-control"value="{{tarea.apellido}}">
                </div>
        
                <div class="col-md-6">
                    <label for="">Telefono: {{error.ErrorFormateado('telefono')|raw}}</label> 
                    <input name="telefono" type="text" class="form-control"value="{{tarea.telefono}}">
                </div>

                <div class="col-md-6">
                    <label for="">Correo: {{error.ErrorFormateado('correo')|raw}}</label> 
                    <input name="correo" type="text" class="form-control"value="{{tarea.correo}}">
                </div>
                <div class="col-md-12">
                    <label for="">Direccion: {{error.ErrorFormateado('direccion')|raw}}</label> 
                    <input name="direccion" type="text" class="form-control"value="{{tarea.direccion}}">
                </div>
                <div class="col-md-4">
                    <label for="">Codigo Postal: {{error.ErrorFormateado('codigopostal')|raw}}</label>
                    <input name="codigo_postal" type="text" class="form-control"value="{{tarea.codigo_postal}}">
                </div>

                <div class="col-md-4">
                    <label for="">Poblacion: {{error.ErrorFormateado('poblacion')|raw}}</label> 
                    <input name="poblacion" type="text" class="form-control"value="{{tarea.poblacion}}">
                </div>

                <div class="col-md-4">
                    <label for="">Provincia: </label>
                    <select id="inputState" class="form-select" name="provincia">
                        <option hidden selected value="{{tarea.provincia}}">{{tarea.provincia}}</option>
                        {% for provincias in provincias %}
                            <option value="{{provincias.nombre}}">{{provincias.nombre}}</option>
                        {% endfor %}
                    </select>
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
                        <option hidden value="{{tarea.estado_tarea}}" selected>{{tarea.estado_tarea}}</option>
                        <option value="Validacion">Validacion</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Realizada">Realizada</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="">Operario: </label>
                    <select name="operario" id="operarios" class="form-select">
                        <option hidden selected value="{{tarea.operario_encargado}}">{{tarea.operario_encargado}}</option>
                        {% for operarios in operarios %}
                            <option value="{{operarios.nombre}}">{{operarios.nombre}}</option>
                        {% endfor %}
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="">Fecha Creacion: </label> 
                    <input readonly name="fecha_creacion" type="date" class="form-control"value="{{tarea.fecha_creacion}}">
                </div>

                <div class="col-md-6">
                    <label for="">Fecha Realizacion: {{error.ErrorFormateado('fecharealizacion')|raw}}</label> 
                    <input name="fecha_realizacion" type="date" class="form-control"value="{{tarea.fecharealizacion}}">
                </div>

                <label for="">Anotacion: </label> 
                <textarea name="anotacion_inicio" class="form-control" id="" cols="30" rows="10">{{tarea.anotacion_inicio}}</textarea>

                <label for="">Anotacion Final: </label> 
                <textarea name="anotacion_final"  class="form-control" id="" cols="30" rows="10" placeholder="Anotaciones finales">{{tarea.anotacion_final}}</textarea>

            </div>
            <input type="hidden" name="_METHOD" value="PUT">
            <input type="submit" class="btn btn-primary">
            
    </form>
    <a href="/tareas"><button class="btn btn-primary">Cancelar</button></a>
</div>
{% endblock %}
