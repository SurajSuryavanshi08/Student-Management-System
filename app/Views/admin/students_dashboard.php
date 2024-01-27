<!DOCTYPE html>
<html>

    <head>
        <title>Students</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Students</h2>

            <div class="search-filter">
                <div class="search-bar">
                    <form action="<?= site_url('admin/students_dashboard/search') ?>" method="POST">
                        <input type="text" id="search_keyword" name="search_keyword" placeholder="Search">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <div class="actions">
                    <a href="<?= site_url('admin/students_dashboard/studadder') ?>" class="add-new-btn"
                        style="color:white;">Add New</a>
                </div>
            </div>
            <table>
                <tr>
                    <th>Profile Photo</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php if (!empty($students)): ?>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td class="profile-photo">
                                <img src="<?= base_url('public/images/' . $student['profile_photo']); ?>" alt="Profile Photo"
                                    width="70" height="70">
                            </td>
                            <td><?= $student['first_name'] ?>         <?= $student['last_name'] ?></td>
                            <td><?= $student['gender'] ?></td>
                            <td><?= $student['email'] ?></td>
                            <td><?= $student['address'] ?></td>
                            <td class='actions'>
                                <a href="<?= site_url('admin/students_dashboard/edit_student/' . $student['email']) ?>">Edit</a>
                                <a
                                    href="<?= site_url('admin/students_dashboard/delete-student/' . $student['email']) ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan='5'>No students found.</td>
                    </tr>
                <?php endif; ?>
            </table>
            <div class="pagination">
                <p>Entries per page: 10</p>
            </div>
            <div class="form-group">
                <a href="<?= site_url('admin/students_dashboard/importStudents') ?>">Import Students</a>
                <a href="<?= site_url('admin/admin_dashboard') ?>">Back</a>
            </div>
        </div>
    </body>

</html>