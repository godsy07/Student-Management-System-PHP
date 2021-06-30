<div id="search-student">

    <p>To Search the Student, Enter the students 'Roll no' and 'Class'  OR  'Email Address'.</p>

    <form method="POST" action="admin-actions/admin-actions.inc.php">

        <div class="search">
            <div>
                <label>Roll No. :</label>
                <input type="text" name="rollno" placeholder="Enter Roll no">
            </div>

            <div>
                <label>Class :</label>
                <input type="text" name="class" placeholder="Enter Class">
            </div>
        </div>

        <p>OR</p>

        <div class="search">
            <div>
                <label>Email Address :</label>
                <input type="email" name="email" placeholder="Enter Email Address">
            </div>
        </div>
        <br>
        <button type="submit" name="search-student-action">Search</button>

    </form>

</div>