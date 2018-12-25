<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\ApplicantProfile;
use App\Conversation;
use App\Job;
use App\Message;
use App\Role;
use App\User;
use App\UserType;
use Illuminate\Http\Request;


Route::group(['middleware'=>['msg_middleware_gaurd']], function(){
    Route::post('messageinsert','MessageController@insert')->name('sendmessage');
    Route::post('usertyping','MessageController@typing')->name('usertyping');
    Route::post('usernottyping','MessageController@nottyping')->name('usernottyping');
    Route::post('readuserstatus','MessageController@readuserstatus')->name('readuserstauts');
    Route::get('applicant/message/{id}','MessageController@messagebox')->name('showmessagebox');
    Route::post('readusermessage','MessageController@readusermessage')->name('readusermessage');
    Route::post('readunseenmessage','MessageController@readunseenmessage')->name('readunseenmessage');
    Route::get('inbox/{id}','MessageController@inbox')->name('inbox');

});




Route::get('applicant/searchjobform','ApplicantController@viewsearchform')->name('viewsearchform');
Route::get('applicant/searchjobs','ApplicantController@searchjobs')->name('searchjobs');
Route::get('viewjob/{id}',"MainResponsibleController@viewjob")->name('viewjob');

Route::get('/', "MainResponsibleController@home")->name('home');
Route::POST('/signUp','UserRegistration@signup')->name('signUp');
Route::post('/login','UserRegistration@login')->name('login');



Route::get('Admin/signup',"AdminController@register")->name('registration');
Route::post('Admin/store',"AdminController@store")->name('adminSignup');
Route::post('Admin/login',"AdminController@login")->name('adminLogin');

Route::POST('Applicant/ApplyJob/','MainResponsibleController@gotoApplicantApplyRouteAfterApplyClick')->name('applyjob');

Route::get('check_user_role',function(){
})->name('check_user_role')->middleware('redirect');

Route::group(['middleware'=>['applicant']],function() {

    /* -----------------------------APPLICANT SECTION STARTED----------------------------------*/


    Route::GET('Applicant/showprofile','ApplicantController@viewprofile')->name('viewApplicantProfile')->middleware('applicatn_profile_check');
    Route::POST('Applicant/editprofile','ApplicantController@editprofile')->name('editApplicantProfile')->middleware('applicatn_profile_check');;
    Route::POST('Applicant/updateprofile/{id}', 'ApplicantController@updateprofile')->name('updateApplicantProfile')->middleware('applicatn_profile_check');;
    Route::GET('Applicant/profile', 'ApplicantController@profile')->name('applicantProfile');
    Route::POST('Applicant/saveprofile', 'ApplicantController@storeProfile')->name('saveApplicantProfile');
    Route::GET('Applicant/Apply','ApplicantController@applyjob')->name('app')->middleware('applicatn_profile_check');;
    Route::GET('Applicant/viewapplyjobs','ApplicantController@viewapplyjobs')->name('viewapplyjobs')->middleware('applicatn_profile_check');;
    Route::POST('Applicant/Unapply','ApplicantController@unapplyjob')->name('unapp')->middleware('applicatn_profile_check');;
    Route::resource('ApplicantEducation','ApplicantEducationManageController')->middleware('applicatn_profile_check');;
    Route::resource('ApplicantExperience','ApplicantExperienceManageController')->middleware('applicatn_profile_check');;
    Route::resource('ApplicantSkill','ApplicantSkillSetManageController')->middleware('applicatn_profile_check');;
    /* -----------------------------APPLICANT SECTION ENDED----------------------------------*/


});









