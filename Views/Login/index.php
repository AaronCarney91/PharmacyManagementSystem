<head> <title> <?php echo "Carney's Chemist"; ?> </title> </head>
<form action="index.php?controller=login&method=authenticate" method="post">
    <label>Select staff name</label>
    <select name='staff'>
    <?php
    //Drop down menu displaying Staff names
        foreach($_SESSION['staff_list'] as $staff) {
            echo "<option value=\"".htmlentities($staff["staffName"])."\">".strval($staff["staffName"])."</option>";
        }
    ?>
    </select><br>

    Password: <input type="text" name="password"><br>
    <input type="submit"  value="Login">

</form>