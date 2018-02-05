$(document).ready(function() {
//COMMENTED CODE WAS AN ATTEMPT AT MAKING THIS FILE ABSTRACT SO IT COULD BE REUSED ELSEWHERE

    //Take patient name from the patient form and pass it to the sdhow method in the patient controller


    // $("#controller").on('change', function(e){
    //     ctrl = $(this).attr("id");
    //     alert(ctrl);
    // })

    // When we select our patient.
    //$("#" + $("#controller").val()).on('change', function(e) {
    $("#patient").on('change', function(e) {
        var name = $(this).val();
        //var ctrl = $(this).attr("id");

        $.ajax({
            method: 'get',
            url: '/index.php?controller=patient&method=show&params='+name,
            //url: '/index.php?controller='+ $("#controller").val() +'&method=show&params='+name,
            //url: '/index.php?controller='+ ctrl +'&method=show&params='+name,
            success: function(response) {
                response = JSON.parse(response);
                var columnNames = Object.keys(response);
                //alert(columnNames.toString());

                $("#patient_details").html("");
                $("#patient_details").append("" +
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