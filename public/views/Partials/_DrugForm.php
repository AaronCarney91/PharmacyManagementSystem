<form>

    <label>Select Medication</label>
    <select name='drug' id="drug">
        <?php
        //Display drop down menu of Patient names
        foreach($_SESSION['drug_list'] as $drug) {
            echo "<option value=\"".htmlentities($drug["drugName"])."\">".strval($drug["drugName"])."</option>";
        }
        ?>
    </select><br>


</form>

<div id="drug_details"></div>

<!--<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->
<script src="Assets/drug_jquery.js"></script>