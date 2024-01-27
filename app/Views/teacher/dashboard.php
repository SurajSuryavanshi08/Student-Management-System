<!DOCTYPE html>
<html>

    <head>
        <title>Teacher Dashboard</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>
    <style>
        .teacher-actions {
            max-width: 70px;
            align-items: center;
        }

        .teacher-actions a {
            display: inline-block;
            padding: 4px 7px;
            margin-left: 2.5px;
            margin-right: 2.5px;
            margin-bottom: 1px;
            border: 1px solid #4230e3;
            border-radius: 3px;
            text-decoration: none;
            color: #4230e3;
            background-color: transparent;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .teacher-actions a:hover {
            background-color: #4230e3;
            color: whitesmoke;
        }
    </style>

    <body>
        <div class="container">
            <div class="teacher-actions">
                <a href="<?= site_url('admin/logout') ?>">Logout</a>
                <a href="<?= site_url('teacher/change_password') ?>">Change Password</a>
                <a href="<?= site_url('teacher/edit_profile') ?>">Edit Profile</a>
                <a href="<?= site_url('teacher/import_students') ?>">Import Students</a>
            </div>
            <h2>Teacher Dashboard</h2>

            <div class="search-filter">
                <div class="search-bar">
                    <form action="<?= site_url('admin/dashboard/search') ?>" method="POST">
                        <input type="text" id="search_keyword" name="search_keyword" placeholder="Search">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <div class="actions">
                    <a href="<?= site_url('admin/dashboard/add_student') ?>" class="add-new-btn">Add New</a>
                </div>
            </div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php if (!empty($students)): ?>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= $student['first_name'] ?>         <?= $student['last_name'] ?></td>
                            <td><?= $student['gender'] ?></td>
                            <td><?= $student['email'] ?></td>
                            <td><?= $student['address'] ?></td>
                            <td class='actions'>
                                <a href="<?= site_url('admin/dashboard/edit_student/' . $student['email']) ?>">Edit</a>
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
        </div>
    </body>

</html>