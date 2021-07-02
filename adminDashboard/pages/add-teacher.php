<div class="view-box">
<h2>Add Teacher</h2>
<br><br>
    <div class="flex-box">
        <div class="label-box">
            <form class="edit-form" method="POST" action="admin-actions/admin-actions.inc.php">
                <div class="input-items">
                    <label>Name: </label>
                    <input type="text" name="name" placeholder="Enter teacher name">
                </div>
                <div class="input-items">
                    <label>Email Address: </label>
                    <input type="text" name="email" placeholder="Enter teacher email">
                </div>
                <div class="input-items">
                    <label>Subject: </label>
                    <input type="text" name="subject" placeholder="Enter teacher subject">
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
                    <button name="submit-teacher" type="submit">Submit Details</button>
                </div>
            </form>
        </div>

    </div>
</div>