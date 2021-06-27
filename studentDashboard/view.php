<h2>Hello, <?php echo $_SESSION['name'] ?> </h2>
<p>Your details have been given below.<br>


<div class="view-box">
    <div class="flex-box">
        <div class="label-box">

            <div class="input-items">
                <label>Name: </label>
                <input type="text" value="<?php echo $_SESSION['name'];
                                            ?>" readonly />
            </div>
            <div class="input-items">
                <label>Class: </label>
                <input type="text" value="<?php echo $_SESSION['class'];
                                            ?>" readonly />
            </div>
            <div class="input-items">
                <label>RollNo: </label>
                <input type="text" value="<?php echo $_SESSION['rollno'];
                                            ?>" readonly />
            </div>
            <div class="input-items">
                <label>Email ID: </label>
                <input type="email" value="<?php echo $_SESSION['email'];
                                            ?>" readonly />
            </div>
            <div class="input-items">
                <label>User Name: </label>
                <input type="text" value="<?php echo $_SESSION['username'];
                                            ?>" readonly />
            </div>
        </div>

    </div>
</div>