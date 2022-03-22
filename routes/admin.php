<?php

use App\Http\Controllers\Admin\LoanRequestsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your admin!
|
*/
Route::group([ 'namespace' => 'App\Http\Controllers\Admin' ],function(){

    // login routes
    Route::get('login', 'AuthController@login')->name('admin/login');
    Route::post('login', 'AuthController@check_login')->name('admin/check-login');

    Route::group(['middleware' => 'auth:admin'],function(){

        Route::get('/', 'HomeController@home')->name('admin/index');

        Route::get('/staffs', 'HomeController@getStaffs')->name('admin/get/staffs');
        Route::get('/administrations', 'HomeController@getAdministrations')->name('admin/get/administrations');
        Route::get('/jobs', 'HomeController@getJobs')->name('admin/get/jobs');
        Route::get('/administration/jobs', 'HomeController@getJobsAdministration')->name('admin/get/administration/jobs');
        Route::get('/sections', 'HomeController@getSections')->name('admin/get/sections');
        Route::get('/nationalities', 'HomeController@getNationalities')->name('admin/get/nationalities');

        // admin routes
        Route::get('admins/index', 'AdminController@index')->name('admins/index');
        Route::get('admins/create', 'AdminController@create')->name('admins/create');
        Route::post('admins/store', 'AdminController@store')->name('admins/store');
        Route::get('admins/info/{id}', 'AdminController@info')->name('admins/info');
        Route::post('admins/info-update{id}', 'AdminController@info_update')->name('admins/info-update');
        Route::post('admins/change-password/{id}', 'AdminController@change_password')->name('admins/change-password');
        Route::get('admins/activate/{id}', 'AdminController@activate')->name('admins/activate');
        Route::get('admins/delete/{id}', 'AdminController@delete')->name('admins/delete');
        Route::post('admins/getMore', 'AdminController@getMore')->name('admins/getMore');
        Route::get('admins/export/excel', 'AdminController@exportExcel')->name('admins/export/excel');
        Route::get('admins/export/pdf', 'AdminController@exportPdf')->name('admins/export/pdf');
        Route::post('admins/search', 'AdminController@search')->name('admins/admin/search');

        // user routes
        Route::get('users/index', 'UserController@index')->name('admin/users/index');
        Route::get('users/create', 'UserController@create')->name('admin/users/create');
        Route::post('users/store', 'UserController@store')->name('admin/users/store');
        Route::get('users/activate/{id}', 'UserController@activate')->name('admin/users/activate');
        Route::get('users/delete/{id}', 'UserController@delete')->name('admin/users/delete');
        Route::post('users/getMore', 'UserController@getMore')->name('admin/users/getMore');
        Route::post('users/search', 'UserController@search')->name('admin/users/search');
        Route::get('users/export/pdf', 'UserController@exportPdf')->name('admin/users/export/pdf');
        Route::get('users/export/excel', 'UserController@exportExcel')->name('admin/users/export/excel');

        // staff routes
        Route::get('staffs/index', 'StaffController@index')->name('admin/staffs/index');
        Route::get('staffs/create', 'StaffController@create')->name('admin/staffs/create');
        Route::post('staffs/store', 'StaffController@store')->name('admin/staffs/store');
        Route::get('staffs/edit/{id}', 'StaffController@edit')->name('admin/staffs/edit');
        Route::post('staffs/update/{id}', 'StaffController@update')->name('admin/staffs/update');
        Route::get('staffs/delete/{id}', 'StaffController@delete')->name('admin/staffs/delete');
        Route::get('staffs/print/{id}', 'StaffController@print')->name('admin/staffs/print');
        Route::post('staffs/search', 'StaffController@search')->name('admin/staffs/search');
        Route::get('staffs/export/excel', 'StaffController@exportExcel')->name('admin/staffs/export/excel');
        Route::get('staffs/export/pdf', 'StaffController@exportPDF')->name('admin/staffs/export/pdf');
        Route::post('staffs/getMore', 'StaffController@getMore')->name('admin/staffs/getMore');
        Route::get('staffs/nationality_get', 'StaffController@nationality_get')->name('admin/staffs/nationality_get');

        // employe routes
        Route::get('employees/index', 'EmployeController@index')->name('admin/employees/index');
        Route::get('employees/create', 'EmployeController@create')->name('admin/employees/create');
        Route::post('employees/store', 'EmployeController@store')->name('admin/employees/store');
        Route::get('employees/edit/{id}', 'EmployeController@edit')->name('admin/employees/edit');
        Route::post('employees/update/{id}', 'EmployeController@update')->name('admin/employees/update');
        Route::post('employees/getMore', 'EmployeController@getMore')->name('admin/employees/getMore');
        Route::get('employees/delete/{id}', 'EmployeController@delete')->name('admin/employees/delete');
        Route::post('employees/dependents/deletedependents', 'EmployeController@deletedependents')->name('admin/employees/dependents/deletedependents');
        Route::post('employees/course/deletecourse', 'EmployeController@deletecourse')->name('admin/employees/course/deletecourse');
        Route::post('employees/company_previous/deletecompany_previous', 'EmployeController@deletecompany_previous')->name('admin/employees/company_previous/deletecompany_previous');
        Route::post('employees/company_previous/deletelang', 'EmployeController@deletelang')->name('admin/employees/lang/deletelang');
        Route::get('employees/print/{id}', 'EmployeController@print')->name('admin/employees/print');
        Route::get('employees/export/excel', 'EmployeController@exportExcel')->name('admin/employees/export/excel');
        Route::get('employees/export/pdf', 'EmployeController@exportPDF')->name('admin/employees/export/pdf');


        // staffServiceActions routes
        Route::get('staffServiceActions/index', 'StaffServiceActionsController@index')->name('admin/staffServiceActions/index');
        Route::get('staffServiceActions/create', 'StaffServiceActionsController@create')->name('admin/staffServiceActions/create');
        Route::post('staffServiceActions/store', 'StaffServiceActionsController@store')->name('admin/staffServiceActions/store');
        Route::get('staffServiceActions/edit/{id}', 'StaffServiceActionsController@edit')->name('admin/staffServiceActions/edit');
        Route::post('staffServiceActions/update/{id}', 'StaffServiceActionsController@update')->name('admin/staffServiceActions/update');
        Route::get('staffServiceActions/activate/{id}', 'StaffServiceActionsController@activate')->name('admin/staffServiceActions/activate');
        Route::post('staffServiceActions/getMore', 'StaffServiceActionsController@getMore')->name('admin/staffServiceActions/getMore');
        Route::get('staffServiceActions/delete/{id}', 'StaffServiceActionsController@delete')->name('admin/staffServiceActions/delete');
        Route::get('staffServiceActions/print/{id}', 'StaffServiceActionsController@print')->name('admin/staffServiceActions/print');
        Route::post('staffServiceActions/getMore', 'StaffServiceActionsController@getMore')->name('admin/staffServiceActions/getMore');
        Route::get('staffServiceActions/delete/{id}', 'StaffServiceActionsController@delete')->name('admin/staffServiceActions/delete');
        Route::get('staffServiceActions/export/excel', 'StaffServiceActionsController@exportExcel')->name('admin/staffServiceActions/export/excel');
        Route::get('staffServiceActions/export/pdf', 'StaffServiceActionsController@exportPDF')->name('admin/staffServiceActions/export/pdf');


          // business_trip_and_transfer_requests routes
        Route::get('business_trip_and_transfer_requests/index', 'Business_trip_and_transfer_requestsController@index')->name('admin/business_trip_and_transfer_requests/index');
        Route::get('business_trip_and_transfer_requests/create', 'Business_trip_and_transfer_requestsController@create')->name('admin/business_trip_and_transfer_requests/create');
        Route::post('business_trip_and_transfer_requests/store', 'Business_trip_and_transfer_requestsController@store')->name('admin/business_trip_and_transfer_requests/store');
        Route::get('business_trip_and_transfer_requests/edit/{id}', 'Business_trip_and_transfer_requestsController@edit')->name('admin/business_trip_and_transfer_requests/edit');
        Route::post('business_trip_and_transfer_requests/update/{id}', 'Business_trip_and_transfer_requestsController@update')->name('admin/business_trip_and_transfer_requests/update');
        Route::post('business_trip_and_transfer_requests/getMore', 'Business_trip_and_transfer_requestsController@getMore')->name('admin/business_trip_and_transfer_requests/getMore');
        Route::get('business_trip_and_transfer_requests/delete/{id}', 'Business_trip_and_transfer_requestsController@delete')->name('admin/business_trip_and_transfer_requests/delete');
        Route::post('business_trip_and_transfer_requests/residence/deleteresidence', 'Business_trip_and_transfer_requestsController@deleteresidence')->name('admin/business_trip_and_transfer_requests/residence/deleteresidence');
        Route::post('business_trip_and_transfer_requests/expenses/deleteexpenses', 'Business_trip_and_transfer_requestsController@deleteexpenses')->name('admin/business_trip_and_transfer_requests/expenses/deleteexpenses');
        Route::post('business_trip_and_transfer_requests/manager/deletemanager', 'Business_trip_and_transfer_requestsController@deletemanager')->name('admin/business_trip_and_transfer_requests/manager/deletemanager');
        Route::get('business_trip_and_transfer_requests/print/{id}', 'Business_trip_and_transfer_requestsController@print')->name('admin/business_trip_and_transfer_requests/print');
        Route::get('business_trip_and_transfer_requests/export/excel', 'Business_trip_and_transfer_requestsController@exportExcel')->name('admin/business_trip_and_transfer_requests/export/excel');
        Route::get('business_trip_and_transfer_requests/export/pdf', 'Business_trip_and_transfer_requestsController@exportPDF')->name('admin/business_trip_and_transfer_requests/export/pdf');


        // job_description routes
        Route::get('job_description/index', 'Job_descriptionController@index')->name('admin/job_description/index');

        Route::get('job_description/create', 'Job_descriptionController@create')->name('admin/job_description/create');
        Route::post('job_description/store', 'Job_descriptionController@store')->name('admin/job_description/store');
        Route::get('job_description/edit/{id}', 'Job_descriptionController@edit')->name('admin/job_description/edit');
        Route::post('job_description/update/{id}', 'Job_descriptionController@update')->name('admin/job_description/update');
        Route::post('job_description/getMore', 'Job_descriptionController@getMore')->name('admin/job_description/getMore');
        Route::get('job_description/delete/{id}', 'Job_descriptionController@delete')->name('admin/job_description/delete');
        Route::get('job_description/print/{id}', 'Job_descriptionController@print')->name('admin/job_description/print');
        Route::get('job_description/export/excel', 'Job_descriptionController@exportExcel')->name('admin/job_description/export/excel');
        Route::get('job_description/export/pdf', 'Job_descriptionController@exportPDF')->name('admin/job_description/export/pdf');

        // notice_absence_employee routes
        Route::get('notice_absence_employee/index', 'Notice_absence_employeeController@index')->name('admin/notice_absence_employee/index');
        Route::get('notice_absence_employee/create', 'Notice_absence_employeeController@create')->name('admin/notice_absence_employee/create');
        Route::post('notice_absence_employee/store', 'Notice_absence_employeeController@store')->name('admin/notice_absence_employee/store');
        Route::get('notice_absence_employee/edit/{id}', 'Notice_absence_employeeController@edit')->name('admin/notice_absence_employee/edit');
        Route::post('notice_absence_employee/update/{id}', 'Notice_absence_employeeController@update')->name('admin/notice_absence_employee/update');
        Route::post('notice_absence_employee/getMore', 'Notice_absence_employeeController@getMore')->name('admin/notice_absence_employee/getMore');
        Route::get('notice_absence_employee/delete/{id}', 'Notice_absence_employeeController@delete')->name('admin/notice_absence_employee/delete');
        Route::get('notice_absence_employee/export/excel', 'Notice_absence_employeeController@exportExcel')->name('admin/notice_absence_employee/export/excel');
       Route::get('notice_absence_employee/print/{id}', 'Notice_absence_employeeController@print')->name('admin/notice_absence_employee/print');
       Route::get('notice_absence_employee/export/pdf', 'Notice_absence_employeeController@exportPDF')->name('admin/notice_absence_employee/exportPDF');
                // work_certific routes



        Route::get('work_certific/index', 'Work_certificController@index')->name('admin/work_certific/index');
        Route::get('work_certific/create', 'Work_certificController@create')->name('admin/work_certific/create');
        Route::post('work_certific/store', 'Work_certificController@store')->name('admin/work_certific/store');
        Route::get('work_certific/edit/{id}', 'Work_certificController@edit')->name('admin/work_certific/edit');
        Route::post('work_certific/update/{id}', 'Work_certificController@update')->name('admin/work_certific/update');
       Route::get('work_certific/export/pdf', 'Work_certificController@exportPdf')->name('admin/work_certific/pdf');
        Route::post('work_certific/getMore', 'Work_certificController@getMore')->name('admin/work_certific/getMore');
        Route::get('work_certific/delete/{id}', 'Work_certificController@delete')->name('admin/work_certific/delete');
       Route::get('work_certific/print/{id}', 'Work_certificController@print')->name('admin/work_certific/print');
        Route::get('work_certific/export/excel', 'Work_certificController@exportExcel')->name('admin/work_certific/export/excel');


        // evaluate personal interview routes
        Route::get('evaluatePersonalInterviews/index', 'EvaluatePersonalInterviewController@index')->name('admin/evaluatePersonalInterviews/index');
        Route::get('evaluatePersonalInterviews/create', 'EvaluatePersonalInterviewController@create')->name('admin/evaluatePersonalInterviews/create');
        Route::post('evaluatePersonalInterviews/store', 'EvaluatePersonalInterviewController@store')->name('admin/evaluatePersonalInterviews/store');
        Route::get('evaluatePersonalInterviews/edit/{id}', 'EvaluatePersonalInterviewController@edit')->name('admin/evaluatePersonalInterviews/edit');
        Route::post('evaluatePersonalInterviews/update/{id}', 'EvaluatePersonalInterviewController@update')->name('admin/evaluatePersonalInterviews/update');
        Route::get('evaluatePersonalInterviews/delete/{id}', 'EvaluatePersonalInterviewController@delete')->name('admin/evaluatePersonalInterviews/delete');
        Route::get('evaluatePersonalInterviews/print/{id}', 'EvaluatePersonalInterviewController@print')->name('admin/evaluatePersonalInterviews/print');
        Route::get('evaluatePersonalInterviews/export/excel', 'EvaluatePersonalInterviewController@exportExcel')->name('admin/evaluatePersonalInterviews/export/excel');
        Route::get('evaluatePersonalInterviews/export/pdf', 'EvaluatePersonalInterviewController@exportPDF')->name('admin/evaluatePersonalInterviews/export/pdf');
        Route::post('evaluatePersonalInterviews/getMore', 'EvaluatePersonalInterviewController@getMore')->name('admin/evaluatePersonalInterviews/getMore');


        // follow cars routes
        Route::get('followCars/index', 'FollowCarsController@index')->name('admin/followCars/index');
        Route::get('followCars/create', 'FollowCarsController@create')->name('admin/followCars/create');
        Route::post('followCars/store', 'FollowCarsController@store')->name('admin/followCars/store');
        Route::post('followCars/update/{id}', 'FollowCarsController@update')->name('admin/followCars/update');
        Route::get('followCars/delete/{id}', 'FollowCarsController@delete')->name('admin/followCars/delete');
        Route::get('followCars/print/{id}', 'FollowCarsController@print')->name('admin/followCars/print');
        Route::get('followCars/export/excel', 'FollowCarsController@exportExcel')->name('admin/followCars/export/excel');
        Route::get('followCars/pdf', 'FollowCarsController@pdf')->name('admin/followCars/pdf');
        Route::get('followCars/export/pdf', 'FollowCarsController@exportPDF')->name('admin/followCars/export/pdf');
        Route::post('followCars/getMore', 'FollowCarsController@getMore')->name('admin/followCars/getMore');

        // administration routs
        Route::get('administration/index','AdministrationController@index')->name('admin/administration/index');
        Route::post('administration/store','AdministrationController@store')->name('admin/administration/store');
        Route::get('administration/activate/{id}','AdministrationController@activate')->name('admin/administration/activate');
        Route::get('administration/delete/{id}','AdministrationController@delete')->name('admin/administration/delete');
        Route::post('administration/update/{id}','AdministrationController@update')->name('admin/administration/update');
        Route::get('administration/create','AdministrationController@create')->name('admin/administration/create');
        Route::post('administration/getMore','AdministrationController@getMore')->name('admin/administration/getMore');
        Route::post('administration/search','AdministrationController@search')->name('admin/administration/search');
        Route::get('administration/export/excel', 'AdministrationController@exportExcel')->name('admin/administration/export/excel');
        Route::get('administration/export/pdf', 'AdministrationController@exportPDF')->name('admin/administration/export/pdf');

        // nationality route
        Route::get('nationality/index','NationalityController@index')->name('admin/nationality/index');
        Route::post('nationality/store','NationalityController@store')->name('admin/nationality/store');
        Route::get('nationality/activate/{id}','NationalityController@activate')->name('admin/nationality/activate');
        Route::get('nationality/delete/{id}','NationalityController@delete')->name('admin/nationality/delete');
        Route::post('nationality/update/{id}','NationalityController@update')->name('admin/nationality/update');
        Route::get('nationality/create','NationalityController@create')->name('admin/nationality/create');
        Route::post('nationality/getMore','NationalityController@getMore')->name('admin/nationality/getMore');
        Route::post('nationalities/search','NationalityController@search')->name('admin/nationalities/search');
        Route::get('nationalities/export/excel', 'NationalityController@exportExcel')->name('admin/nationalities/export/excel');
        Route::get('nationalities/export/pdf', 'NationalityController@exportPDF')->name('admin/nationalities/export/pdf');

        // job route
        Route::get('job/index','JobController@index')->name('admin/job/index');
        Route::post('job/store','JobController@store')->name('admin/job/store');
        Route::get('jobs/edit/{id}','JobController@edit')->name('admin/jobs/edit');
        Route::get('job/activate/{id}','JobController@activate')->name('admin/job/activate');
        Route::post('job/update/{id}','JobController@update')->name('admin/job/update');
        Route::get('job/delete/{id}','JobController@delete')->name('admin/job/delete');
        Route::get('job/create','JobController@create')->name('admin/job/create');
        Route::post('job/getMore','JobController@getMore')->name('admin/job/getMore');
        Route::post('jobs/search','JobController@search')->name('admin/jobs/search');
        Route::get('jobs/export/excel', 'JobController@exportExcel')->name('admin/jobs/export/excel');
        Route::get('jobs/export/pdf', 'JobController@exportPDF')->name('admin/jobs/export/pdf');

        // job offer specification route
        Route::get('jobOfferSpecification/index','jobOfferSpecificationController@index')->name('admin/jobOfferSpecification/index');
        Route::get('jobOfferSpecification/create','jobOfferSpecificationController@create')->name('admin/jobOfferSpecification/create');
        Route::post('jobOfferSpecification/store','jobOfferSpecificationController@store')->name('admin/jobOfferSpecification/store');
        Route::get('jobOfferSpecification/activate/{id}','jobOfferSpecificationController@activate')->name('admin/jobOfferSpecification/activate');
        Route::get('jobOfferSpecification/edit/{id}','jobOfferSpecificationController@edit')->name('admin/jobOfferSpecification/edit');
        Route::post('jobOfferSpecification/update/{id}','jobOfferSpecificationController@update')->name('admin/jobOfferSpecification/update');
        Route::get('jobOfferSpecification/delete/{id}','jobOfferSpecificationController@delete')->name('admin/jobOfferSpecification/delete');
        Route::post('jobOfferSpecification/getMore','jobOfferSpecificationController@getMore')->name('admin/jobOfferSpecification/getMore');
        Route::get('jobOfferSpecification/export/excel', 'jobOfferSpecificationController@exportExcel')->name('admin/jobOfferSpecification/excel');
        Route::get('jobOfferSpecification/export/pdf', 'jobOfferSpecificationController@exportPDF')->name('admin/jobOfferSpecification/export/pdf');
        Route::get('jobOfferSpecification/administrations_get', 'jobOfferSpecificationController@administrations_get')->name('admin/jobOfferSpecification/administrations_get');
        Route::get('jobOfferSpecification/nationality_get', 'jobOfferSpecificationController@nationality_get')->name('admin/jobOfferSpecification/nationality_get');
        Route::get('jobOfferSpecification/job_get', 'jobOfferSpecificationController@job_get')->name('admin/jobOfferSpecification/job_get');
        Route::get('jobOfferSpecification/print/{id}', 'jobOfferSpecificationController@print')->name('admin/jobOfferSpecification/print');

        // vacation routes
        Route::get('vacations/index', 'VocationRequestController@index')->name('admin/vacations/index');
        Route::get('vacations/create', 'VocationRequestController@create')->name('admin/vacations/create');
        Route::post('vacations/store', 'VocationRequestController@store')->name('admin/vacations/store');
        Route::get('vacations/edit/{id}', 'VocationRequestController@edit')->name('admin/vacations/edit');
        Route::post('vacations/update/{id}', 'VocationRequestController@update')->name('admin/vacations/update');
        Route::get('vacations/delete/{id}', 'VocationRequestController@delete')->name('admin/vacations/delete');
        Route::get('vacations/print/{id}', 'VocationRequestController@print')->name('admin/vacations/print');
        Route::get('vacations/export/excel', 'VocationRequestController@exportExcel')->name('admin/vacations/export/excel');
        Route::get('vacations/export/pdf', 'VocationRequestController@exportPDF')->name('admin/vacations/export/pdf');
        Route::post('vacations/getMore', 'VocationRequestController@getMore')->name('admin/vacations/getMore');

        // penalty routes
        Route::get('penaltys/index', 'PenaltyController@index')->name('admin/penaltys/index');
        Route::get('penaltys/create', 'PenaltyController@create')->name('admin/penaltys/create');
        Route::post('penaltys/store', 'PenaltyController@store')->name('admin/penaltys/store');
        Route::get('penaltys/edit/{id}', 'PenaltyController@edit')->name('admin/penaltys/edit');
        Route::post('penaltys/update/{id}', 'PenaltyController@update')->name('admin/penaltys/update');
        Route::get('penaltys/delete/{id}', 'PenaltyController@delete')->name('admin/penaltys/delete');
        Route::get('penaltys/print/{id}', 'PenaltyController@print')->name('admin/penaltys/print');
        Route::get('penaltys/export/excel', 'PenaltyController@exportExcel')->name('admin/penaltys/export/excel');
        Route::get('penaltys/export/pdf', 'PenaltyController@exportPDF')->name('admin/penaltys/export/pdf');
        Route::post('penaltys/getMore', 'PenaltyController@getMore')->name('admin/penaltys/getMore');

        // job_mission routes
        Route::get('missions/index', 'JobMissionRequestController@index')->name('admin/missions/index');
        Route::get('missions/create', 'JobMissionRequestController@create')->name('admin/missions/create');
        Route::post('missions/store', 'JobMissionRequestController@store')->name('admin/missions/store');
        Route::get('missions/edit/{id}', 'JobMissionRequestController@edit')->name('admin/missions/edit');
        Route::post('missions/update/{id}', 'JobMissionRequestController@update')->name('admin/missions/update');
        Route::get('missions/delete/{id}', 'JobMissionRequestController@delete')->name('admin/missions/delete');
        Route::get('missions/print/{id}', 'JobMissionRequestController@print')->name('admin/missions/print');
        Route::get('missions/export/excel', 'JobMissionRequestController@exportExcel')->name('admin/missions/export/excel');
        Route::get('missions/export/pdf', 'JobMissionRequestController@exportPDF')->name('admin/missions/export/pdf');
        Route::post('missions/getMore', 'JobMissionRequestController@getMore')->name('admin/missions/getMore');

        // end mission routes
        Route::get('MissionsAccomplishment/index', 'MissionsAccomplishmentController@index')->name('admin/MissionsAccomplishment/index');
        Route::get('MissionsAccomplishment/create', 'MissionsAccomplishmentController@create')->name('admin/MissionsAccomplishment/create');
        Route::post('MissionsAccomplishment/store', 'MissionsAccomplishmentController@store')->name('admin/MissionsAccomplishment/store');
        Route::get('MissionsAccomplishment/edit/{id}', 'MissionsAccomplishmentController@edit')->name('admin/MissionsAccomplishment/edit');
        Route::post('MissionsAccomplishment/update/{id}', 'MissionsAccomplishmentController@update')->name('admin/MissionsAccomplishment/update');
        Route::get('MissionsAccomplishment/delete/{id}', 'MissionsAccomplishmentController@delete')->name('admin/MissionsAccomplishment/delete');
        Route::get('MissionsAccomplishment/print/{id}', 'MissionsAccomplishmentController@print')->name('admin/MissionsAccomplishment/print');
        Route::get('MissionsAccomplishment/export/excel', 'MissionsAccomplishmentController@exportExcel')->name('admin/MissionsAccomplishment/export/excel');
        Route::get('MissionsAccomplishment/export/pdf', 'MissionsAccomplishmentController@exportPDF')->name('admin/MissionsAccomplishment/export/pdf');
        Route::post('MissionsAccomplishment/getMore', 'MissionsAccomplishmentController@getMore')->name('admin/MissionsAccomplishment/getMore');

        // back_to_work routes
        Route::get('backs/index', 'BackToWorkController@index')->name('admin/backs/index');
        Route::get('backs/create', 'BackToWorkController@create')->name('admin/backs/create');
        Route::post('backs/store', 'BackToWorkController@store')->name('admin/backs/store');
        Route::get('backs/edit/{id}', 'BackToWorkController@edit')->name('admin/backs/edit');
        Route::post('backs/update/{id}', 'BackToWorkController@update')->name('admin/backs/update');
        Route::get('backs/delete/{id}', 'BackToWorkController@delete')->name('admin/backs/delete');
        Route::get('backs/print/{id}', 'BackToWorkController@print')->name('admin/backs/print');
        Route::get('backs/export/excel', 'BackToWorkController@exportExcel')->name('admin/backs/export/excel');
        Route::post('backs/getMore', 'BackToWorkController@getMore')->name('admin/backs/getMore');

        // effective notice routes
        Route::get('effectiveNotice/index', 'EffectivesDateNoticeController@index')->name('admin/effectiveNotice/index');
        Route::get('effectiveNotice/create', 'EffectivesDateNoticeController@create')->name('admin/effectiveNotice/create');
        Route::post('effectiveNotice/store', 'EffectivesDateNoticeController@store')->name('admin/effectiveNotice/store');
        Route::get('effectiveNotice/edit/{id}', 'EffectivesDateNoticeController@edit')->name('admin/effectiveNotice/edit');
        Route::post('effectiveNotice/update/{id}', 'EffectivesDateNoticeController@update')->name('admin/effectiveNotice/update');
        Route::get('effectiveNotice/delete/{id}', 'EffectivesDateNoticeController@delete')->name('admin/effectiveNotice/delete');
        Route::get('effectiveNotice/print/{id}', 'EffectivesDateNoticeController@print')->name('admin/effectiveNotice/print');
        Route::get('effectiveNotice/export/excel', 'EffectivesDateNoticeController@exportExcel')->name('admin/effectiveNotice/export/excel');
        Route::post('effectiveNotice/getMore', 'EffectivesDateNoticeController@getMore')->name('admin/effectiveNotice/getMore');

        // loan requests routes
        Route::get('loanrequests/index','LoanRequestsController@index')->name('admin/loanRequests/index');
        Route::post('loanrequests/store','LoanRequestsController@store')->name('admin/loanRequests/store');
        Route::get('loanrequests/activate/{id}','LoanRequestsController@activate')->name('admin/loanRequests/activate');
        Route::get('loanrequests/delete/{id}','LoanRequestsController@delete')->name('admin/loanRequests/delete');
        Route::post('loanrequests/update/{id}','LoanRequestsController@update')->name('admin/loanRequests/update');
        Route::get('loanrequests/print/{id}','LoanRequestsController@print')->name('admin/loanRequests/print');
        Route::get('loanrequests/edit/{id}', 'LoanRequestsController@edit')->name('admin/loanrequests/edit');
        Route::post('loanrequests/getMore', 'LoanRequestsController@getMore')->name('admin/loanrequests/getMore');
        Route::get('loanrequests/excel', 'LoanRequestsController@exportExcel')->name('admin/loanrequests/excel');
        Route::get('loanrequests/pdf', 'LoanRequestsController@exportPdf')->name('admin/loanrequests/pdf');
        Route::get('loanrequests/create', 'LoanRequestsController@create')->name('admin/loanrequests/create');

        //  under the scabies routes
        Route::get('UnderTheScabies/index','UnderTheScabiesController@index')->name('admin/UnderTheScabies/index');
        Route::get('UnderTheScabies/create','UnderTheScabiesController@create')->name('admin/UnderTheScabies/create');
        Route::get('UnderTheScabies/export/pdf','UnderTheScabiesController@exportPDF')->name('admin/UnderTheScabies/pdf');
        Route::get('UnderTheScabies/activate/{id}','UnderTheScabiesController@activate')->name('admin/UnderTheScabies/activate');
        Route::get('UnderTheScabies/delete/{id}','UnderTheScabiesController@delete')->name('admin/UnderTheScabies/delete');
        Route::get('UnderTheScabies/edit/{id}','UnderTheScabiesController@edit')->name('admin/UnderTheScabies/edit');
        Route::get('UnderTheScabies/print/{id}','UnderTheScabiesController@print')->name('admin/UnderTheScabies/print');
        Route::get('UnderTheScabies/test','UnderTheScabiesController@test')->name('admin/UnderTheScabies/test');
        Route::get('UnderTheScabies/excel','UnderTheScabiesController@exportExcel')->name('admin/UnderTheScabies/excel');
        Route::POST('UnderTheScabies/store','UnderTheScabiesController@store')->name('admin/UnderTheScabies/store');
        Route::POST('UnderTheScabies/getMore','UnderTheScabiesController@getMore')->name('admin/UnderTheScabies/getMore');
        Route::post('UnderTheScabies/update{id}','UnderTheScabiesController@update')->name('admin/UnderTheScabies/update');

        // sections routes
        Route::get('sections/index','SectionController@index')->name('admin/sections/index');
        Route::get('sections/activate/{id}','SectionController@activate')->name('admin/sections/activate');
        Route::get('sections/delete/{id}','SectionController@delete')->name('admin/sections/delete');
        Route::get('sections/create','SectionController@create')->name('admin/sections/create');
        Route::post('sections/store','SectionController@store')->name('admin/sections/store');
        Route::post('sections/update{id}','SectionController@update')->name('admin/sections/update');
        Route::post('sections/getMore','SectionController@getMore')->name('admin/sections/getMore');
        Route::post('sections/search','SectionController@search')->name('admin/sections/search');
        Route::get('sections/export/excel', 'SectionController@exportExcel')->name('admin/sections/export/excel');
        Route::get('sections/export/pdf', 'SectionController@exportPDF')->name('admin/sections/export/pdf');

        // performance standards template employee routes
        Route::get('PerformanceStandardsTemplateEmployee/index','PerformanceStandardsTemplateEmployeeController@index')->name('admin/performance/index');
        Route::get('PerformanceStandardsTemplateEmployee/create','PerformanceStandardsTemplateEmployeeController@create')->name('admin/performance/create');
        Route::get('PerformanceStandardsTemplateEmployee/export/Excel','PerformanceStandardsTemplateEmployeeController@exportExcel')->name('admin/performance/export/Excel');

        Route::get('PerformanceStandardsTemplateEmployee/delete/{id}','PerformanceStandardsTemplateEmployeeController@delete')->name('admin/performance/delete');
        Route::get('PerformanceStandardsTemplateEmployee/edit/{id}','PerformanceStandardsTemplateEmployeeController@edit')->name('admin/performance/edit');
        Route::get('PerformanceStandardsTemplateEmployee/activate/{id}','PerformanceStandardsTemplateEmployeeController@activate')->name('admin/performance/activate');
        Route::get('PerformanceStandardsTemplateEmployee/print/{id}','PerformanceStandardsTemplateEmployeeController@print')->name('admin/performance/print');
        Route::get('PerformanceStandardsTemplateEmployee/export/Pdf','PerformanceStandardsTemplateEmployeeController@exportPdf')->name('admin/performance/Pdf');
        Route::post('PerformanceStandardsTemplateEmployee/store','PerformanceStandardsTemplateEmployeeController@store')->name('admin/performance/store');
        Route::post('PerformanceStandardsTemplateEmployee/update/{id}','PerformanceStandardsTemplateEmployeeController@update')->name('admin/performance/update');
        Route::post('PerformanceStandardsTemplateEmployee/getMore','PerformanceStandardsTemplateEmployeeController@getMore')->name('admin/performance/getMore');





        Route::get('logout', 'AuthController@logout')->name('admin/logout');
    });
});
