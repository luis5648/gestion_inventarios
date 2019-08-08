$(document).ready(function () {
    //obtenerEquipos();

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
    }
});