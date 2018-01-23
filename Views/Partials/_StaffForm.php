<form>
    <input type="hidden" id="controller" value="staff"/>
    <label>Select Staff Name</label>
    <select name='staff' id="staff">
        <?php
        //Drop down menu of staff names
        foreach($_SESSION['staff_list'] as $staff) {
            echo "<option value=\"".htmlentities($staff["staffName"])."\">".strval($staff["staffName"])."</option>";
        }
        ?>
    </select>
</form>

<div id="staff_details"></div>

<!--<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->
<script src="Assets/staff_jquery.js"></script>