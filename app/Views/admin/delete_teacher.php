<!DOCTYPE html>
<html>

    <head>
        <title>Teacher Delete</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Teacher Delete</h2>

            <?php if ($deleted): ?>
                <p>Teacher data with email address <b><?= $email ?></b> deleted successfully!</p>
            <?php else: ?>
                <p>Error deleting Teacher data.</p>
            <?php endif; ?>

            <div class="actions">
                <a href="<?= site_url('admin/teachers_dashboard') ?>">Back</a>
            </div>
        </div>
    </body>

</html>