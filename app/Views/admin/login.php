<!DOCTYPE html>
<html>

    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>

    <body>
        <div class="container">
            <h2>Admin Login</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
            <form action="<?php echo site_url('admin/login'); ?>" method="POST">
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