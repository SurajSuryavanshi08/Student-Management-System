<!DOCTYPE html>
<html>

    <head>
        <title>Teacher Login</title>
        <link rel="stylesheet" href="<?php echo base_url('public/css/styledash.css'); ?>">
    </head>

    <body>
        <div class="container">
            <h2>Teacher Login</h2>
            <form action="<?php echo base_url('teacher/processLogin'); ?>" method="post">
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