<?php 

    $data = $_SESSION['action-data'];

?>

<p>Below are the details of Student.</p>
<p>To Edit, perform change them "Submit".</p>


<div class="view-box">
    <div class="flex-box">
        <div class="label-box">
            <form class="edit-form" method="POST" action="admin-actions/admin-actions.inc.php">
                <div class="input-items">
                    <label>Name: </label>
                    <input type="text" name="name" value="<?php echo $data["name"];
                                                ?>" />
                </div>
                <div class="input-items">
                    <label>Class: </label>
                    <input type="text" name="class" value="<?php echo $data["class"];
                                                ?>" />
                </div>
                <div class="input-items">
                    <label>RollNo: </label>
                    <input type="text" name="rollno" value="<?php echo $data["rollno"];
                                                ?>" />
                </div>
                <div class="input-items">
                    <label>Email ID: </label>
                    <input type="email" name="email" value="<?php echo $data["email"];
                                                ?>" placeholder="Not Available" />
                </div>
                <div class="input-items">
                    <label>User Name: </label>
                    <input type="text" name="username" value="<?php echo $data["username"];
                                                ?>" />
                </div>
                <div class="input-items">
                    <label>Password: </label>
                    <input type="text" name="password" value="<?php echo $data["password"];
                                                ?>" />
                </div>
                    <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
                <div class="input-items">
                    <button name="edit-info" type="submit">Submit Details</button>
                </div>
            </form>
        </div>

    </div>
</div>