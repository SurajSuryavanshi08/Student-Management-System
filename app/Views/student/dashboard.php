<!DOCTYPE html>
<html>

    <head>
        <title>Student Dashboard</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
        <style>
            .student-profile {
                text-align: center;
            }

            .student-profile img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Student Dashboard</h2>

            <div class="student-profile">
                <h3>Student Profile</h3>
                <?php if (!empty($studentData['profile_photo'])): ?>
                    <img src=" <?php echo base_url('public/images/' . $studentData['profile_photo']); ?>"
                        alt="Profile Photo"><br> <?php endif; ?>
                <p><strong>First Name:</strong> <?= $studentData['first_name'] ?></p>
                <p><strong>Last Name:</strong> <?= $studentData['last_name'] ?></p>
                <p><strong>Email:</strong> <?= $studentData['email'] ?></p>
                <p><strong>Gender:</strong> <?= $studentData['gender'] ?></p>
                <p><strong>Address:</strong> <?= $studentData['address'] ?></p>
            </div>

            <div class="actions">
                <a href="<?= base_url('student/edit?email=' . $studentData['email']) ?>">Edit Profile</a>
                <a href="<?= base_url('student/logout') ?>">Logout</a>
            </div>
        </div>
    </body>

</html>