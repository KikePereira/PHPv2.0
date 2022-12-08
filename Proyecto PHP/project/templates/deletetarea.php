{% extends 'tareacompleta.php' %}

{% block delete %}    

<style>

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

    <div class="confirmar">
        <h3>!ATENCION! ¿Seguro que quiere Eliminar la tarea?</h3>
    </div><br>
    <div class="botones">
        <form action="/tareas/{{tarea.tarea_id}}" method="POST">
            <input type="hidden" name="_METHOD" value="DELETE">
            <input type="submit" value="SI" class="btn btn-success">
        </form>
        <a href="/tareas"><button herf="/tareas" class="btn btn-danger">No</button></a>

    </div>
{% endblock %}



