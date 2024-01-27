<!DOCTYPE html>
<html>

    <head>
        <title>Import Students</title>
        <link rel="stylesheet" href="<?php echo base_url('public/css/styledash.css'); ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Import Students</h2>
            <form action="<?php echo base_url('admin/students_dashboard/processImport'); ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="csv_file">CSV File:</label>
                    <input type="file" id="csv_file" name="csv_file" accept=".csv" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Import">
                    <a href="<?= site_url('admin/students_dashboard') ?>">Back</a>
                </div>
            </form>
        </div>
    </body>

</html>