Route::group(['middleware'=>['employer']],function() {

    /* -----------------------------EMPLOYER SECTION STARTED----------------------------------*/

    Route::GET('Employer/profile', 'EmployerController@profile')->name('employerProfile');
    Route::POST('Employer/saveprofile', 'EmployerController@storeProfile')->name('saveEmployerProfile');
    Route::GET('Employer/editprofile', 'EmployerController@editprofile')->name('editEmployerProfile')->middleware('emp_profile_check');
    Route::POST('Employer/updateprofile', 'EmployerController@updateprofile')->name('updateEmployerProfile')->middleware('emp_profile_check');
    Route::GET('Employer/showprofile','EmployerController@viewprofile')->name('viewEmployerProfile')->middleware('emp_profile_check');

    Route::get('Employer/ViewApplyApplicants','EmployerController@ViewApplyApplicants')->name('viewapplyapplicants')->middleware('emp_profile_check');

    Route::get('Employer/viewspecifiedapplicant/{id}','EmployerController@viewspecifiedapplicant')->name('vsa')->middleware('emp_profile_check');


    Route::resource('EmployerJob','EmployerJobManageController')->middleware('emp_profile_check');
    Route::resource('EmployerCompany','EmployerCompanyManagementController')->middleware('emp_profile_check');
    /* -----------------------------EMPLOYER SECTION ENDED----------------------------------*/


});










Route::group(['middleware'=>['admin']],function(){


    /* -----------------------------ADMIN SECTION STARTED----------------------------------*/

    Route::GET('Admin/dashboard','AdminController@profile')->name('adminProfile');
    Route::POST('Admin/saveprofile', 'AdminController@storeProfile')->name('saveAdminProfile');


    Route::post('Admin/Profile/Update','AdminController@updateadminprofile')->name('updateadminprofile')->middleware('admin_profile_check');
    Route::GET('Admin/Profile/Show','AdminController@showadminprofile')->name('viewAdminProfile')->middleware('admin_profile_check');
    Route::POST('Admin/Profile/Edit','AdminController@editadminprofile')->name('editAdminProfile')->middleware('admin_profile_check');


    Route::resource('Admin/Manage/Users', 'AdminManageAdminUsersController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/Roles', 'AdminManageRoles')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/Genders', 'AdminManageGendersController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/Countries', 'AdminManageContriesController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/States', 'AdminManageStatesController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/Cities', 'AdminManageCitiesController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/ZipCodes', 'AdminManageCodesController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/SkillSet', 'AdminManageSkillSetController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/JobType', 'AdminManageJobTypeController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/Experience', 'AdminManageApplicantExperienceController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/Education', 'AdminManageApplicantEducationController')->middleware('admin_profile_check');
    Route::resource('Admin/Manage/Job', 'AdminManageEmployerJobController')->middleware('admin_profile_check');

    /* -----------------------------ADMIN SECTION ENDED----------------------------------*/




});















    Route::GET('logout','UserRegistration@logout')->name('logout');
//});



//
//
//Route::get('find',function(){
//
//    $user = User::findOrFail(1);
//    dd($user->roles()->first()->pivot->user_id);
//});
//
//Route::get('Admin/create',function(){
//
//    $user = User::findOrFail(1);
//
//    $user->roles()->attach(1);
//
//});
//
//Route::get('App/create',function(){
//
//    $user = User::findOrFail(1);
//
//    $user->roles()->attach(2);
//
//});
//
//
//Route::get('Emp/create',function(){
//
//    $user = User::findOrFail(1);
//
//    $user->roles()->attach(3);
//
//});
//
//
//
//Route::get('User/create',function(){
//
//    $user = new User;
//
//    $user->name = "Ali";
//    $user->email = "Ali@gmail.com";
//    $user->password = "Ali";
//    $user->save();
//
//});
//
//
//
//Route::get('role',function (){
//
//    $role = new Role;
//
//    $role->name = "Admin";
//
//    $role->timestamps = false;
//
//    $role->save();
//
//    $role = new Role;
//
//    $role->name = "Applicant";
//
//    $role->timestamps = false;
//
//    $role->save();
//
//    $role = new Role;
//
//    $role->name = "Employer";
//
//    $role->timestamps = false;
//
//    $role->save();
//
//});
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//Route::get('create/role',function(){

