<form id="disForm">

    <label>Welcome</label>
    <?php echo $_SESSION['user']; ?>
    <br>

    <label>Select Patient</label>
    <select name='patient' id="d_patient">
        <?php
        //Display drop down menu of Patient names
        foreach($_SESSION['pat_list'] as $pat) {
            echo "<option value=\"".htmlentities($pat["patName"])."\">".strval($pat["patName"])."</option>";
        }
        ?>
    </select><br>

    <label>Select Medication</label>
    <select name='drug' id="d_drug">
        <?php
        //Display drop down menu of Patient names
        foreach($_SESSION['drug_list'] as $drug) {
            echo "<option value=\"".htmlentities($drug["drugName"])."\">".strval($drug["drugName"])."</option>";
        }
        ?>
    </select><br>

    <label>Select Quantity</label>
    <select name='quantity' id="quantity">";
        <?php
        foreach(range(1, 100) as $quantity) {
            echo "<option value='$quantity'>$quantity</option>";
        }
        ?>
    </select><br>

    <label>Total £:</label>
    <input type="text" name="total" id="total" value="0.00" readonly><br>


    <input type="submit" id="disButton"  value="Dispense">

</form>

    <div id="dispense_details"></div>
    <script src="Assets/dispense_jquery.js"></script>

