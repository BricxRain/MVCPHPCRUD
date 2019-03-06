<?php

Route::set('index.php', function() {
    IndexController::CreateView('index');
});

Route::set('about-us', function() {
    AboutController::CreateView('aboutus');
});

Route::set('contact-us', function() {
    ContactController::CreateView('contactus');
});

Route::set('api-test', function() {
    ApiController::apiTest();
});

Route::set('api-users', function() {
    ApiController::getUsers();
});

Route::set('api-users-insertupdate', function() {
    ApiController::insertUpdateUser();
});

Route::set('api-users-find', function() {
    ApiController::findMigration();
});

Route::set('api-users-delete', function() {
    ApiController::deleteMigration();
});

?>