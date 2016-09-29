<?php
DB::enableQueryLog();

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Redirect;
Route::group(['middleware' => 'web'], function () {
	Route::get('/', function () {
    	return view('welcome');
	});
	Route::get('/admin/dashboard', function () {
    	return view("admin::dashboard");
    	//echo "dashboard";
	});
	Route::get('/admin', '\Modules\Admin\Http\Controllers\SiteController@index');
	Route::get('/admin/login', '\Modules\Admin\Http\Controllers\SiteController@login');
	Route::post('/admin/login','\Modules\Admin\Http\Controllers\SiteController@login');

	//Countries
	Route::get('/admin/countries','\Modules\Admin\Http\Controllers\CountriesController@index');
	Route::get('/admin/countries/all','\Modules\Admin\Http\Controllers\CountriesController@allCountries');
	Route::get('/admin/countries/create','\Modules\Admin\Http\Controllers\CountriesController@create');
	Route::post('/admin/countries/create','\Modules\Admin\Http\Controllers\CountriesController@create');
	
	Route::get('/admin/countries/edit/{id}','\Modules\Admin\Http\Controllers\CountriesController@edit');
	Route::post('/admin/countries/edit/{id}','\Modules\Admin\Http\Controllers\CountriesController@edit');
	Route::post('/admin/countries/update/{id}',array('as'=>'countries.update','uses'=>'\Modules\Admin\Http\Controllers\CountriesController@update'));
	Route::get('/admin/countries/delete/{id}','\Modules\Admin\Http\Controllers\CountriesController@delete');


	//States
	Route::get('/admin/states','\Modules\Admin\Http\Controllers\StatesController@index');
	Route::get('/admin/states/all','\Modules\Admin\Http\Controllers\StatesController@allStates');
	Route::get('/admin/states/getbycountry/{cid}',array('as'=>'states.getbycountry', 'uses'=>'\Modules\Admin\Http\Controllers\StatesController@getByCountry'));
	Route::get('/admin/cities/getbystate/{cid}',array('as'=>'cities.getbystate', 'uses'=>'\Modules\Admin\Http\Controllers\CitiesController@getByState'));
	Route::get('/admin/states/create','\Modules\Admin\Http\Controllers\StatesController@create');
	Route::post('/admin/states/create','\Modules\Admin\Http\Controllers\StatesController@create');
	Route::get('/admin/states/edit/{id}','\Modules\Admin\Http\Controllers\StatesController@edit');
	Route::post('/admin/states/edit/{id}','\Modules\Admin\Http\Controllers\StatesController@edit');
	Route::post('/admin/states/update/{id}',array('as'=>'states.update','uses'=>'\Modules\Admin\Http\Controllers\StatesController@update'));
	Route::get('/admin/states/delete/{id}','\Modules\Admin\Http\Controllers\StatesController@delete');

	//Cities
	Route::get('/admin/cities','\Modules\Admin\Http\Controllers\CitiesController@index');
	Route::get('/admin/cities/all','\Modules\Admin\Http\Controllers\CitiesController@allCities');
	Route::get('/admin/cities/create','\Modules\Admin\Http\Controllers\CitiesController@create');
	Route::post('/admin/cities/create','\Modules\Admin\Http\Controllers\CitiesController@create');
	Route::get('/admin/cities/edit/{id}','\Modules\Admin\Http\Controllers\CitiesController@edit');
	Route::post('/admin/cities/edit/{id}','\Modules\Admin\Http\Controllers\CitiesController@edit');
	Route::post('/admin/cities/update/{id}',array('as'=>'cities.update','uses'=>'\Modules\Admin\Http\Controllers\CitiesController@update'));
	Route::get('/admin/cities/delete/{id}','\Modules\Admin\Http\Controllers\CitiesController@delete');

	//Security Question
	Route::get('/admin/security-question','\Modules\Admin\Http\Controllers\SecurityQuestionController@index');
	Route::get('/admin/security-question/all','\Modules\Admin\Http\Controllers\SecurityQuestionController@allQuestions');
	Route::get('/admin/security-question/create','\Modules\Admin\Http\Controllers\SecurityQuestionController@create');
	Route::post('/admin/security-question/create','\Modules\Admin\Http\Controllers\SecurityQuestionController@create');
	
	Route::get('/admin/security-question/edit/{id}','\Modules\Admin\Http\Controllers\SecurityQuestionController@edit');
	Route::post('/admin/security-question/edit/{id}','\Modules\Admin\Http\Controllers\SecurityQuestionController@edit');
	Route::post('/admin/security-question/update/{id}',array('as'=>'securityquestion.update','uses'=>'\Modules\Admin\Http\Controllers\SecurityQuestionController@update'));
	Route::get('/admin/security-question/delete/{id}','\Modules\Admin\Http\Controllers\SecurityQuestionController@delete');


//Ad Type
	Route::get('/admin/ad-type','\Modules\Admin\Http\Controllers\AdTypeController@index');
	Route::get('/admin/ad-type/all','\Modules\Admin\Http\Controllers\AdTypeController@allAds');
	Route::get('/admin/ad-type/create','\Modules\Admin\Http\Controllers\AdTypeController@create');
	Route::post('/admin/ad-type/create','\Modules\Admin\Http\Controllers\AdTypeController@create');
	
	Route::get('/admin/ad-type/edit/{id}','\Modules\Admin\Http\Controllers\AdTypeController@edit');
	Route::post('/admin/ad-type/edit/{id}','\Modules\Admin\Http\Controllers\AdTypeController@edit');
	Route::post('/admin/ad-type/update/{id}',array('as'=>'adtype.update','uses'=>'\Modules\Admin\Http\Controllers\AdTypeController@update'));
	Route::get('/admin/ad-type/delete/{id}','\Modules\Admin\Http\Controllers\AdTypeController@delete');


	//Departments
	Route::get('/admin/departments','\Modules\Admin\Http\Controllers\DepartmentsController@index');
	Route::get('/admin/departments/all','\Modules\Admin\Http\Controllers\DepartmentsController@allDepartments');
	Route::get('/admin/departments/create','\Modules\Admin\Http\Controllers\DepartmentsController@create');
	Route::post('/admin/departments/create',array('as'=>'department.add','uses'=>'\Modules\Admin\Http\Controllers\DepartmentsController@create'));
	
	Route::get('/admin/departments/edit/{id}','\Modules\Admin\Http\Controllers\DepartmentsController@edit');
	Route::post('/admin/departments/edit/{id}','\Modules\Admin\Http\Controllers\DepartmentsController@edit');
	Route::post('/admin/departments/update/{id}',array('as'=>'departments.update','uses'=>'\Modules\Admin\Http\Controllers\DepartmentsController@update'));
	Route::get('/admin/departments/delete/{id}','\Modules\Admin\Http\Controllers\DepartmentsController@delete');


	//after_expiry_actions
	Route::get('/admin/after-expiry-actions','\Modules\Admin\Http\Controllers\AfterExpiryActionsController@index');
	Route::get('/admin/after-expiry-actions/all','\Modules\Admin\Http\Controllers\AfterExpiryActionsController@allAfterExpiryActions');
	Route::get('/admin/after-expiry-actions/create','\Modules\Admin\Http\Controllers\AfterExpiryActionsController@create');
	Route::post('/admin/after-expiry-actions/create','\Modules\Admin\Http\Controllers\AfterExpiryActionsController@create');
	
	Route::get('/admin/after-expiry-actions/edit/{id}','\Modules\Admin\Http\Controllers\AfterExpiryActionsController@edit');
	Route::post('/admin/after-expiry-actions/edit/{id}','\Modules\Admin\Http\Controllers\AfterExpiryActionsController@edit');
	Route::post('/admin/after-expiry-actions/update/{id}',array('as'=>'after-expiry-actions.update','uses'=>'\Modules\Admin\Http\Controllers\AfterExpiryActionsController@update'));
	Route::get('/admin/after-expiry-actions/delete/{id}','\Modules\Admin\Http\Controllers\AfterExpiryActionsController@delete');

//career-levels
	Route::get('/admin/career-levels','\Modules\Admin\Http\Controllers\CareerLevelsController@index');
	Route::get('/admin/career-levels/all','\Modules\Admin\Http\Controllers\CareerLevelsController@allCareerLevels');
	Route::get('/admin/career-levels/create','\Modules\Admin\Http\Controllers\CareerLevelsController@create');
	Route::post('/admin/career-levels/create','\Modules\Admin\Http\Controllers\CareerLevelsController@create');
	
	Route::get('/admin/career-levels/edit/{id}','\Modules\Admin\Http\Controllers\CareerLevelsController@edit');
	Route::post('/admin/career-levels/edit/{id}','\Modules\Admin\Http\Controllers\CareerLevelsController@edit');
	Route::post('/admin/career-levels/update/{id}',array('as'=>'career-levels.update','uses'=>'\Modules\Admin\Http\Controllers\CareerLevelsController@update'));
	Route::get('/admin/career-levels/delete/{id}','\Modules\Admin\Http\Controllers\CareerLevelsController@delete');

//categories
	Route::get('/admin/categories','\Modules\Admin\Http\Controllers\CategoriesController@index');
	Route::get('/admin/categories/all','\Modules\Admin\Http\Controllers\CategoriesController@allCategories');
	Route::get('/admin/categories/create','\Modules\Admin\Http\Controllers\CategoriesController@create');
	Route::post('/admin/categories/create','\Modules\Admin\Http\Controllers\CategoriesController@create');
	
	Route::get('/admin/categories/edit/{id}','\Modules\Admin\Http\Controllers\CategoriesController@edit');
	Route::post('/admin/categories/edit/{id}','\Modules\Admin\Http\Controllers\DepartmentsController@edit');
	Route::post('/admin/categories/update/{id}',array('as'=>'categories.update','uses'=>'\Modules\Admin\Http\Controllers\CategoriesController@update'));
	Route::get('/admin/categories/delete/{id}','\Modules\Admin\Http\Controllers\CategoriesController@delete');

//experiance-levels
	Route::get('/admin/experiance-levels','\Modules\Admin\Http\Controllers\ExperianceLevelsController@index');
	Route::get('/admin/experiance-levels/all','\Modules\Admin\Http\Controllers\ExperianceLevelsController@allExperianceLevels');
	Route::get('/admin/experiance-levels/create','\Modules\Admin\Http\Controllers\ExperianceLevelsController@create');
	Route::post('/admin/experiance-levels/create','\Modules\Admin\Http\Controllers\ExperianceLevelsController@create');
	
	Route::get('/admin/experiance-levels/edit/{id}','\Modules\Admin\Http\Controllers\ExperianceLevelsController@edit');
	Route::post('/admin/experiance-levels/edit/{id}','\Modules\Admin\Http\Controllers\ExperianceLevelsController@edit');
	Route::post('/admin/experiance-levels/update/{id}',array('as'=>'experiance-levels.update','uses'=>'\Modules\Admin\Http\Controllers\ExperianceLevelsController@update'));
	Route::get('/admin/experiance-levels/delete/{id}','\Modules\Admin\Http\Controllers\ExperianceLevelsController@delete');


//JobType
	Route::get('/admin/job-type','\Modules\Admin\Http\Controllers\JobTypeController@index');
	Route::get('/admin/job-type/all','\Modules\Admin\Http\Controllers\JobTypeController@allJobTypes');
	Route::get('/admin/job-type/create','\Modules\Admin\Http\Controllers\JobTypeController@create');
	Route::post('/admin/job-type/create','\Modules\Admin\Http\Controllers\JobTypeController@create');
	
	Route::get('/admin/job-type/edit/{id}','\Modules\Admin\Http\Controllers\JobTypeController@edit');
	Route::post('/admin/job-type/edit/{id}','\Modules\Admin\Http\Controllers\JobTypeController@edit');
	Route::post('/admin/job-type/update/{id}',array('as'=>'job-type.update','uses'=>'\Modules\Admin\Http\Controllers\JobTypeController@update'));
	Route::get('/admin/job-type/delete/{id}','\Modules\Admin\Http\Controllers\JobTypeController@delete');

//SalaryCurrency
	Route::get('/admin/salary-currency','\Modules\Admin\Http\Controllers\SalaryCurrencyController@index');
	Route::get('/admin/salary-currency/all','\Modules\Admin\Http\Controllers\SalaryCurrencyController@allSalaryCurrency');
	Route::get('/admin/salary-currency/create','\Modules\Admin\Http\Controllers\SalaryCurrencyController@create');
	Route::post('/admin/salary-currency/create','\Modules\Admin\Http\Controllers\SalaryCurrencyController@create');
	
	Route::get('/admin/salary-currency/edit/{id}','\Modules\Admin\Http\Controllers\SalaryCurrencyController@edit');
	Route::post('/admin/salary-currency/edit/{id}','\Modules\Admin\Http\Controllers\SalaryCurrencyController@edit');
	Route::post('/admin/salary-currency/update/{id}',array('as'=>'salary-currency.update','uses'=>'\Modules\Admin\Http\Controllers\SalaryCurrencyController@update'));
	Route::get('/admin/salary-currency/delete/{id}','\Modules\Admin\Http\Controllers\SalaryCurrencyController@delete');


//shift_timings
	Route::get('/admin/shift-timings','\Modules\Admin\Http\Controllers\ShiftTimingsController@index');
	Route::get('/admin/shift-timings/all','\Modules\Admin\Http\Controllers\ShiftTimingsController@allShiftTimings');
	Route::get('/admin/shift-timings/create','\Modules\Admin\Http\Controllers\ShiftTimingsController@create');
	Route::post('/admin/shift-timings/create','\Modules\Admin\Http\Controllers\ShiftTimingsController@create');
	
	Route::get('/admin/shift-timings/edit/{id}','\Modules\Admin\Http\Controllers\ShiftTimingsController@edit');
	Route::post('/admin/shift-timings/edit/{id}','\Modules\Admin\Http\Controllers\ShiftTimingsController@edit');
	Route::post('/admin/shift-timings/update/{id}',array('as'=>'shift-timings.update','uses'=>'\Modules\Admin\Http\Controllers\ShiftTimingsController@update'));
	Route::get('/admin/shift-timings/delete/{id}','\Modules\Admin\Http\Controllers\ShiftTimingsController@delete');

//Other_Benefits
	Route::get('/admin/other-benefits','\Modules\Admin\Http\Controllers\OtherBenefitsController@index');
	Route::get('/admin/other-benefits/all','\Modules\Admin\Http\Controllers\OtherBenefitsController@allOtherBenefits');
	Route::get('/admin/other-benefits/create','\Modules\Admin\Http\Controllers\OtherBenefitsController@create');
	Route::post('/admin/other-benefits/create','\Modules\Admin\Http\Controllers\OtherBenefitsController@create');
	
	Route::get('/admin/other-benefits/edit/{id}','\Modules\Admin\Http\Controllers\OtherBenefitsController@edit');
	Route::post('/admin/other-benefits/edit/{id}','\Modules\Admin\Http\Controllers\OtherBenefitsController@edit');
	Route::post('/admin/other-benefits/update/{id}',array('as'=>'other-benefits.update','uses'=>'\Modules\Admin\Http\Controllers\OtherBenefitsController@update'));
	Route::get('/admin/other-benefits/delete/{id}','\Modules\Admin\Http\Controllers\OtherBenefitsController@delete');

	//Employers
	Route::get('/employers', '\Modules\Employers\Http\Controllers\EmployersController@index');
	Route::post('/employers/signup', array('as'=>'emp.signup' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@createUser'));
	Route::post('/employers/login', array('as'=>'emp.login' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@login'));
	Route::get('/employers/activate/{code}', array('as'=>'emp.activate' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@activate'));
	Route::get('/messages/already_activated', array('as'=>'emp.already_activated' ,'uses'=>'\App\Http\Controllers\MessagesController@already_activated'));
	Route::get('/messages/user_activated', array('as'=>'emp.user_activated' ,'uses'=>'\App\Http\Controllers\MessagesController@user_activated'));
	Route::get('/messages/invalid_activation_code', array('as'=>'emp.invalid_activation_code' ,'uses'=>'\App\Http\Controllers\MessagesController@invalid_activation_code'));
	Route::get('/employers/home', '\Modules\Employers\Http\Controllers\EmployersController@home');
	Route::get('/employers/post-job', array('as'=>'emp.post', 'uses'=>'\App\Http\Controllers\JobsController@postJob'));

	//HTMLS
	Route::get('/htmls/login_html', array('as'=>'emp.login_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@login_html'));
	Route::get('/htmls/signup_html', array('as'=>'emp.signup_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@signup_html'));
	Route::get('/htmls/department_html', array('as'=>'emp.department_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@department_html'));
});




Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
