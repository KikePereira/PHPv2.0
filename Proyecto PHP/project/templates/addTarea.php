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
        width: 400px;
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


<h1>DAR DE ALTA</h1> <br>

<div class="container">
    
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="row g-1">
        <label for="">Nombre: </label> 
        <input type="text" class="form-control" placeholder="Enrique" name="nombre" value=""> 
        <label for="">Apellido: </label> 
        <input type="text" class="form-control" placeholder="Pereira" name="apellido" value="">
        <label for="">CIF/NIF: </label> 
        <input type="text" placeholder="49106450R" class="form-control" name="dni" value=""> 
        <label for="">Correo Electronico: </label> 
        <input type="text" placeholder="kikepereiraramospr@gmail.com" class="form-control" name="correo" value="">
        <label for="">Telefono: </label> 
        <input type="text" placeholder="658 512 561" class="form-control" name="telefono" value="">
        <label for="">Direccion: </label>
        <input type="text" class="form-control" placeholder="C/ Camarada Montiel Pichardo, 2" name="direccion" value="">
        <label for="">Poblacion: </label>
        <input type="text" class="form-control" placeholder="Gibraleon" name="poblacion" value="">
        <label for="">Provincia: </label>
        <select id="inputState" class="form-select" name="provincia">
            <option disabled="disabled" selected value="">Selecciona provincia</option>
            <option value="Huelva">Huelva</option>
        </select>
        <label for="">Codigo Postal: </label>
        <input type="text" class="form-control" id="inputZip" placeholder="21007" name="codigo"value="<?php echo $_POST['codigo'] ?? '';?>"> <br>
        <label for="">Operario: </label>
        <select name="operarios" id="operarios" class="form-select" name="operario">
            <option disabled="disabled" selected>Selecciona un operario</option>
            <option>Pepe</option>
        </select>
        <label for="">Fecha de realizacion: </label>
        <input type="date" class="form-control" style="margin-left:0;" name="fechaR">
        <label for="">Anotaciones: </label>
        <textarea class="form-control" placeholder="Deja aqui tus anotaciones" style="height: 100px" name="anotacion"></textarea>

        <input type="submit" class="btn btn-primary" onclick="">

        <input type="reset" class="btn btn-primary">

    </form>
</div>
</html>