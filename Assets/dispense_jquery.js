$(document).ready(function(){

    //Take fields from Dispense form and pass them to the dispense method in the Dispense controller.
    $("#disForm").on('submit', function(e){

        e.preventDefault();

        var data = {
            patient: $("#d_patient").val(),
            drug: $("#d_drug").val(),
            quantity: $("#quantity").val()
        };

        $.ajax({
            type: 'post',
            url: 'index.php?controller=dispense&method=dispense',
            data: { request: data },
            success: function(response){
                console.log(response);
                response = JSON.parse(response);
                $("#dispense_details").html("Dispensal Logged");
                document.getElementById("total").value = response;
            }
        })


    });

});