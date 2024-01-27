<!DOCTYPE html>
<html>

    <head>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <div class="logout-btn">
                <a href="<?= site_url('admin/logout') ?>">Logout</a>
            </div>
            <h2>Admin Dashboard</h2>

            <?php if ($deleted): ?>
                <p>Student data with email address <b><?= $student_email ?></b> deleted successfully!</p>
            <?php else: ?>
                <p>Error deleting student data.</p>
            <?php endif; ?>

            <div class="actions">
                <a href="<?= site_url('admin/students_dashboard') ?>">Back</a>
            </div>
        </div>
    </body>

</html>