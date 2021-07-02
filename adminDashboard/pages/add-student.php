<div class="view-box">
<h2>Add Student</h2>
<br><br>
    <div class="flex-box">
        <div class="label-box">
            <form class="edit-form" method="POST" action="admin-actions/admin-actions.inc.php">
                <div class="input-items">
                    <label>Name: </label>
                    <input type="text" name="name" placeholder="Enter student name">
                </div>
                <div class="input-items">
                    <label>Class: </label>
                    <input type="number" name="class" placeholder="Enter class">
                </div>
                <div class="input-items">
                    <label>Rollno: </label>
                    <input type="number" name="rollno" placeholder="Enter roll no">
                </div>
                <div class="input-items">
                    <label>Email Address: </label>
                    <input type="text" name="email" placeholder="Enter student email (Optional)">
                </div>
                <div class="input-items">
                    <label>UserName: </label>
                    <input type="text" name="username" placeholder="Set a UserName for student">
                </div>
                <div class="input-items">
                    <label>Password: </label>
                    <input type="password" name="password" placeholder="Set teacher password">
                </div>
                <div class="input-items">
                    <label>Confirm Password: </label>
                    <input type="password" name="confirm-password" placeholder="Confirm password">
                </div>
                <div class="input-items">
                    <button name="submit-student" type="submit">Submit Details</button>
                </div>
            </form>
        </div>

    </div>
</div>