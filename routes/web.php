<?php

use App\Models\Blog;
use App\Http\Controllers\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\myJOBController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employer\EmployerSectionController;
use App\Http\Controllers\User\EmployerController;
use App\Http\Controllers\User\JobSectionController;
use App\Http\Controllers\User\UserSearchController;
use App\Http\Controllers\Employer\JobManagemetController;

Route::middleware(['auth:sanctum',   config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::check()) {
            if (Auth::user()->role == 'employer') {
                return redirect()->route('employer#info');
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('user#info');
            } elseif (Auth::user()->role == 'admin') {
                return redirect()->route('admin#profile');
            }
        }
    })->name('/dashboard');
});

//Auth
Route::redirect('/', 'loginPage');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('admin#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
//ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {
    Route::get('home', [AdminController::class, 'index'])->name('admin#profile');
    //change Password
    Route::get('pswChangePage/', [AdminController::class, 'pswChangePage'])->name('admin#pswChangePage');
    Route::post('changePassword', [AdminController::class, 'changePassword'])->name('admin#changePassword');
    //update
    Route::get('updatProfilePage/{id}', [AdminController::class, 'updatePage'])->name('admin#profileUpdatePage');
    Route::post('update/profile/', [AdminController::class, 'update'])->name(('admin#update'));
    //employee list
    Route::get('employerList', [AdminController::class, 'employerList'])->name('admin#employerList');

    //user list
    Route::get('userList', [AdminController::class, 'userList'])->name('admin#userList');
    //blog
    // Route::get('blog', [AdminController::class, 'blogPage'])->name('admin#blogPage');
    // Route::post('blog/post', [AdminController::class, 'blogPost'])->name('admin#postBlog');
    //joblist
    Route::get('joblist/', [AdminController::class, 'jobListPage'])->name('admin#jobListPage');

    //employerjoblist
    Route::get('employer/job/list/{id}', [AdminController::class, 'employerJobList'])->name('admin#empoyerJoblist');
    Route::get('employer/job/delete/{id}', [AdminController::class, 'deleteEmployerJob'])->name('admin#deletempJob');
    //account delete
    Route::get('account/delete/{id}', [AdminController::class, 'deleteAccount'])->name('admin#deleteAccount');
});

//UNMIDDLEWARE ROUTES TO GET USER INFORMATION
Route::group(['prefix' => 'unmid'], function () {
    //about me
    Route::get('employer/aboutme/{id}', [EmployerSectionController::class, 'aboutme'])->name('employer#aboutme');
    //about me
    Route::get('user/aboutme/{id}', [UserController::class, 'aboutme'])->name('user#aboutme');
});
//UNMIDDLEWARE END
Route::group(['prefix' => 'employer/', 'middleware' => 'employer_auth'], function () {
    //EMPLOYER SECTION
    Route::prefix('section')->group(function () {
        //employerhome
        Route::get('home', [EmployerSectionController::class, 'employerHome'])->name('employer#home');
        //change psw
        Route::get('changPswPage', [EmployerSectionController::class, 'changPswPage'])->name('employer#changePswPage');
        Route::post('changePassword', [EmployerSectionController::class, 'changePassword'])->name('employer#changePassword');
        //updateProfile
        Route::get('profile/', [EmployerSectionController::class, 'employerProfile'])->name('employer#profile');
        Route::post('profileupdate/', [EmployerSectionController::class, 'profileUpdate'])->name('employer#updateProfile');
    });
    //END EMPLOYER SECTION
    //JOB MANAGMENT
    Route::prefix('job')->group(function () {
        //my joblist
        Route::get('lists', [JobManagemetController::class, 'jobList'])->name('employer#jobList');
        //other joblist
        Route::get('other/lists', [JobManagemetController::class, 'otherJoblist'])->name('employer#otherJoblist');
        // jobn info
        Route::get('jobinfo/{id}', [JobManagemetController::class, 'info'])->name('employer#jobinfo');
        //jobalertslist
        Route::get('jobalerts', [JobManagemetController::class, 'employerJob'])->name('employer#jalerts');
        //Job create
        Route::get('postJob', [JobManagemetController::class, 'createPost'])->name('employer#create');
        Route::post('createJob', [JobManagemetController::class, 'createJob'])->name('employer#createJob');
        Route::get('employeeDetail/{id}', [JobManagemetController::class, 'employeeDetail'])->name('employer#employeeDetail');
        //edit or update
        Route::get('edit/{id}', [JobManagemetController::class, 'edit'])->name('employer#edit');
        Route::post('update/{id}', [JobManagemetController::class, 'updateJob'])->name('employer#update');
        //DELETE
        Route::get('delete/{id}', [JobManagemetController::class, 'deleteJob'])->name('employer#delete');

        //job view
        Route::get('job/details/{id}', [JobManagemetController::class, 'jobdetailsPage'])->name('employer#jobdetailPage');
        //job accept/decline
        Route::post('/response/{id}', [JobManagemetController::class, 'jobRespond'])->name('employer#jobRespond');
        Route::get('/respone/detail/{id}', [JobManagemetController::class, 'jrespondDetail'])->name('employer#jrespondPage');

        //info-
        Route::get('employer/info/', [JobManagemetController::class, 'employerInfo'])->name('employer#info');


        //SEARCH JOB and filtered
        Route::post('search', [JobManagemetController::class, 'search'])->name('employer#search');
        Route::post('jobsearch', [JobManagemetController::class, 'jobalertSearch'])->name('employer#jobalsearch');
        // END JOB MANAGMENT
    });

    //articles
    // Route::get('articles', [Employer::class, 'articles'])->name('employer#aritcles');
    // Route::get('articles/more', [Employer::class, 'read'])->name('employer#read');

});

