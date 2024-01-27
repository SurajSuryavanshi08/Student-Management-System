<!DOCTYPE html>
<html>

    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" href="<?= base_url('public/css/styledit.css'); ?>">
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
        <div class="container">
            <h2>Edit Profile</h2>

            <div class="admin-profile">
                <img src="<?php echo base_url('public/images/' . $admin['profile_photo']); ?>" alt="Profile Photo"><br>
                <form action="<?= base_url('admin/update_profile_image'); ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="file" name="profile_photo" accept="image/jpeg">
                    <input type="submit" value="Update Profile Photo">
                </form>
            </div>

            <div class="form-group edit-profile">
                <h3>Edit Profile</h3><br>
                <form id="editProfileForm" action="<?= base_url('admin/update_profile/' . $admin['email']); ?>"
                    method="post">
                    <div class="form-group">
                        <label for="first_name">First Name:</label><br>
                        <input type="text" id="first_name" name="first_name" value="<?= $admin['first_name']; ?>"
                            required><br><br>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label><br>
                        <input type="text" id="last_name" name="last_name" value="<?= $admin['last_name']; ?>"
                            required><br><br>
                    </div>

                    <div class="form-group edit-profile-submit">
                        <input type="submit" value="Update Profile">
                    </div>
                </form>
            </div>

            <div class="form-group other-links">
                <a href="<?= base_url('admin/changePassword'); ?>">Change Password</a>
            </div>

        </div>
    </body>

</html>