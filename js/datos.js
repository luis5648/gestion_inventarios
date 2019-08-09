$(document).ready(function () {
    obtenerEquipos();

    $('#buscarEquipo').keyup(function (e) {
        let busq = $('#buscarEquipo').val();

        $.ajax({
            type: "POST",
            url: "../PHP/APIS/BuscarEquipos.php",
            data: {
                busq
            },

            success: function (response) {
                const equipos = JSON.parse(response); //recibe el json con los datos de equipos
                let tabla = ''; //variable para escribir la tabla
                equipos.forEach(element => {
                    tabla += `
                    <tr>

                        <td>${element.id}</td>
                        <td>${element.descripcion}</td>
                        <td>${element.falla}</td>
                        <td>${element.recibio}</td>
                        <td>${element.entrego}</td>
                        <td>${element.telefono}</td>
                        <td>${element.procedencia}</td>
                        <td>${element.fecha}</td>

                    </tr>


                `
                    $('#resEquipos').html(tabla);
                });
            }
        });

    });

    //consultar datos por búsqueda
    function obtenerEquipos() {

        $.ajax({
            type: "POST",
            url: "../PHP/APIS/MostrarEquipos.php",
            success: function (response) {

                const equipos = JSON.parse(response); //recibe el json con los datos de equipos
                let tabla = ''; //variable para escribir la tabla sin acciones
                let tablaA = ''; //variable para escribir la tabla con acciones
                equipos.forEach(element => {
                    tabla += `
                    <tr>

                        <td>${element.id}</td>
                        <td>${element.descripcion}</td>
                        <td>${element.falla}</td>
                        <td>${element.recibio}</td>
                        <td>${element.entrego}</td>
                        <td>${element.telefono}</td>
                        <td>${element.procedencia}</td>
                        <td>${element.fecha}</td>

                    </tr>


                `

                });
                equipos.forEach(element => {
                    tablaA += `
                    <tr>

                        <td>${element.id}</td>
                        <td>${element.descripcion}</td>
                        <td>${element.falla}</td>
                        <td>${element.recibio}</td>
                        <td>${element.entrego}</td>
                        <td>${element.telefono}</td>
                        <td>${element.procedencia}</td>
                        <td>${element.fecha}</td>
                        <td><a href=\"Modificar.php?w=".base64_encode($fila['ID_EQUIPO'])."\">Modificar</a> | <a href=\"Eliminar.php?w=".base64_encode($fila['ID_EQUIPO'])."&y=".base64_encode($usuario)."\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\">Eliminar</a></td></tr>

                    </tr>


                ` 
                });
                $('#resEquipos').html(tabla);
                $('#resEquipos2').html(tablaA);

            }
        });
    }
});