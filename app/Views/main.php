<!DOCTYPE html>
<html>

    <head>
        <title>Login Options</title>
        <style>
            body {
                background-color: #f1f1f1;
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                text-align: center;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .container h2 {
                color: #b93632;
                margin-bottom: 30px;
            }

            .login-options {
                margin-left: 200px;
                max-width: 200px;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .login-options a {
                display: inline-block;
                font-size: 18px;
                padding: 10px 20px;
                border-radius: 5px;
                align-items: center;
                text-decoration: none;
                color: #fff;
                background-color: #b93632;
                transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            }

            .login-options a:hover {
                background-color: #fff;
                color: #000;
                border: black;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Login Options</h2>
            <div class="login-options">
                <a href="<?= base_url('admin-login') ?>">Admin</a>
                <a href="<?= base_url('student-login') ?>">Student</a>
                <a href="<?= base_url('teachers-login') ?>">Teacher</a>
            </div>
        </div>
    </body>

</html>