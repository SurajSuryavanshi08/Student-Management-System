<!DOCTYPE html>
<html>

    <head>
        <title>Teacher Search</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Teacher Search</h2>

            <div class="search-form">
                <form action="<?= base_url('admin/searchteacher') ?>" method="post">
                    <input type="text" name="search_keyword" placeholder="Search Teachers">
                    <button type="submit">Search</button>
                </form>
            </div>

            <div class="search-results">
                <h3>Search Results</h3>
                <?php if (!empty($teachers)): ?>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($teachers as $teacher): ?>
                            <tr>
                                <td><?= $teacher['first_name'] ?>         <?= $teacher['last_name'] ?></td>
                                <td><?= $teacher['email'] ?></td>
                                <td><?= $teacher['gender'] ?></td>
                                <td><?= $teacher['address'] ?></td>
                                <td><?= $teacher['course'] ?></td>
                                <td class='actions'>
                                    <a
                                        href="<?= site_url('admin/teachers_dashboard/edit-teacher/' . $teacher['email']) ?>">Edit</a>
                                    <a
                                        href="<?= site_url('admin/teachers_dashboard/delete-teacher/' . $teacher['email']) ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No teachers found.</p>
                <?php endif; ?>
            </div>

            <div class="actions">
                <a href="<?= base_url('admin/teachers_dashboard') ?>">Back to Teacher Dashboard</a>
            </div>
        </div>
    </body>

</html>