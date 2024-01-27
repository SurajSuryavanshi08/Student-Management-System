<!DOCTYPE html>
<html>

    <head>
        <title>Admin Dashboard</title>
        <style>
            body,
            h2,
            h3,
            p,
            a {
                margin: 0;
                padding: 0;
            }

            body {
                font-family: "Arial", sans-serif;
            }

            .container {
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            h2 {
                font-size: 28px;
                color: #b93632;
                text-align: center;
                margin-bottom: 20px;
            }

            .admin-profile {
                text-align: center;
                margin-bottom: 30px;
            }

            .admin-profile a {
                display: inline-block;
                text-decoration: none;
                color: #333;
            }

            .admin-profile img {
                border-radius: 50%;
                width: 300px;
                height: 300px;
                margin-bottom: 10px;
            }

            .admin-profile span {
                font-size: 18px;
                font-weight: bold;
                color: #b93632;
            }

            .form-group {
                margin-bottom: 30px;
                /* margin-left: 650px; */
                text-align: center;
            }

            .form-group h3 {
                font-size: 24px;
                color: #b93632;
                margin-bottom: 10px;
            }

            .form-group p {
                font-size: 16px;
                color: #333;
                margin-bottom: 10px;
            }

            .form-group a {
                display: inline-block;
                padding: 10px 20px;
                background-color: #b93632;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .form-group a:hover {
                background-color: #fff;
            }
        </style>
    </head>

    <body>
        <?php include 'sidebar.php'; ?>

        <div class="container">
            <h2>Admin Dashboard</h2>
            <div class="admin-profile">
                <a href="<?php echo base_url('admin/editAdmin'); ?>">
                    <img src="<?php echo base_url('public/images/' . $admin['profile_photo']); ?>"
                        alt="Profile Photo"><br>
                    <span><?php echo "Hi, " . session('admin')['first_name']; ?></span>
                </a>
            </div>

            <div class="form-group">
                <h3>Student Dashboard</h3>
                <p>Welcome to the Student Dashboard!</p>
                <p><a href="<?php echo base_url('admin/students_dashboard'); ?>">View Students</a></p>
            </div>

            <div class="form-group">
                <h3>Teacher Dashboard</h3>
                <p>Welcome to the Teacher Dashboard!</p>
                <p><a href="<?php echo base_url('admin/teachers_dashboard'); ?>">View Teachers</a></p>
            </div>
        </div>
    </body>

</html>