<!DOCTYPE html>
<html>

    <head>
        <title>Teachers</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Teachers</h2>

            <div class="search-filter">
                <div class="search-bar">
                    <form action="<?= site_url('admin/teachers_dashboard/search') ?>" method="POST">
                        <input type="text" id="search_keyword" name="search_keyword" placeholder="Search">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php if (!empty($teachers)): ?>
                    <?php foreach ($teachers as $teacher): ?>
                        <tr>
                            <td><?= $teacher['first_name'] ?>         <?= $teacher['last_name'] ?></td>
                            <td><?= $teacher['course'] ?></td>
                            <td><?= $teacher['gender'] ?></td>
                            <td><?= $teacher['email'] ?></td>
                            <td><?= $teacher['address'] ?></td>
                            <td class='actions'>
                                <a href="<?= site_url('admin/teachers_dashboard/editTeacher/' . $teacher['email']) ?>">Edit</a>
                                <a
                                    href="<?= site_url('admin/teachers_dashboard/delete-teacher/' . $teacher['email']) ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan='5'>No Teachers found.</td>
                    </tr>
                <?php endif; ?>
            </table>
            <div class="pagination">
                <p>Entries per page: 10</p>
            </div>
            <div class="adminactions">
                <a href="<?= site_url('admin/importteachers') ?>">Import Teachers</a>
                <a href="<?= site_url('admin/admin_dashboard') ?>">Back</a>
            </div>
        </div>
    </body>

</html>