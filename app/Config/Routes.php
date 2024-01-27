<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}


$routes->match(['get', 'post'], 'main', 'Home::index');

$routes->match(['get', 'post'], 'admin-login', 'AdminLoginController::index');
$routes->match(['get', 'post'], 'admin/login', 'AdminLoginController::login');
$routes->match(['get', 'post'], 'admin/logout', 'AdminLoginController::logout');
$routes->match(['get', 'post'], 'admin/edit_admin', 'AdminDashboardController::edit_admin');
$routes->match(['get', 'post'], 'admin/importteachers', 'AdminDashboardController::importteachers');
$routes->match(['get', 'post'], 'admin/teacherImport', 'AdminDashboardController::teacherImport');
$routes->match(['get', 'post'], 'admin/teachers_dashboard', 'AdminDashboardController::teachersDashboard');
$routes->match(['get', 'post'], 'admin/students_dashboard', 'AdminDashboardController::studentsDashboard');
$routes->match(['get', 'post'], 'admin/admin_dashboard', 'AdminDashboardController::index');
$routes->match(['get', 'post'], 'admin/editAdmin', 'AdminDashboardController::editAdmin');
$routes->match(['get', 'post'], '/admin/changePass', 'AdminLoginController::changePass');
$routes->match(['get', 'post'], '/admin/changePassword', 'AdminLoginController::changePassword');
$routes->match(['get', 'post'], '/admin/update_profile_image', 'AdminDashboardController::updateProfileImage');
$routes->match(['get', 'post'], '/admin/update_profile/(:any)', 'AdminDashboardController::updateProfile/$1');
$routes->match(['get', 'post'], 'admin/students_dashboard/edit_student/(:any)', 'AdminDashboardController::editStudent/$1');
$routes->match(['get', 'post'], 'admin/student_update_profile', 'AdminDashboardController::updateProfileStudent');




$routes->match(['get', 'post'], 'admin/teachers_dashboard/search', 'AdminDashboardController::searchTeacher');
$routes->match(['get', 'post'], 'admin/teachers_dashboard/adder', 'AdminDashboardController::teachadder');
$routes->match(['get', 'post'], 'admin/teachers_dashboard/add-teacher', 'AdminDashboardController::addteacher');
$routes->match(['get', 'post'], 'admin/teachers_dashboard/editTeacher/(:segment)', 'AdminDashboardController::editTeacher/$1');
$routes->match(['get', 'post'], 'admin/teachers_dashboard/delete-teacher/(:segment)', 'AdminDashboardController::deleteTeacher/$1');




$routes->match(['get', 'post'], 'admin/students_dashboard/search', 'AdminDashboardController::search');
$routes->match(['get', 'post'], 'admin/students_dashboard/studadder', 'AdminDashboardController::studadder');
$routes->match(['get', 'post'], 'admin/students_dashboard/importStudents', 'AdminDashboardController::importStudents');
$routes->match(['get', 'post'], 'admin/students_dashboard/processImport', 'AdminDashboardController::processImport');
$routes->match(['get', 'post'], 'admin/students_dashboard/add-student', 'AdminDashboardController::addstudent');
$routes->match(['get', 'post'], 'admin/students_dashboard/delete-student/(:any)', 'AdminDashboardController::deleteStudent/$1');




$routes->match(['get', 'post'], 'student-login', 'StudentLoginController::index');
$routes->match(['get', 'post'], 'student/login', 'StudentLoginController::login');
$routes->match(['get', 'post'], 'student/dashboard', 'StudentDashboardController::dashboard');
$routes->match(['get', 'post'], 'student/edit', 'StudentDashboardController::edit');
$routes->match(['get', 'post'], 'student/updateProfile/(:any)', 'StudentDashboardController::editStudent/$1');
$routes->match(['get', 'post'], 'student/updateProfilePhoto/(:any)', 'StudentDashboardController::updateProfilePhoto/$1');
$routes->match(['get', 'post'], 'student/changePassword/(:any)', 'StudentLoginController::changePassword/$1');
$routes->match(['get', 'post'], 'student/logout', 'StudentLoginController::logout');




$routes->add('teacher/login', 'TeacherController::login');
$routes->match(['get', 'post'], 'teacher/processLogin', 'TeacherController::processLogin');
$routes->add('teacher/dashboard', 'TeacherController::dashboard');
$routes->add('teacher/change_password', 'TeacherController::changePassword');
$routes->match(['get', 'post'], 'teacher/updatePassword', 'TeacherController::updatePassword');
$routes->add('teacher/edit_profile', 'TeacherController::editProfile');
$routes->match(['get', 'post'], 'teacher/updateProfile', 'TeacherController::updateProfile');
$routes->add('teacher/import_students', 'TeacherController::importStudents');
$routes->match(['get', 'post'], 'teacher/processImport', 'TeacherController::processImport');