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
Route::group(['middleware' => ['web']], function () {

Route::get('/facebook/callback','\App\Http\Controllers\HomeController@cb');

	Route::get('/{country}/fb/post-test','\App\Http\Controllers\HomeController@fb');
Route::get('/{country}/jobs/applicantsajax','\App\Http\Controllers\JobsController@applicantsajax');
	Route::get('/{country}/account/redirect/{provider}', '\App\Http\Controllers\SocialAuthController@redirect');
	Route::get('/{country}/account/callback/{provider}', '\App\Http\Controllers\SocialAuthController@callback');
	Route::get('/{country}/account/logout', '\Modules\Employers\Http\Controllers\EmployersController@logout');
	Route::get('/{country}/company/{id}', '\Modules\Employers\Http\Controllers\EmployersController@show');
	Route::post('/{country}/jobs/search', array('as'=>'search','uses'=>'\App\Http\Controllers\JobsController@search'));
	Route::post('/{country}/jobs/searchadv', array('as'=>'advsearch','uses'=>'\App\Http\Controllers\JobsController@advsearch'));
	Route::get('/{country}/jobs/searchadv', array('as'=>'advsearch','uses'=>'\App\Http\Controllers\JobsController@advsearch'));
	Route::get('/', '\App\Http\Controllers\HomeController@select');
	Route::get('/{country}', '\App\Http\Controllers\HomeController@welcome');
	//Route::get('/{country}/jobs/{catid}','\App\Http\Controllers\JobsController@listbycategory');
	Route::get('/jobs/myjobsajax','\App\Http\Controllers\JobsController@myjobsajax');
	Route::get('/admin', '\Modules\Admin\Http\Controllers\SiteController@index');
	Route::get('/admin/login', '\Modules\Admin\Http\Controllers\SiteController@login');
	Route::post('/admin/login','\Modules\Admin\Http\Controllers\SiteController@login');
	Route::get('/{country}/jobs/{id}','\App\Http\Controllers\JobsController@viewjob');
	Route::get('/{country}/jobs/job-type/{jt}','\App\Http\Controllers\JobsController@jobsbyjobtype');
	Route::get('/{country}/jobs/shift/{shift}','\App\Http\Controllers\JobsController@jobsbyshift');
	Route::get('/{country}/jobs/experiance/{experiance}','\App\Http\Controllers\JobsController@jobsbyexperiance');
	Route::get('/{country}/jobs/city/{city}','\App\Http\Controllers\JobsController@jobsbycity');
	Route::get('/{country}/jobs/category/{category}','\App\Http\Controllers\JobsController@jobsbycategory');
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
	Route::get('/{country?}/admin/states/getbycountry/{cid}',array('as'=>'states.getbycountry', 'uses'=>'\Modules\Admin\Http\Controllers\StatesController@getByCountry'));
	Route::get('/{country?}/admin/cities/getbystate/{cid}',array('as'=>'cities.getbystate', 'uses'=>'\Modules\Admin\Http\Controllers\CitiesController@getByState'));
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
	Route::get('/{country}/employers/success', '\Modules\Employers\Http\Controllers\EmployersController@success');
	Route::post('/{country}/employers/signup', array('as'=>'emp.signup' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@createUser'));
	Route::get('{country}/account/create', array('as'=>'emp.register' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@register'));
	Route::post('{country}/account/conversation/send', array('as'=>'send' ,'uses'=>'\App\Http\Controllers\ConversationController@send'));
	Route::get('{country}/account/login', array('as'=>'emp.login' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@login'));
	Route::post('/{country}/employers/dologin', array('as'=>'emp.dologin' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@dologin'));
	Route::get('/{country}/employers/activate/{code}', array('as'=>'emp.activate' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@activate'));
	Route::get('/messages/already_activated', array('as'=>'emp.already_activated' ,'uses'=>'\App\Http\Controllers\MessagesController@already_activated'));
	Route::get('/messages/user_activated', array('as'=>'emp.user_activated' ,'uses'=>'\App\Http\Controllers\MessagesController@user_activated'));
	Route::get('/messages/invalid_activation_code', array('as'=>'emp.invalid_activation_code' ,'uses'=>'\App\Http\Controllers\MessagesController@invalid_activation_code'));
	Route::get('{country}/account/home', '\Modules\Employers\Http\Controllers\EmployersController@home');
	//HTMLS
	Route::get('/htmls/login_html', array('as'=>'emp.login_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@login_html'));
	Route::get('/htmls/signup_html', array('as'=>'emp.signup_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@signup_html'));
	Route::get('/htmls/seeker_login_html', array('as'=>'seeker.login_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@seeker_login_html'));
	Route::get('/htmls/seeker_signup_html', array('as'=>'seeker.signup_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@seeker_signup_html'));
	Route::get('/htmls/department_html', array('as'=>'emp.department_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@department_html'));
	Route::get('/{country}/seekers/profile/{id}','\Modules\Seeker\Http\Controllers\ResumeController@viewresume');
	//Route::get('/{country}/seekers/profile/download/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumePrintEmployer');
});

Route::group(['middleware' => ['web','auth']], function () {

	//Seeker - Reschedule Interview 
	Route::get('/{country}/seekers/interview/confirm/{id}', array('as'=>'confirm','uses'=>'\Modules\Employers\Http\Controllers\InterviewsController@confirm'));

	//Employers - Reschedule Interview 
	Route::post('/{country}/employers/interview/reschedule/update/{id}', array('as'=>'emp.reschedule.update','uses'=>'\Modules\Employers\Http\Controllers\InterviewsController@empRescheduleUpdate'));

	Route::get('/{country}/employers/interview/reschedule/{id}', '\Modules\Employers\Http\Controllers\InterviewsController@empReschedule');
	//Employers - Delete Interview
	Route::get('/{country}/employers/interview/delete/{id}', '\Modules\Employers\Http\Controllers\InterviewsController@deleteInterview');

	//Employers - List Employer's Scheduled Interviews
	Route::get('/{country}/employers/interviews', array('as'=>'scheduled.interviews','uses'=>'\Modules\Employers\Http\Controllers\InterviewsController@scheduledInterviews'));

	Route::get('/{country}/seeker/interview/{id}', array('as'=>'interview.detail','uses'=>'\Modules\Employers\Http\Controllers\InterviewsController@detail'));

	//Seeker - Reschedule Interview 
	Route::post('/{country}/seekers/interview/reschedule/update/{id}', array('as'=>'reschedule.update','uses'=>'\Modules\Employers\Http\Controllers\InterviewsController@rescheduleUpdate'));
	Route::get('/{country}/seekers/interview/reschedule/{id}', array('as'=>'reschedule','uses'=>'\Modules\Employers\Http\Controllers\InterviewsController@reschedule'));


	Route::post('/{country?}/employers/save-vanue', array('as'=>'emp.savevanue','uses'=>'\Modules\Employers\Http\Controllers\VanueController@save'));
	Route::post('/{country?}/employers/schedule/{application_id}', array('as'=>'scheduleinterview','uses'=>'\Modules\Employers\Http\Controllers\InterviewsController@schedule'));
	Route::get('/{country}/employers/interviews/schedule/{id}', array('as'=>'schedule-interview','uses'=>'\Modules\Employers\Http\Controllers\InterviewsController@scheduleInterview'));
	Route::get('/{country}/employers/update-vanue', array('as'=>'emp.vanue','uses'=>'\Modules\Employers\Http\Controllers\VanueController@update'));
	Route::get('/{country}/employers/update-vanue/{id}', array('as'=>'emp.vanue','uses'=>'\Modules\Employers\Http\Controllers\VanueController@update'));
	Route::get('/{country}/employers/vanues', array('as'=>'emp.vanues','uses'=>'\Modules\Employers\Http\Controllers\VanueController@all'));
	Route::get('/{country}/employers/myvanuesajax', array('as'=>'emp.vanues','uses'=>'\Modules\Employers\Http\Controllers\VanueController@myvanuesajax'));
	Route::get('/{country}/jobs/applications/{id}/{status}', array('as'=>'emp.applications', 'uses'=>'\App\Http\Controllers\JobsController@applications'));	
	Route::get('/{country}/employers/jobs/post-job', array('as'=>'emp.post', 'uses'=>'\App\Http\Controllers\JobsController@postJob'));
	Route::get('/{country}/employers/jobs/post-job/{id}', array('as'=>'emp.post', 'uses'=>'\App\Http\Controllers\JobsController@postJob'));
	Route::get('/{country}/employers/jobs/delete/{id}', array('as'=>'emp.delete', 'uses'=>'\App\Http\Controllers\JobsController@deleteJob'));
	Route::get('/{country}/employers/view/resume/{id?}/{application_id?}', array('as'=>'emp.view.resume', 'uses'=>'\App\Http\Controllers\JobsController@viewresume'));
	Route::get('/{country}/employers/vanue/delete/{id}', array('as'=>'emp.deletevanue', 'uses'=>'\Modules\Employers\Http\Controllers\VanueController@delete'));
	Route::get('/{country}/seekers/manage/resume/delete/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@delete');
	Route::post('/{country}/employers/savejob', array('as'=>'emp.savejob', 'uses'=>'\App\Http\Controllers\JobsController@savejob'));
	Route::post('/{country}/employers/savejob/{id}', array('as'=>'emp.savejob', 'uses'=>'\App\Http\Controllers\JobsController@savejob'));
	Route::get('/{country}/seekers/profile-picture', array('as'=>'uploadpp1','uses'=>'\Modules\Employers\Http\Controllers\EmployersController@profile_picture'));
Route::post('/{country}/seekers/upload-profile-picture', array('as'=>'uploadpp','uses'=>'\Modules\Employers\Http\Controllers\EmployersController@upload_profile_picture'));
	Route::get('/{country}/seekers/my-saved-jobs', array('as'=>'savedjobs','uses'=>'\App\Http\Controllers\JobsController@mySavedJobs'));
	Route::get('/{country}/seekers/my-applications', array('as'=>'applications','uses'=>'\App\Http\Controllers\JobsController@myApplications'));
	Route::get('{country}/seekers/my-application-on-jobs/{resumeid}', array('as'=>'applicationonjobs','uses'=>'\App\Http\Controllers\JobsController@myApplicationOnJobs'));
	Route::post('/{country}/seekers/apply', array('as'=>'apply','uses'=>'\App\Http\Controllers\JobsController@doApply'));
	Route::get('/{country}/seekers/apply/{jobid}','\App\Http\Controllers\JobsController@apply');
	Route::post('/{country}/seekers/save-job', array('as'=>'job.save','uses'=>'\Modules\Seeker\Http\Controllers\SavedJobsController@save'));
	Route::post('/{country}/employers/changeStatus', array('as'=>'changeStatus','uses'=>'\Modules\Seeker\Http\Controllers\ApplicationController@changeStatus'));
	Route::get('/{country}/seekers/manage/resume/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeView');
	//Route::get('/{country}/seekers/manage/resume/download/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumePrint');
	Route::get('/{country}/employers/download/resume/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumePrintEmployer');
	//Languages
	Route::get('/{country}/seekers/manage/resume-languages/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeLanguages');
	Route::get('/{country}/seekers/manage/update_language/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateLanguage');
	Route::get('/{country}/seekers/manage/delete_language/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteLanguage');
	Route::post('/{country}/seekers/manage/save-language/{resumeid}/{id}', array('as'=>'language.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveLanguage'));
	//Skills
	Route::get('/{country}/seekers/manage/resume-skills/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeSkills');
	Route::get('/{country}/seekers/manage/update_skill/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateSkill');
	Route::get('/{country}/seekers/manage/delete_skill/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteSkill');
	Route::post('/{country}/seekers/manage/save-skill/{resumeid}/{id}', array('as'=>'skill.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveSkill'));
	//References
	Route::get('/{country}/seekers/manage/resume-references/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeReferences');
	Route::get('/{country}/seekers/manage/update_reference/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateReference');
	Route::get('/{country}/seekers/manage/delete_reference/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteReference');
	Route::post('/{country}/seekers/manage/save-reference/{resumeid}/{id}', array('as'=>'reference.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveReference'));
	// Publications
	Route::get('/{country}/seekers/manage/resume-publications/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumePublications');
	Route::get('/{country}/seekers/manage/update_publication/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updatePublication');
	Route::get('/{country}/seekers/manage/delete_publication/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deletePublication');
	Route::post('/{country}/seekers/manage/save-publication/{resumeid}/{id}', array('as'=>'publication.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@savePublication'));
	//Affiliations
	Route::get('/{country}/seekers/manage/resume-affiliations/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeAffiliations');
	Route::get('/{country}/seekers/manage/update_affiliation/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateAffiliation');
	Route::get('/{country}/seekers/manage/delete_affiliation/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteAffiliation');
	Route::post('/{country}/seekers/manage/save-affiliation/{resumeid}/{id}', array('as'=>'affiliation.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveAffiliation'));
	//Portfolios
	Route::get('/{country}/seekers/manage/resume-portfolios/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumePortfolios');
	Route::get('/{country}/seekers/manage/update_portfolio/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updatePortfolio');
	Route::get('/{country}/seekers/manage/delete_portfolio/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deletePortfolio');
	Route::post('/{country}/seekers/manage/save-portfolio/{resumeid}/{id}', array('as'=>'portfolio.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@savePortfolio'));
	//Awards
	Route::get('/{country}/seekers/manage/resume-awards/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeAwards');
	Route::get('/{country}/seekers/manage/update_award/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateAward');
	Route::get('/{country}/seekers/manage/delete_award/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteAward');
	Route::post('/{country}/seekers/manage/save-award/{resumeid}/{id}', array('as'=>'award.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveAward'));
	//Certifications
	Route::get('/{country}/seekers/manage/resume-certifications/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeCertifications');
	Route::get('/{country}/seekers/manage/update_certification/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateCertification');
	Route::get('/{country}/seekers/manage/delete_certification/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteCertification');
	Route::post('/{country}/seekers/manage/save-certification/{resumeid}/{id}', array('as'=>'certification.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveCertification'));
	//Projects
	Route::get('/{country}/seekers/manage/resume-projects/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeProjects');
	Route::get('/{country}/seekers/manage/update_project/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateProject');
	Route::get('/{country}/seekers/manage/delete_project/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteProject');
	Route::post('/{country}/seekers/manage/save-project/{resumeid}/{id}', array('as'=>'project.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveProject'));
	//Experiances
	Route::get('/{country}/seekers/manage/resume-experiances/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeExperiances');
	Route::get('/{country}/seekers/manage/update_experiance/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateExperiance');
	Route::get('/{country}/seekers/manage/delete_experiance/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteExperiance');
	Route::post('/{country}/seekers/manage/save-experiance/{resumeid}/{id}', array('as'=>'experiance.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveExperiance'));
	//Academics
	Route::get('/{country}/seekers/manage/resume-academics/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeAcademics');
	Route::get('/{country}/seekers/manage/update_academics/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateAcademics');
	Route::get('/{country}/seekers/manage/delete_academics/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteAcademics');
	Route::post('/{country}/seekers/manage/save-academics/{resumeid}/{id}', array('as'=>'academics.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveAcademics'));
	Route::get('/{country}/seekers/manage/update-personal-information/{resumeid}', '\Modules\Seeker\Http\Controllers\ResumeController@updatePersonalInfo');
	Route::post('/{country}/seekers/manage/save-personal-information/{id}', array('as'=>'resumeprofile.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@savePersonalInfo'));
	Route::get('/{country}/seekers/manage/upload-resume', '\Modules\Seeker\Http\Controllers\ResumeController@uploadresume');
	Route::get('/{country}/seekers/create-resume', '\Modules\Seeker\Http\Controllers\ResumeController@create');
	Route::get('/{country}/seekers/dashboard', '\Modules\Seeker\Http\Controllers\SeekerController@dashboard');
	Route::get('/{country}/seekers', '\Modules\Seeker\Http\Controllers\SeekerController@dashboard');
	Route::get('/{country}/seekers/my-resumes', '\Modules\Seeker\Http\Controllers\SeekerController@myresumes');
	Route::post('{country}/seekrs/saveresume', array('as'=>'uploadresume' ,'uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveresume'));
	Route::get('/{country}/employers/dashboard','\Modules\Employers\Http\Controllers\EmployersController@dashboard');
	Route::get('/{country}/employers','\Modules\Employers\Http\Controllers\EmployersController@dashboard');
	Route::get('/{country}/employers/my-jobs','\App\Http\Controllers\JobsController@myjobs');
	//Employers Departments 

	Route::post('/{country}/employers/departments/save/{id}',array('as'=>'emp.savedepartment','uses'=>'\Modules\Employers\Http\Controllers\DepartmentsController@save'));
		Route::get('/{country}/employers/departments/new','\Modules\Employers\Http\Controllers\DepartmentsController@edit');
	Route::get('/{country}/employers/mydepartmentsajax','\Modules\Employers\Http\Controllers\DepartmentsController@mydepartmentsajax');
	Route::get('/{country}/employers/departments','\Modules\Employers\Http\Controllers\DepartmentsController@index');
	Route::get('/{country}/employers/departments/all','\Modules\Employers\Http\Controllers\DepartmentsController@allDepartments');
	Route::get('/{country}/employers/departments/create','\Modules\Employers\Http\Controllers\DepartmentsController@create');
	Route::post('/{country}/employers/departments/create',array('as'=>'department.add','uses'=>'\Modules\Employers\Http\Controllers\DepartmentsController@create'));
	Route::get('/{country}/employers/departments/edit/{id?}','\Modules\Employers\Http\Controllers\DepartmentsController@edit');
	Route::post('/{country}/employers/departments/edit/{id}','\Modules\Employers\Http\Controllers\DepartmentsController@edit');
	Route::post('/{country}/employers/departments/update/{id}',array('as'=>'departments.update','uses'=>'\Modules\Employers\Http\Controllers\DepartmentsController@update'));
	Route::get('/{country}/employers/departments/delete/{id}','\Modules\Employers\Http\Controllers\DepartmentsController@delete');
	//Employers
	Route::get('/{country}/employers/change-password', array('as'=>'change.password','uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@changePassword'));
Route::get('/{country}/employers/profile', array('as'=>'view.profile','uses'=>'\Modules\Employers\Http\Controllers\EmployersController@profile'));
Route::post('/{country}/employers/updateprofile', array('as'=>'update.profile','uses'=>'\Modules\Employers\Http\Controllers\EmployersController@updateprofile'));
Route::post('/{country}/employers/updatePassword', array('as'=>'updatePassword','uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@updatePassword'));

//privacy
Route::get('/{country}/employers/privacy', array('as'=>'view.privacy','uses'=>'\Modules\Employers\Http\Controllers\EmployersController@privacy'));
Route::post('/{country}/employers/updateprivacy', array('as'=>'update.privacy','uses'=>'\Modules\Employers\Http\Controllers\EmployersController@updateprivacy'));

//Notifications
Route::get('/{country}/employers/job-alerts', array('as'=>'view.alerts','uses'=>'\Modules\Employers\Http\Controllers\EmployersController@jobalerts'));
Route::post('/{country}/employers/updatejobalerts', array('as'=>'update.alerts','uses'=>'\Modules\Employers\Http\Controllers\EmployersController@updatejobalerts'));


	Route::get('/{country}/employers/update_company', array('as'=>'update.company','uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@updateCompnay'));
	Route::get('/{country}/employers/logo', '\Modules\Employers\Http\Controllers\CompanyInfoController@logo');
	Route::post('/{country}/employers/save', array('as'=>'updatecompany' ,'uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@save'));
	Route::post('/{country}/employers/uploadLogo', array('as'=>'upload.logo' ,'uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@uploadLogo'));
	Route::get('/{country}/employers/cover', '\Modules\Employers\Http\Controllers\CompanyInfoController@cover');
	Route::post('/{country}/employers/uploadCover', array('as'=>'upload.cover' ,'uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@uploadCover'));
	Route::get('{country}/saved/delete/{id}','\Modules\Seeker\Http\Controllers\SavedJobsController@delete');
	Route::get('/{country}/seekers/mysavedjobsajax',array('as'=>'savedjobsajax','uses'=>'\App\Http\Controllers\JobsController@mysavedjobsajax'));
	Route::get('/{country}/seekers/myapplicationsajax',array('as'=>'applicationsajax','uses'=>'\App\Http\Controllers\JobsController@myApplicationsAjax'));
	Route::get('/{country}/seekers/myresumeajax',array('as'=>'resumeajax','uses'=>'\Modules\Seeker\Http\Controllers\SeekerController@myResumeAjax'));
	Route::get('/{country}/seekers/myapplicationonjobsajax/{resumeid}',array('as'=>'applicationonjobsajax','uses'=>'\App\Http\Controllers\JobsController@myApplicationOnJobsAjax'));
	Route::get('/{country}/seekers/withdraw/{id}', '\App\Http\Controllers\JobsController@withdraw');

	Route::get('/{country}/employers/messages', '\App\Http\Controllers\ConversationController@inbox');


	

});
/*Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/pk/home', 'HomeController@index');
});*/

