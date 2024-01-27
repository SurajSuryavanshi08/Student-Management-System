<!DOCTYPE html>
<html>

    <head>
        <title>Add Student</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>


    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Add Student</h2>
            <form action="<?= site_url('admin/students_dashboard/add-student') ?>" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="profile_photo">Profile Photo:</label>
                    <input type="file" id="profile_photo" name="profile_photo" accept="image/jpeg">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add Student">
                    <div class="custom-button custom-button">
                        <a href="<?= site_url('admin/students_dashboard') ?>">Back</a>
                    </div>
                </div>

            </form>
        </div>
    </body>

</html>