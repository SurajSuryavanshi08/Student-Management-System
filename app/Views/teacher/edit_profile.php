<!DOCTYPE html>
<html>

    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" href="<?php echo base_url('public/css/style.css'); ?>">
    </head>

    <body>
        <div class="container">
            <h2>Edit Profile</h2>
            <form action="<?php echo base_url('teacher/updateProfile'); ?>" method="post">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Profile">
                </div>
            </form>
        </div>
    </body>

</html>