//User
Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
    //userhome
    Route::get('home', [UserController::class, 'userHome'])->name('user#home');

    //articles
    // Route::get('articles', [UserController::class, 'articles'])->name('user#aritcles');
    // Route::get('articles/more', [UserController::class, 'read'])->name('user#read');

    //USER ACCOUNT SECTION
    Route::prefix('section')->group(function () {
        //info
        Route::get('userInfo', [UserController::class, 'userInfo'])->name('user#info');
        //userinfo
        Route::get('profile/{id}', [UserController::class, 'profile'])->name('user#profile');
        Route::post('profile/update/{id}', [UserController::class, 'updateProfile'])->name('user#updateProfile');
        //psw change
        Route::get('passwordChangePage/', [UserController::class, 'pswChangePage'])->name('user#pswChangePage');
        Route::post('pswChange/', [Usercontroller::class, 'pswChange'])->name('user#pswChange');
        //job alerts message
        Route::get('alertMessagePage/', [UserController::class, 'alertMessagePage'])->name('user#alertMessagePage');
    });
    //END USER ACCOUNT SECTION
    //JOB SECTION
    Route::prefix('job')->group(function () {
        //user
        Route::get('jobalerts', [JobSectionController::class, 'userJob'])->name('user#jobalerts');

        //employer list
        Route::get('employerlist', [JobSectionController::class, 'employerList'])->name('user#employerList');
        //jobinfo
        Route::get('job/info/{id}', [JobSectionController::class, 'jobinfo'])->name('user#jobInfoPage');
        //employersearch
        Route::post('/company/search', [JobSectionController::class, 'employerSearch'])->name('user#employerSearch');
        //job search
        Route::post('job/search/', [JobSectionController::class, 'jobsearch'])->name('user#jobsearch');
        Route::get('apply/{id}', [JobSectionController::class, 'applyPage'])->name('user#applyPage');
        //apply
        Route::post('applyConfirm/', [JobSectionController::class, 'applyData'])->name('user#applyData');
        //view company
        Route::get('view/', [JobSectionController::class, 'viewCompanyPage'])->name('user#viewCompanyPage');
    });
    //END JOB SECTION
    //SEARCH CATEGORY
    Route::prefix('searchbycategory')->group(function () {
        Route::get('filter/{type}', [UserSearchController::class, 'filterJob'])->name('user#filterJobs');
        Route::get('filter/job/{type}', [UserSearchController::class, 'filterJobType'])->name('user#filterJobType');
    });
});
