<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Landing Page
    Route::delete('landing-pages/destroy', 'LandingPageController@massDestroy')->name('landing-pages.massDestroy');
    Route::post('landing-pages/media', 'LandingPageController@storeMedia')->name('landing-pages.storeMedia');
    Route::post('landing-pages/ckmedia', 'LandingPageController@storeCKEditorImages')->name('landing-pages.storeCKEditorImages');
    Route::resource('landing-pages', 'LandingPageController');

    // Subscribers
    Route::delete('subscribers/destroy', 'SubscribersController@massDestroy')->name('subscribers.massDestroy');
    Route::resource('subscribers', 'SubscribersController');

    // Sessions
    Route::delete('sessions/destroy', 'SessionsController@massDestroy')->name('sessions.massDestroy');
    Route::post('sessions/media', 'SessionsController@storeMedia')->name('sessions.storeMedia');
    Route::post('sessions/ckmedia', 'SessionsController@storeCKEditorImages')->name('sessions.storeCKEditorImages');
    Route::resource('sessions', 'SessionsController');

    // Attendees
    Route::delete('attendees/destroy', 'AttendeesController@massDestroy')->name('attendees.massDestroy');
    Route::resource('attendees', 'AttendeesController');

    // Emails
    Route::delete('emails/destroy', 'EmailsController@massDestroy')->name('emails.massDestroy');
    Route::post('emails/media', 'EmailsController@storeMedia')->name('emails.storeMedia');
    Route::post('emails/ckmedia', 'EmailsController@storeCKEditorImages')->name('emails.storeCKEditorImages');
    Route::resource('emails', 'EmailsController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController');

    // Schedules
    Route::delete('schedules/destroy', 'SchedulesController@massDestroy')->name('schedules.massDestroy');
    Route::resource('schedules', 'SchedulesController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Landing Page
    Route::delete('landing-pages/destroy', 'LandingPageController@massDestroy')->name('landing-pages.massDestroy');
    Route::post('landing-pages/media', 'LandingPageController@storeMedia')->name('landing-pages.storeMedia');
    Route::post('landing-pages/ckmedia', 'LandingPageController@storeCKEditorImages')->name('landing-pages.storeCKEditorImages');
    Route::resource('landing-pages', 'LandingPageController');

    // Subscribers
    Route::delete('subscribers/destroy', 'SubscribersController@massDestroy')->name('subscribers.massDestroy');
    Route::resource('subscribers', 'SubscribersController');

    // Sessions
    Route::delete('sessions/destroy', 'SessionsController@massDestroy')->name('sessions.massDestroy');
    Route::post('sessions/media', 'SessionsController@storeMedia')->name('sessions.storeMedia');
    Route::post('sessions/ckmedia', 'SessionsController@storeCKEditorImages')->name('sessions.storeCKEditorImages');
    Route::resource('sessions', 'SessionsController');

    // Attendees
    Route::delete('attendees/destroy', 'AttendeesController@massDestroy')->name('attendees.massDestroy');
    Route::resource('attendees', 'AttendeesController');

    // Emails
    Route::delete('emails/destroy', 'EmailsController@massDestroy')->name('emails.massDestroy');
    Route::post('emails/media', 'EmailsController@storeMedia')->name('emails.storeMedia');
    Route::post('emails/ckmedia', 'EmailsController@storeCKEditorImages')->name('emails.storeCKEditorImages');
    Route::resource('emails', 'EmailsController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController');

    // Schedules
    Route::delete('schedules/destroy', 'SchedulesController@massDestroy')->name('schedules.massDestroy');
    Route::resource('schedules', 'SchedulesController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
