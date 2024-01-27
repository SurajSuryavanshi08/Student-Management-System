<!DOCTYPE html>
<html>

    <head>
        <title>Student Login</title>
        <link rel="stylesheet" href="<?php echo base_url('public/css/styledash.css'); ?>">
    </head>

    <body>
        <div class="container">
            <h2>Student Login</h2>

            <?php if (!empty(session()->getFlashdata('error'))): ?>
                <p class="error"><?php echo session()->getFlashdata('error'); ?></p>
            <?php endif; ?>

            <form action="<?php echo base_url('student/login'); ?>" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </body>

</html>