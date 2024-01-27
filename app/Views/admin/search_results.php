<!DOCTYPE html>
<html>

    <head>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Admin Dashboard</h2>
            <p>Search Results for: <?= $search_keyword ?></p>
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
                <div class="actions">
                    <a href="<?= site_url('admin/students_dashboard') ?>">Back</a>
                </div>
            </div>
        </div>
    </body>

</html>