<!DOCTYPE html>
<html>

    <head>
        <title>Change Password</title>
        <link rel="stylesheet" href="<?php echo base_url('public/css/styledit.css'); ?>">
    </head>

    <body>
        <div class="container">
            <h2>Change Password</h2>
            <form action="<?php echo base_url('teacher/updatePassword'); ?>" method="post">
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Change Password">
                </div>
            </form>
        </div>
    </body>

</html>