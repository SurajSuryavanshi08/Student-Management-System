<!DOCTYPE html>
<html>

    <head>
        <title>Edit Teacher</title>
        <link rel="stylesheet" href="<?php echo base_url('public/css/styledash.css'); ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Edit Teacher</h2>

            <form action="<?php echo base_url('admin/teachers_dashboard/editTeacher/' . $teacher['email']); ?>"
                method="post">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $teacher['first_name']; ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $teacher['last_name']; ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $teacher['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required><?php echo $teacher['address']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male" <?php echo ($teacher['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo ($teacher['gender'] == 'female') ? 'selected' : ''; ?>>Female
                        </option>
                        <option value="other" <?php echo ($teacher['gender'] == 'other') ? 'selected' : ''; ?>>Other
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="course">Course:</label>
                    <input type="text" id="course" name="course" value="<?php echo $teacher['course']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Teacher">
                    <a href="<?php echo base_url('admin/teachers_dashboard'); ?>">Cancel</a>
                </div>
            </form>
        </div>
    </body>

</html>