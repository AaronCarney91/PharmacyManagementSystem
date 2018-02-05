<html>
<head> <title> <?php echo "Carney's Chemist"; ?> </title> </head>
<head>  <link rel="stylesheet" type="text/css" href="mainForm.css">   </head>

<body>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Patient')">Patient</button>
        <button class="tablinks" onclick="openTab(event, 'Staff')">Staff</button>
        <button class="tablinks" onclick="openTab(event, 'Drug')">Drug</button>
        <button class="tablinks" onclick="openTab(event, 'Dispense')">Dispense</button>
        <button class="tablinks" onclick="openTab(event, 'Register')">Register</button>
    </div>

    <div id="Patient" class="tabcontent">
        <h1> Patient Tab </h1>
        <?php
        include("../Partials/_PatientForm.php");
        ?>
    </div>

    <div id="Staff" class="tabcontent">
        <h1>Staff Tab</h1>
        <?php
        include("public/views/Partials/_StaffForm.php");
        ?>
    </div>

    <div id="Drug" class="tabcontent">
        <h1>Staff Tab</h1>
        <?php
        include("public/views/Partials/_DrugForm.php");
        ?>
    </div>

    <div id="Dispense" class="tabcontent">
        <h1>Dispense Tab</h1>
        <?php
        include("public/views/Partials/_DispenseForm.php");
        ?>
    </div>

    <div id="Register" class="tabcontent">
        <h1>Register Patient</h1>
        <?php
        include("public/views/Partials/_RegForm.php");
        ?>
    </div>



</body>

<script>
//Method used to open tab's content
function openTab(evt, tabName)
{
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for(i = 0; i < tabcontent.length; i++)
    {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");

    for(i = 0; i < tablinks.lenght; i++)
    {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


</script>

</body>
</html>

