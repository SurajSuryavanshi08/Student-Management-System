<!DOCTYPE html>
<html>

    <head>
        <title>Edit Student</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledash.css') ?>">
        <style>
            .student-profile {
                margin-top: 20px;
                text-align: center;
            }

            .student-profile img {
                width: 400px;
                height: relative;
                margin-right: 10px;
            }
        </style>
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Edit Student</h2>
            <div class="student-profile">
                <img src=" <?php echo base_url('public/images/' . $student['profile_photo']); ?>"
                    alt="Profile Photo"><br>
                <form action="<?= base_url('admin/student_update_profile'); ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="email" value="<?= $student['email']; ?>">
                    <input type="file" name="profile_photo" accept="image/jpeg">
                    <input type="submit" value="Update Profile Photo">
                </form>

            </div>
            <form action="<?= base_url('admin/students_dashboard/edit_student/' . $email) ?>" method="POST">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?= $student['first_name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?= $student['last_name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="Male" <?= ($student['gender'] === 'Male') ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= ($student['gender'] === 'Female') ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= $student['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?= $student['address'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update">
                    <a href="<?= base_url('admin/students_dashboard') ?>">Back</a>
                </div>
            </form>
        </div>
    </body>

</html>