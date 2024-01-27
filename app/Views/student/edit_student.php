<!DOCTYPE html>
<html>

    <head>
        <title>Edit Profile</title>
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
                border-radius: 50%;
            }

            p {
                color: lightsalmon;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Edit Profile</h2>
            <div class="student-profile">
                <h3>Profile Photo</h3>
                <?php if (!empty($studentData['profile_photo'])): ?>
                    <img src="<?= base_url('public/images/' . $studentData['profile_photo']); ?>" alt="Profile Photo">
                <?php endif; ?>
                <form action="<?= base_url('student/updateProfilePhoto/' . $studentData['email']); ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="file" name="profile_photo" accept="image/jpeg">
                    <input type="submit" value="Update Profile Photo">
                </form>
            </div>
            <div class="student-profile">
                <form action="<?= base_url('student/updateProfile/' . $studentData['email']); ?>" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" value="<?= $studentData['first_name'] ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" value="<?= $studentData['last_name'] ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="Male" <?= ($studentData['gender'] === 'Male') ? 'selected' : '' ?>>Male</option>
                            <option value="Female" <?= ($studentData['gender'] === 'Female') ? 'selected' : '' ?>>Female
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?= $studentData['email'] ?>" required>
                        <p>Login again after email update!</p>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" value="<?= $studentData['address'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update">
                        <a href="<?= site_url('student/dashboard') ?>">Back</a>
                    </div>
                </form>
            </div>

            <div class="student-profile">
                <h3>Change Password</h3>
                <form action="<?= base_url('student/changePassword/' . $studentData['email']); ?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Current Password:</label>
                        <input type="password" id="current_password" name="current_password" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" id="new_password" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password">
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>