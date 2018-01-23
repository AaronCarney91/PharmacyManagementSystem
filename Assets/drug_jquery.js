$(document).ready(function() {
//Take selected drug name from the Drug form and pass it the the show method in the drug controller.

    $("#drug").on('change', function(e) {
        var name = $(this).val();
        //var ctrl = $(this).attr("id");

        $.ajax({
            method: 'get',
            url: '/index.php?controller=drug&method=show&params='+name,
            success: function(response) {
                response = JSON.parse(response);
                var columnNames = Object.keys(response);
                //alert(columnNames.toString());

                $("#drug_details").html("");
                $("#drug_details").append("" +
                    "<table>" +
                    "<tr><td>"+"Name: "+response[columnNames[1].toString()]+"</td></tr>" +
                    "<tr><td>"+"Brand: "+response[columnNames[2].toString()]+"</td></tr>" +
                    "<tr><td>"+"Per Pack: "+response[columnNames[3].toString()]+"</td></tr>" +
                    "<tr><td>"+"Price: "+response[columnNames[4].toString()]+"</td></tr>" +
                    "</table>");
            }
        })
    });
});