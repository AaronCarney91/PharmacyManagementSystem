$(document).ready(function(){
//Pass the input data from the register form and pass it to the register method in the register controller


    $("#regForm").on('submit', function(e){

        e.preventDefault();

        //Attempt to check if fields passed are empty, would not work correctly unfortunately
        // $("#regForm").each(function() {
        //     if($(this).val() === "")
        //         alert("Empty Fields!!");
        // });

        var data = {
            name: $("#name").val(),
            dob: $("#dob").val(),
            address: $("#address").val(),
            city: $("#city").val(),
            postcode: $("#postcode").val(),
            contact: $("#contact").val()
        };

        document.getElementById("name").value = "";
        document.getElementById("dob").value = "";
        document.getElementById("address").value = "";
        document.getElementById("city").value = "";
        document.getElementById("postcode").value = "";
        document.getElementById("contact").value = "";

        $.ajax({
            type: 'post',
            url: 'index.php?controller=register&method=register',
            data: { request: data },
            success: function(response){
                $("#patient_registered").html("Patient Registered");

            }
        })

    });

});


