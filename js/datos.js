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
                let tablaA = '';
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
                        <td><ul>
                            <li><a href="#">Eliminar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Cambiar status</a></li>
                        </ul></td>
                       

                    </tr>


                ` 
                });
                $('#resEquipos').html(tabla);
                $('#resEquipos2').html(tablaA);
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
                        <td><ul>
                            <li><a href="#">Eliminar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Cambiar status</a></li>
                        </ul></td>

                    </tr>


                ` 
                });
                $('#resEquipos').html(tabla);
                $('#resEquipos2').html(tablaA);

            }
        });
    }
});