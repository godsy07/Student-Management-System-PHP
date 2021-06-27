<!-- <h2>Hello, <?php //echo $_SESSION['name'] ?> </h2> -->
<p>Below your details have been provided for editing.<br><br>


<div class="view-box">
    <div class="flex-box">
        <div class="label-box">
            <form class="edit-form" method="POST" action="../include/student/operations.inc.php">
                <div class="input-items">
                    <label>Name: </label>
                    <input type="text" name="name" value="<?php echo $_SESSION['name'];
                                                ?>" />
                </div>
                <div class="input-items">
                    <label>Class: </label>
                    <input type="text" name="class" value="<?php echo $_SESSION['class'];
                                                ?>" />
                </div>
                <div class="input-items">
                    <label>RollNo: </label>
                    <input type="text" name="rollno" value="<?php echo $_SESSION['rollno'];
                                                ?>" />
                </div>
                <div class="input-items">
                    <label>Email ID: </label>
                    <input type="email" name="email" value="<?php echo $_SESSION['email'];
                                                ?>" />
                </div>
                <div class="input-items">
                    <label>User Name: </label>
                    <input type="text" name="username" value="<?php echo $_SESSION['username'];
                                                ?>" />
                </div>

                <div class="input-items">
                    <button name="edit" type="submit">Submit Details</button>
                </div>
            </form>
        </div>

    </div>
</div>