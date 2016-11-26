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
	Route::post('/{country}/jobs/search', array('as'=>'search','uses'=>'\App\Http\Controllers\JobsController@search'));
	Route::get('/', '\App\Http\Controllers\HomeController@select');
	Route::get('/{country}', '\App\Http\Controllers\HomeController@welcome');
	Route::get('/jobs/{country}/{id}','\App\Http\Controllers\JobsController@listbycategory');
	Route::get('/jobs/myjobsajax','\App\Http\Controllers\JobsController@myjobsajax');
	Route::get('/admin', '\Modules\Admin\Http\Controllers\SiteController@index');
	Route::get('/admin/login', '\Modules\Admin\Http\Controllers\SiteController@login');
	Route::post('/admin/login','\Modules\Admin\Http\Controllers\SiteController@login');
	Route::get('/jobs/{id}','\App\Http\Controllers\JobsController@viewjob');

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

	Route::get('/employers/success', '\Modules\Employers\Http\Controllers\EmployersController@success');
	Route::post('/employers/signup', array('as'=>'emp.signup' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@createUser'));
	Route::get('/account/create', array('as'=>'emp.register' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@register'));
	Route::get('/account/login', array('as'=>'emp.login' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@login'));
	Route::post('/employers/dologin', array('as'=>'emp.dologin' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@dologin'));
	Route::get('/employers/activate/{code}', array('as'=>'emp.activate' ,'uses'=>'\Modules\Employers\Http\Controllers\EmployersController@activate'));
	Route::get('/messages/already_activated', array('as'=>'emp.already_activated' ,'uses'=>'\App\Http\Controllers\MessagesController@already_activated'));
	Route::get('/messages/user_activated', array('as'=>'emp.user_activated' ,'uses'=>'\App\Http\Controllers\MessagesController@user_activated'));
	Route::get('/messages/invalid_activation_code', array('as'=>'emp.invalid_activation_code' ,'uses'=>'\App\Http\Controllers\MessagesController@invalid_activation_code'));
	Route::get('/account/home', '\Modules\Employers\Http\Controllers\EmployersController@home');
	Route::get('/employers/post-job', array('as'=>'emp.post', 'uses'=>'\App\Http\Controllers\JobsController@postJob'));

	//HTMLS
	Route::get('/htmls/login_html', array('as'=>'emp.login_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@login_html'));
	Route::get('/htmls/signup_html', array('as'=>'emp.signup_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@signup_html'));

		Route::get('/htmls/seeker_login_html', array('as'=>'seeker.login_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@seeker_login_html'));
	Route::get('/htmls/seeker_signup_html', array('as'=>'seeker.signup_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@seeker_signup_html'));
	Route::get('/htmls/department_html', array('as'=>'emp.department_html' ,'uses'=>'\App\Http\Controllers\HtmlsController@department_html'));
});

Route::group(['middleware' => 'auth'], function () {
	Route::post('/seekers/apply', array('as'=>'apply','uses'=>'\App\Http\Controllers\JobsController@doApply'));
	Route::get('/seekers/apply/{jobid}','\App\Http\Controllers\JobsController@apply');
	Route::post('/seekers/save-job', array('as'=>'job.save','uses'=>'\Modules\Seeker\Http\Controllers\SavedJobsController@save'));
	Route::get('/seekers/manage/resume/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeView');
	Route::get('/seekers/manage/resume/download/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumePrint');
	//Languages
	Route::get('/seekers/manage/resume-languages/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeLanguages');
	Route::get('/seekers/manage/update_language/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateLanguage');
	Route::get('/seekers/manage/delete_language/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteLanguage');
	Route::post('/seekers/manage/save-language/{resumeid}/{id}', array('as'=>'language.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveLanguage'));


//Skills
	Route::get('/seekers/manage/resume-skills/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeSkills');
	Route::get('/seekers/manage/update_skill/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateSkill');
	Route::get('/seekers/manage/delete_skill/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteSkill');
	Route::post('/seekers/manage/save-skill/{resumeid}/{id}', array('as'=>'skill.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveSkill'));


//References
	Route::get('/seekers/manage/resume-references/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeReferences');
	Route::get('/seekers/manage/update_reference/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateReference');
	Route::get('/seekers/manage/delete_reference/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteReference');
	Route::post('/seekers/manage/save-reference/{resumeid}/{id}', array('as'=>'reference.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveReference'));

// Publications
	Route::get('/seekers/manage/resume-publications/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumePublications');
	Route::get('/seekers/manage/update_publication/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updatePublication');
	Route::get('/seekers/manage/delete_publication/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deletePublication');
	Route::post('/seekers/manage/save-publication/{resumeid}/{id}', array('as'=>'publication.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@savePublication'));


//Affiliations
	Route::get('/seekers/manage/resume-affiliations/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeAffiliations');
	Route::get('/seekers/manage/update_affiliation/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateAffiliation');
	Route::get('/seekers/manage/delete_affiliation/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteAffiliation');
	Route::post('/seekers/manage/save-affiliation/{resumeid}/{id}', array('as'=>'affiliation.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveAffiliation'));



//Portfolios
	Route::get('/seekers/manage/resume-portfolios/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumePortfolios');
	Route::get('/seekers/manage/update_portfolio/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updatePortfolio');
	Route::get('/seekers/manage/delete_portfolio/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deletePortfolio');
	Route::post('/seekers/manage/save-portfolio/{resumeid}/{id}', array('as'=>'portfolio.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@savePortfolio'));



//Awards
	Route::get('/seekers/manage/resume-awards/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeAwards');
	Route::get('/seekers/manage/update_award/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateAward');
	Route::get('/seekers/manage/delete_award/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteAward');
	Route::post('/seekers/manage/save-award/{resumeid}/{id}', array('as'=>'award.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveAward'));


//Certifications
	Route::get('/seekers/manage/resume-certifications/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeCertifications');
	Route::get('/seekers/manage/update_certification/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateCertification');
	Route::get('/seekers/manage/delete_certification/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteCertification');
	Route::post('/seekers/manage/save-certification/{resumeid}/{id}', array('as'=>'certification.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveCertification'));


//Projects
	Route::get('/seekers/manage/resume-projects/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeProjects');
	Route::get('/seekers/manage/update_project/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateProject');
	Route::get('/seekers/manage/delete_project/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteProject');
	Route::post('/seekers/manage/save-project/{resumeid}/{id}', array('as'=>'project.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveProject'));

//Experiances
	Route::get('/seekers/manage/resume-experiances/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeExperiances');
	Route::get('/seekers/manage/update_experiance/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateExperiance');
	Route::get('/seekers/manage/delete_experiance/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteExperiance');
	Route::post('/seekers/manage/save-experiance/{resumeid}/{id}', array('as'=>'experiance.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveExperiance'));
//Academics
	Route::get('/seekers/manage/resume-academics/{resumeid}','\Modules\Seeker\Http\Controllers\ResumeController@resumeAcademics');
	Route::get('/seekers/manage/update_academics/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@updateAcademics');
	Route::get('/seekers/manage/delete_academics/{resumeid}/{id}','\Modules\Seeker\Http\Controllers\ResumeController@deleteAcademics');
	Route::post('/seekers/manage/save-academics/{resumeid}/{id}', array('as'=>'academics.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveAcademics'));
	

	Route::get('/seekers/manage/update-personal-information/{id}', '\Modules\Seeker\Http\Controllers\ResumeController@updatePersonalInfo');
	Route::post('/seekers/manage/save-personal-information/{id}', array('as'=>'resumeprofile.save','uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@savePersonalInfo'));
	Route::get('/seekers/manage/upload-resume', '\Modules\Seeker\Http\Controllers\ResumeController@uploadresume');
	Route::get('/seekers/create-resume', '\Modules\Seeker\Http\Controllers\ResumeController@create');
	Route::get('/seekers/dashboard', '\Modules\Seeker\Http\Controllers\SeekerController@dashboard');
	Route::get('/seekers/my-resumes', '\Modules\Seeker\Http\Controllers\SeekerController@myresumes');
	Route::post('/seekrs/saveresume', array('as'=>'uploadresume' ,'uses'=>'\Modules\Seeker\Http\Controllers\ResumeController@saveresume'));

	Route::get('/employers/dashboard','\Modules\Employers\Http\Controllers\EmployersController@dashboard');
Route::get('/employers/my-jobs','\App\Http\Controllers\JobsController@myjobs');

	//Employers Departments
	Route::get('/employers/departments','\Modules\Employers\Http\Controllers\DepartmentsController@index');
	Route::get('/employers/departments/all','\Modules\Employers\Http\Controllers\DepartmentsController@allDepartments');
	Route::get('/employers/departments/create','\Modules\Employers\Http\Controllers\DepartmentsController@create');
	Route::post('/employers/departments/create',array('as'=>'department.add','uses'=>'\Modules\Employers\Http\Controllers\DepartmentsController@create'));
	
	Route::get('/employers/departments/edit/{id}','\Modules\Employers\Http\Controllers\DepartmentsController@edit');
	Route::post('/employers/departments/edit/{id}','\Modules\Employers\Http\Controllers\DepartmentsController@edit');
	Route::post('/employers/departments/update/{id}',array('as'=>'departments.update','uses'=>'\Modules\Employers\Http\Controllers\DepartmentsController@update'));
	Route::get('/employers/departments/delete/{id}','\Modules\Employers\Http\Controllers\DepartmentsController@delete');

	//Employers
	Route::get('/employers', '\Modules\Employers\Http\Controllers\EmployersController@index');
	Route::get('/company/{id}', '\Modules\Employers\Http\Controllers\EmployersController@show');
	Route::get('/employers/update_company', '\Modules\Employers\Http\Controllers\CompanyInfoController@updateCompnay');
	Route::get('/employers/logo', '\Modules\Employers\Http\Controllers\CompanyInfoController@logo');
	Route::post('/employers/save', array('as'=>'updatecompany' ,'uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@save'));
	Route::post('/employers/uploadLogo', array('as'=>'upload.logo' ,'uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@uploadLogo'));

	Route::get('/employers/cover', '\Modules\Employers\Http\Controllers\CompanyInfoController@cover');
	Route::post('/employers/uploadCover', array('as'=>'upload.cover' ,'uses'=>'\Modules\Employers\Http\Controllers\CompanyInfoController@uploadCover'));


});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/pk/home', 'HomeController@index');
});
