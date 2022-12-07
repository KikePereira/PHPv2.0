<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<html lang="en">
    <style>
        .container{
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
    </style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/css/modificarTarea.css">
    
    <title>Modificar</title>
</head>

<body>
{% include 'navbar.php' %}

    <div class="container">
        <form class="row g-3 medidas">
            
            <div class="row g-3">
                <h4 for="">DATOS CONTACTO</h4>
                <div class="col-md-4">
                        <label for="">DNI: </label> 
                        <input name="DNI" type="text" class="form-control"value="{{tarea.dni}}">
                </div>

                <div class="col-md-4">
                    <label for="">Nombre: </label> 
                    <input name="nombre" type="text" class="form-control"value="{{tarea.nombre}}">
                </div>

                <div class="col-md-4">
                    <label for="">Apellido: </label> 
                    <input name="apellido" type="text" class="form-control"value="{{tarea.apellido}}">
                </div>
        
                <div class="col-md-6">
                    <label for="">Telefono: </label> 
                    <input name="telefono" type="text" class="form-control"value="{{tarea.telefono}}">
                </div>

                <div class="col-md-6">
                    <label for="">Correo: </label> 
                    <input name="correo" type="text" class="form-control"value="{{tarea.correo}}">
                </div>

                <div class="col-md-4">
                    <label for="">Codigo Postal: </label>
                    <input name="codigo_postal" type="text" class="form-control"value="{{tarea.codigo_postal}}">
                </div>

                <div class="col-md-4">
                    <label for="">Poblacion: </label> 
                    <input name="poblacion" type="text" class="form-control"value="{{tarea.poblacion}}">
                </div>

                <div class="col-md-4">
                    <label for="">Provincia: </label> 
                    <input name="provincia" type="text" class="form-control"value="{{tarea.provincia}}">
                </div>
            </div>
            
            <div class="row g-3">
                <h4 for="">DATOS TAREA</h4>

                <div class="col-md-4">
                    <label for="">ID: </label> 
                    <input name="tarea_id" type="text" class="form-control"value="{{tarea.tarea_id}}">
                </div>

                <div class="col-md-4">
                    <label for="">Estado: </label> 
                    <input name="estado_tarea" type="text" class="form-control"value="{{tarea.estado_tarea}}">
                </div>

                <div class="col-md-4">
                    <label for="">Operario: </label> 
                    <input name="operario_encargado" type="text" class="form-control"value="{{tarea.operario_encargado}}">
                </div>

                <div class="col-md-6">
                    <label for="">Fecha Creacion: </label> 
                    <input name="fecha_creacion" type="text" class="form-control"value="{{tarea.fecha_creacion}}">
                </div>

                <div class="col-md-6">
                    <label for="">Fecha Realizacion: </label> 
                    <input name="fecha_final" type="text" class="form-control"value="{{tarea.fecha_realizacion}}">
                </div>

                <label for="">Anotacion: </label> 
                <textarea name="anotacion_inicio" class="form-control" id="" cols="30" rows="10">{{tarea.anotacion_inicio}}</textarea>

                <label for="">Anotacion Final: </label> 
                <textarea name="anotacion_final"  class="form-control" id="" cols="30" rows="10">{{tarea.anotacion_final}}</textarea>

            </div>

            <input type="submit" class="btn btn-primary"> <br> <br>
    </form>
</div>

</body>

</html>