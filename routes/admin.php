<?php
use Illuminate\Support\Facades\Route;

\L::Panel(app('admin')); ///SetLangredirecttoadmin
\L::LangNonymous(); //RunRouteLang'namespace'=>'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {
	Route::get('lock/screen', 'Admin\AdminAuthenticated@lock_screen');
	Route::get('theme/{id}', 'Admin\Dashboard@theme');
	Route::group(['middleware' => 'admin_guest'], function () {

		Route::get('login', 'Admin\AdminAuthenticated@login_page');
		Route::post('login', 'Admin\AdminAuthenticated@login_post');
		Route::view('forgot/password', 'admin.forgot_password');

		Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
		Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
		Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
	});

	Route::view('need/permission', 'admin.no_permission');

	Route::group(['middleware' => 'admin:admin'], function () {
		if (class_exists(\UniSharp\LaravelFilemanager\Lfm::class)) {
			Route::group(['prefix' => 'filemanager'], function () {
				\UniSharp\LaravelFilemanager\Lfm::routes();
			});
		}

		////////AdminRoutes/*Start*///////////////
		Route::get('/', 'Admin\Dashboard@home');
		Route::any('logout', 'Admin\AdminAuthenticated@logout');
		Route::get('account', 'Admin\AdminAuthenticated@account');
		Route::post('account', 'Admin\AdminAuthenticated@account_post');
		Route::resource('settings', 'Admin\Settings');
		Route::resource('admingroups', 'Admin\AdminGroups');
		Route::post('admingroups/multi_delete', 'Admin\AdminGroups@multi_delete');
		Route::resource('admins', 'Admin\Admins');
		Route::post('admins/multi_delete', 'Admin\Admins@multi_delete');
        Route::get('profile', 'Admin\Admins@profile')->name('profile');
		Route::get('editprofile', 'Admin\Admins@editprofile')->name('editprofile');
		Route::resource('regions','Admin\Regions');
		Route::post('regions/multi_delete','Admin\Regions@multi_delete');
		Route::resource('streets','Admin\Streets');
		Route::post('streets/multi_delete','Admin\Streets@multi_delete');
		Route::resource('subscribers','Admin\Subscribers');
		Route::post('subscribers/multi_delete','Admin\Subscribers@multi_delete');
		Route::post('subscribers/get/street/id','Admin\Subscribers@get_street_id');
		Route::resource('damages','Admin\Damages');
		Route::post('damages/multi_delete','Admin\Damages@multi_delete');
		Route::resource('tickets','Admin\Tickets');
		Route::get('archives','Admin\Tickets@archives');
		Route::post('tickets/multi_delete','Admin\Tickets@multi_delete');
        Route::put('closed/{id}','Admin\Tickets@closed')->name('closed');
        Route::put('reconsidering/{id}','Admin\Tickets@reconsidering')->name('reconsidering');
		Route::resource('actions','Admin\Actions');
		Route::post('actions/multi_delete','Admin\Actions@multi_delete');
		Route::resource('troubleshootings','Admin\Troubleshootings');
		Route::post('troubleshootings/multi_delete','Admin\Troubleshootings@multi_delete');
		Route::resource('salaries','Admin\Salaries');
		Route::post('salaries/multi_delete','Admin\Salaries@multi_delete');
		Route::resource('advances','Admin\Advances'); 
		Route::post('advances/multi_delete','Admin\Advances@multi_delete'); 
		Route::resource('funds','Admin\Funds'); 
		Route::post('funds/multi_delete','Admin\Funds@multi_delete'); 
		Route::resource('purchases','Admin\Purchases'); 
		Route::post('purchases/multi_delete','Admin\Purchases@multi_delete'); 
		Route::resource('salaryreports','Admin\SalaryReports');
		////////AdminRoutes/*End*///////////////
	});

});
