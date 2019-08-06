$(document).ready(function () {
    
    //consultar datos por búsqueda
    $.ajax({
        type: "POST",
        url: "PHP/Consultas.php",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
});