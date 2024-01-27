<!DOCTYPE html>
<html>

    <head>
        <title>Change Password</title>
        <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    </head>

    <body>
        <div class="container">
            <h2>Change Password</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="error">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="success">
                    <?php echo session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo base_url('student/changePassword'); ?>" method="POST">
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>
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
                    <a href="<?php echo base_url('student/dashboard'); ?>">Cancel</a>
                </div>
            </form>
        </div>
    </body>

</html>