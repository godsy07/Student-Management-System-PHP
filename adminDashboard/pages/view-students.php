<button class="add-student">Add Student</button>
<h2>Details of Students</h2>
<!-- <br> -->
<?php

$data = $_SESSION['returnData'];
if ($data == 1) {
?>

    <table class="view-data">
        <thead>
            <!-- <caption>Details of the Students</caption> -->
            <tr>
                <th>Sl.No.</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Roll No</th>
                <th>Email Address</th>
                <th>User Name</th>
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
            echo "<td>" . $detail['class'] . "</td>";
            echo "<td>" . $detail['rollno'] . "</td>";
            echo "<td>" . $detail['email'] . "</td>";
            echo "<td>" . $detail['username'] . "</td>";
            echo "<td> Edit </td>";
            echo "<td> Delete </td>";
            echo "</tr>";
        }
        ?>
    </table>
<?php
} elseif ($data == 0) {
    ?>
    <div class="data-not-found">
        <p>It Seems you have not saved details for any student.</p>
    </div>
    <?php
}

?>