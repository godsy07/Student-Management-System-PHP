<form method="POST" action="admin-actions/admin-actions.inc.php">
    <button class="add-student" type="submit" name="add-teacher">Add Teacher</button>
</form>
<h2>Details of Teachers</h2>
<!-- <br> -->
<?php

$data = $_SESSION['returnData'];
if ($data == 1) {
?>

    <table class="data-teachers">
        <thead>
            <!-- <caption>Details of the Students</caption> -->
            <tr>
                <th>Sl.No.</th>
                <th>Teacher Name</th>
                <th>Email Address</th>
                <th>Subjects</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php
        $actiondata = $_SESSION['action-data'];
        $count = 0;
        // print_r($actiondata);
        foreach ($actiondata as $detail) {
            $count++;
            echo "<tr>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . ucfirst($detail['name']) . "</td>";
            echo "<td>" . $detail['email'] . "</td>";
            echo "<td>" . ucfirst($detail['subjects']) . "</td>";
            echo "<td>" . $detail['password'] . "</td>";
            echo '<td> 
                    <form method="POST" action="admin-actions/admin-actions.inc.php">
                        <input type="hidden" name="id" value="' . $detail['id'] . '">
                        <button name="edit-teacher-details" type="submit" 
                            style="border: none; border-radius: 50%; background-color: rgb(85, 250, 179); cursor: pointer;">
                                <img class="icons" src="../assets/images/icons/edit.png">
                        </button> 
                    </form> 
                </td>';
            echo '<td> 
                    <form method="POST" action="admin-actions/admin-actions.inc.php">
                        <input type="hidden" name="id" value="' . $detail['id'] . '">
                        <button name="delete-teacher-details" type="submit" 
                            style="border: none; border-radius: 50%; background-color: rgb(250, 80, 80); cursor: pointer;">
                                <img class="icons" src="../assets/images/icons/delete.png">
                        </button> 
                    </form> 
                </td>';
            echo "</tr>";
        }
        ?>
    </table>
<?php
} elseif ($data == 0) {
?>
    <div class="data-not-found">
        <p>It Seems you have not saved details for any teacher.</p>
    </div>
<?php
}

?>