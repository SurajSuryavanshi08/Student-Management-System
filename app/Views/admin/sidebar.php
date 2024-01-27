<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?= base_url('public/css/sidebar.css') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>

    <body>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header>My Menu</header>
            <a href="<?php echo base_url('admin/admin_dashboard'); ?>" class="active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <a href="<?php echo base_url('admin/students_dashboard'); ?>">
                <i class="fas fa-graduation-cap"></i>
                <span>Students</span>
            </a>
            <a href="<?php echo base_url('admin/teachers_dashboard'); ?>">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Teachers</span>
            </a>
            <a href="<?php echo base_url('admin/editAdmin'); ?>">
                <i class="far fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="<?php echo base_url('admin/logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </body>

</html>