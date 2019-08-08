$(document).ready(function () {

    //consultar datos por búsqueda
    function obtenerEquipos() {
        $.ajax({
            type: "GET",
            url: "../PHP/Consultas.php",
            success: function (response) {
                const equipos = JSON.parse(response); //recibe el json con los datos de equipos

                let tabla = ''; //variable para escribir la tabla
                equipos.forEach(element => {
                    tabla += `
                        <tr>
                            
                        
                        </tr>
                    
                    
                    `
                });
            }
        });
    }
});