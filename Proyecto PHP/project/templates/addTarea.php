<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="/css/darAlta.css">
<style>
    body {
    background-image: url('https://img.freepik.com/fotos-premium/fondo-textura-marmol-blanco-textura-marmol-abstracta-patrones-naturales-diseno_41389-491.jpg?w=1480');
    background-repeat: no-repeat;
    background-size: cover;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 500px;
    }

    h1 {
        text-align: center;
        margin-top: 2%;
    }

    .container {
        border: 2px solid grey;
        background-color: white;
    }
</style>

<!-- BARRA DE NAVEGACION -->
{% include 'navbar.php' %}


<h1>AÑADIR TAREA</h1> <br>

<div class="container">
    
    <form action="/tareas/create" method="post" class="row g-1">
        <label for="">Nombre: {{error.ErrorFormateado('nombre')|raw}}</label> 
        <input type="text" class="form-control" placeholder="Enrique" name="nombre" value="{{tarea.nombre}}"> 
        <label for="">Apellido: {{error.ErrorFormateado('apellido')|raw}}</label> 
        <input type="text" class="form-control" placeholder="Pereira" name="apellido" value="{{tarea.apellido}}">
        <label for="">CIF/NIF: {{error.ErrorFormateado('dni')|raw}}</label> 
        <input type="text" placeholder="49106450R" class="form-control" name="dni" value="{{tarea.dni}}"> 
        <label for="">Correo Electronico: {{error.ErrorFormateado('correo')|raw}}</label> 
        <input type="text" placeholder="kikepereiraramospr@gmail.com" class="form-control" name="correo" value="{{tarea.correo}}">
        <label for="">Telefono: {{error.ErrorFormateado('telefono')|raw}}</label> 
        <input type="text" placeholder="658 512 561" class="form-control" name="telefono" value="{{tarea.telefono}}">
        <label for="">Direccion: {{error.ErrorFormateado('direccion')|raw}}</label>
        <input type="text" class="form-control" placeholder="C/ Camarada Montiel Pichardo, 2" name="direccion" value="{{tarea.direccion}}">
        <label for="">Poblacion: {{error.ErrorFormateado('poblacion')|raw}}</label>
        <input type="text" class="form-control" placeholder="Gibraleon" name="poblacion" value="{{tarea.poblacion}}">
        <label for="">Provincia: {{error.ErrorFormateado('provincia')|raw}}</label>
        <select id="inputState" class="form-select" name="provincia">
            {% if tarea.provincia=='' %}
                <option disabled hidden selected value="">Selecciona provincia</option>
                {% else %}
                    <option hidden selected value="{{tarea.provincia}}">{{tarea.provincia}}</option>
            {% endif %}

            {% for provincias in provincias %}
                <option value="{{provincias.nombre}}">{{provincias.nombre}}</option>
            {% endfor %}
        </select>
        <label for="">Codigo Postal: {{error.ErrorFormateado('codigopostal')|raw}}</label>
        <input type="text" class="form-control" id="inputZip" placeholder="21007" name="codigopostal"value=""> <br>
        <label for="">Operario: {{error.ErrorFormateado('operario')|raw}}</label>
        <select name="operario" id="operarios" class="form-select">
                {% if tarea.operario=='' %}
                    <option disabled hidden selected value="">Selecciona operario</option>
                {% else %}
                    <option hidden selected value="{{tarea.operario}}">{{tarea.operario}}</option>
                {% endif %}
            {% for operarios in operarios %}
                <option value="{{operarios.nombre}}">{{operarios.nombre}}</option>
            {% endfor %}
        </select>
        <label for="">Fecha de realizacion: {{error.ErrorFormateado('fecharealizacion')|raw}}</label>
        <input type="date" class="form-control" style="margin-left:0;" name="fecharealizacion">
        <label for="">Anotaciones: {{error.ErrorFormateado('anotacion')|raw}}</label>
        <textarea class="form-control" placeholder="Deja aqui tus anotaciones" style="height: 100px" name="anotaciones"></textarea>

        <input type="submit" class="btn btn-primary">
        <a href="/tareas/create"><button type="button" class="btn btn-primary w-100">Restablecer</button></a>

    </form>

</div>
</html>