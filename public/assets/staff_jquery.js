$(document).ready(function() {
//Pass the selected staff name from the staff form to the show method in the staff controller


    // When we select our patient.
    $("#staff").on('change', function(e) {
        var name = $(this).val();

        $.ajax({
            method: 'get',
            url: '/index.php?controller=staff&method=show&params='+name,
            success: function(response) {
                response = JSON.parse(response);
                var columnNames = Object.keys(response);

                $("#staff_details").html("");
                $("#staff_details").append("" +
                    "<table>" +
                    "<tr><td>"+response[columnNames[1].toString()]+"</td></tr>" +
                    "<tr><td>"+response[columnNames[2].toString()]+"</td></tr>" +
                    "<tr><td>"+response[columnNames[3].toString()]+"</td></tr>" +
                    "<tr><td>"+response[columnNames[4].toString()]+"</td></tr>" +
                    "<tr><td>"+response[columnNames[5].toString()]+"</td></tr>" +
                    "<tr><td>"+response[columnNames[6].toString()]+"</td></tr>" +
                    "</table>");
            }
        })
    });
});
