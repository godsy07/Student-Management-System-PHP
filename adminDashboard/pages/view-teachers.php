<button class="add-student">Add Teacher</button>
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
            echo "<td> 
                    <span>
                        <img class='icons' src='../assets/images/icons/edit.png'>
                    </span> 
                </td>";
            echo "<td> 
                    <span>
                        <img class='icons' src='../assets/images/icons/delete.png'>
                    </span> 
                </td>";
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