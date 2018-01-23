<form>
    <input type="hidden" id="controller" value="patient"/>
    <label>View Patient Information</label>
    <select name='patient' id="patient">
        <?php
        //Display drop down menu of Patient names
        foreach($_SESSION['pat_list'] as $pat) {
            echo "<option value=\"".htmlentities($pat["patName"])."\">".strval($pat["patName"])."</option>";
        }
        ?>
    </select><br>


</form>

<div id="patient_details"></div>

<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script src="Assets/patient_jquery.js"></script>