//});
//
//
Route::get('createusers',function (){

    foreach (User::all() as $book)
    {
        if($book->user_type == 1)
            echo $book->admin_profile->fname;
        elseif ($book->user_type == 2)
            echo $book->applicant_profile->fname;
        elseif($book->user_type == 3)
            echo $book->employer_profile->fname;
    }
});

Route::get('test',function(){
    $status = UserType::where(['role_name'=>''])->firstOrFail()->id;
    dd($status);
});



Route::get('id',function(){

    /*Insert UserType*/
   
    /*End Insert UserType*/
    //------------------------------------------------------------------------------------------------------------------
    /*Insert Gender */
    
    //End Insert Gender
    //------------------------------------------------------------------------------------------------------------------
    /*Insert Country*/
    /*End Insert Country*/
    //------------------------------------------------------------------------------------------------------------------
    /*Insert State*/
   
    /*End Insert State*/
    //------------------------------------------------------------------------------------------------------------------

    // Insert City
    
    // End Insert City
    //------------------------------------------------------------------------------------------------------------------
    // Insert Zip
   

    // End Insert Zip
    //------------------------------------------------------------------------------------------------------------------
    //Insert JobType
    
    //End Insert JobType
    //------------------------------------------------------------------------------------------------------------------
    //Insert Skill Set

    

    //End Insert Skill Set
    //------------------------------------------------------------------------------------------------------------------
});



Route::get('changestatus/{id}',function($id){
    $no = \Illuminate\Support\Facades\Auth::user()->notify()->where('post_job_id','=',$id)->get()->first();
    $no->is_seen = 1;
    $no->save();

    return redirect()->route('viewjob',['id'=>$id]);
})->name('status');



Route::get('testdash',function(){
    if(session()->has('right'))
    {
        $no_right = session()->pull('right')[0];
    }
    else
    {
        $no_right = "";
    }
    $shown = false;
    $user = Auth::user();
    if($user != null) {
        $profile = ApplicantProfile::whereUserId($user->id)->first();
        if ($profile->profile_completed == 0)
        { // Profile Not Completed
            return view('applicant.profile');
        }
        elseif ($profile->profile_completed == 1)
        { // Profile completed
            //Check Notification in Notification Table if there is any
            foreach($user->notify as $no) {

                if( $no->is_seen == 0)
                {
                    $shown = true;
                }

            }
            //Check Message in Message Table
            $u = $user;
            $total_messages = 0;
            $user_data = array();
            $time = array();
            $ids = array();
            $i = 0;
            if (count($u->user_1_conversation)>0)
            {
                $con = $u->user_1_conversation;
                foreach($con as $c)
                {
                    foreach($c->message as $mess)
                    {
                        if($mess->is_user_1_seen==0)
                        {
                            $total_messages++;
                            $user_data[$i] = $mess->message_text;
                            $d = $mess->message_send_at;
                            $ids[$i]=$mess->conversation->user_2_reference->id;
                            $time[$i] = date('h:i', strtotime($d)) . ' '. date('a', strtotime($d));
                            $i++;
                        }
                    }
                }
            }
            else
            {
                $con = $u->user_2_conversation;
                foreach($con as $c)
                {
                    foreach($c->message as $mess)
                    {
                        if($mess->is_user_2_seen==0)
                        {
                            $total_messages++;
                            $user_data[$i] = $mess->message_text;
                            $d = $mess->message_send_at;
                            $ids[$i]=$mess->conversation->user_1_reference->id;;
                            $time[$i] = date('h:i', strtotime($d)) . ' '. date('a', strtotime($d));
                            $i++;
                        }
                    }
                }

            }
            return view('test')->with('shown',$shown)->with('total_message',$total_messages)
                ->with('data',$user_data)->with('time',$time)->with('ids',$ids)->with('noRight',$no_right)->with('user',$user);
        }
    }
});