<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
// your api is integerated but if you want reintegrate no problem
// to configure jwt-auth visit this link https://jwt-auth.readthedocs.io/en/docs/

Route::group(['middleware' => ['ApiLang', 'cors'], 'prefix' => 'v1', 'namespace' => 'Api\V1'], function () {

	Route::get('/', function () {

	});
	// Insert your Api Here Start //
	Route::group(['middleware' => 'guest'], function () {
		Route::post('login', 'Auth\AuthAndLogin@login')->name('api.login');
		Route::post('register', 'Auth\Register@register')->name('api.register');
	});

	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('account', 'Auth\AuthAndLogin@account')->name('api.account');
		Route::post('logout', 'Auth\AuthAndLogin@logout')->name('api.logout');
		Route::post('refresh', 'Auth\AuthAndLogin@refresh')->name('api.refresh');
		Route::post('me', 'Auth\AuthAndLogin@me')->name('api.me');
		Route::post('change/password', 'Auth\AuthAndLogin@change_password')->name('api.change_password');
		//Auth-Api-Start//
		Route::apiResource("regions","RegionsApi", ["as" => "api.regions"]); 
			Route::post("regions/multi_delete","RegionsApi@multi_delete"); 
			Route::apiResource("streets","StreetsApi", ["as" => "api.streets"]); 
			Route::post("streets/multi_delete","StreetsApi@multi_delete"); 
			Route::apiResource("subscribers","SubscribersApi", ["as" => "api.subscribers"]); 
			Route::post("subscribers/multi_delete","SubscribersApi@multi_delete"); 
			Route::apiResource("damages","DamagesApi", ["as" => "api.damages"]); 
			Route::post("damages/multi_delete","DamagesApi@multi_delete"); 
			Route::apiResource("tickets","TicketsApi", ["as" => "api.tickets"]); 
			Route::post("tickets/multi_delete","TicketsApi@multi_delete"); 
			Route::apiResource("actions","ActionsApi", ["as" => "api.actions"]); 
			Route::post("actions/multi_delete","ActionsApi@multi_delete"); 
			Route::apiResource("troubleshootings","TroubleshootingsApi", ["as" => "api.troubleshootings"]); 
			Route::post("troubleshootings/multi_delete","TroubleshootingsApi@multi_delete"); 
			Route::apiResource("purchases","PurchasesApi", ["as" => "api.purchases"]); 
			Route::post("purchases/multi_delete","PurchasesApi@multi_delete"); 
			//Auth-Api-End//
	});
	// Insert your Api Here End //
});