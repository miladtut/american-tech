<?php


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::post('admin/settingsprofile' , 'Admin\SettingsController@settingsProfileUpdate');
Route::get('ser' ,'Web\WebController@getServ');


Route::post('admin/ajaxChangeOffer' ,'Admin\OffersController@ajaxChangeOffer' );
Route::post('/ajaxdeleteimage', 'Web\WebController@ajaxDeleteImage')->name( 'web.ajaxDeleteImage');
Route::post('/ajaxDeleteImageBlog', 'Web\WebController@ajaxDeleteImageBlog')->name( 'web.ajaxDeleteImageBlog');





// Route::get('lang/{locale}', function ($locale) {
//     return redirect()->back()->withCookie(cookie()->forever('language', $locale));
// });



Route::post('/file/post', 'Web\WebController@filePost')->name('web.filePost');


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    $this->get('/', 'Web\WebController@indexHome')->name('web.index');

    $this->get('/about', 'Web\WebController@about')->name('web.about');
    Route::get('lang/{lang}', 'Web\WebController@changeLang');

    // $this->get('details/services/{id}', 'Web\WebController@serviceDetails')->name('web.serviceDetails');
 $this->get('servicedetails/{slug}', 'Web\WebController@serviceDetails')->name('web.serviceDetails');

    //blog
    $this->get('/blog' , 'Web\BlogController@index')->name('web.blog.index');
    $this->get('/blog/{id}' , 'Web\BlogController@single')->name('web.blog.single');

    //consult
    $this->get('consult' , 'Web\ConsultingController@index')->name('web.consult');
    Route::post('ajaxaddCounsult', 'Web\ConsultingController@ajaxaddCounsult')->name( 'web.ajaxaddCounsult');


    //offerprice
   $this->get('offerprice', 'Web\OfferPriceController@index')->name('web.offerPrice');
   Route::post('ajaxaddOffer', 'Web\OfferPriceController@ajaxaddOffer')->name( 'web.ajaxaddOffer');
    
   //joinourteam
    $this->get('joinourteam', 'Web\JoinOurTeamController@index')->name('web.joinOurTeam');
    Route::post('ajaxaddmarketer', 'Web\JoinOurTeamController@ajaxAddMarketer')->name( 'web.ajaxAddMarketer');
    Route::post('ajaxaddmember', 'Web\JoinOurTeamController@ajaxAddTeamMmber')->name( 'web.ajaxAddTeamMmber');
    
    //mailingListSubscriptions
  Route::post('mailingListSubscriptions', 'Web\WebController@mailingListSubscriptions')->name('web.mailingListSubscriptions');

});

// $this->get('/baqa' , 'Web\WebController@baqa')->name('web.baqa');
// $this->get('search/{word}', 'Web\WebController@searchFn')->name('web.searchFn');
// $this->post('saveAjax', 'Web\WebController@saveAjaxForm')->name('web.saveAjaxForm');
// $this->get('services', 'Web\WebController@services')->name('web.services');
// $this->get('offers-special', 'Web\WebController@offersSpecial')->name('web.offersSpecial');
// $this->get('tours', 'Web\WebController@tours')->name('web.tours');
// $this->get('offers-str', 'Web\WebController@offersStr')->name('web.offersStr');
// $this->get('contactus', 'Web\WebController@contactus')->name('web.contactus');
// $this->get('servicedetails/{slug}', 'Web\WebController@serviceDetails')->name('web.serviceDetails');
// $this->get('allourwork', 'Web\WebController@allOurWork')->name('web.allOurWork');
// $this->get('singlework/work/{id}', 'Web\WebController@oneWork')->name('web.oneWork');
// $this->get('news/{id}', 'Web\WebController@newsDetails')->name('web.newsDetails');
// $this->get('lastnews', 'Web\WebController@lastNews')->name('web.lastNews');
// $this->get('allmedia', 'Web\WebController@mediaStors')->name('web.mediaStors');


//$this->get('search/{$value}', 'Web\WebController@Search')->name('web.search');

Route::post('send/register', 'Auth\RegisterController@sendMess');
Route::post('send/message', 'Admin\MessengerController@sendMess');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('auth.logout');
// Authentication Routes...
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('register', 'Auth\RegisterController@register')->name('register');


//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth','langaradmin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('settings/profile' , 'Admin\SettingsController@settingsProfile');


    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    Route::resource('contact_companies', 'Admin\ContactCompaniesController');
    Route::post('contact_companies_mass_destroy', ['uses' => 'Admin\ContactCompaniesController@massDestroy', 'as' => 'contact_companies.mass_destroy']);
    Route::resource('contacts', 'Admin\ContactsController');
    Route::post('contacts_mass_destroy', ['uses' => 'Admin\ContactsController@massDestroy', 'as' => 'contacts.mass_destroy']);
    Route::resource('content_categories', 'Admin\ContentCategoriesController');
    Route::post('content_categories_mass_destroy', ['uses' => 'Admin\ContentCategoriesController@massDestroy', 'as' => 'content_categories.mass_destroy']);
    Route::resource('content_tags', 'Admin\ContentTagsController');
    Route::post('content_tags_mass_destroy', ['uses' => 'Admin\ContentTagsController@massDestroy', 'as' => 'content_tags.mass_destroy']);
    Route::resource('content_pages', 'Admin\ContentPagesController');
    Route::post('content_pages_mass_destroy', ['uses' => 'Admin\ContentPagesController@massDestroy', 'as' => 'content_pages.mass_destroy']);
    // Route::resource('colleges', 'Admin\CollegesController');
    // Route::post('colleges_mass_destroy', ['uses' => 'Admin\CollegesController@massDestroy', 'as' => 'colleges.mass_destroy']);
    // Route::post('colleges_restore/{id}', ['uses' => 'Admin\CollegesController@restore', 'as' => 'colleges.restore']);
    // Route::delete('colleges_perma_del/{id}', ['uses' => 'Admin\CollegesController@perma_del', 'as' => 'colleges.perma_del']);


    Route::resource('services', 'Admin\ServicesController');
    Route::post('services_mass_destroy', ['uses' => 'Admin\ServicesController@massDestroy', 'as' => 'services.mass_destroy']);
    Route::post('services_restore/{id}', ['uses' => 'Admin\ServicesController@restore', 'as' => 'services.restore']);
    Route::delete('services_perma_del/{id}', ['uses' => 'Admin\ServicesController@perma_del', 'as' => 'services.perma_del']);
    

    //slider
    Route::get('sliders', ['uses' => 'Admin\SlidersController@index', 'as' => 'sliders.index']);
    Route::put('sliders/{id}', ['uses' => 'Admin\SlidersController@update', 'as' => 'sliders.update']);

    //about
    Route::get('about-us', ['uses' => 'Admin\AboutController@index', 'as' => 'about.index']);
    Route::put('about-us/{id}', ['uses' => 'Admin\AboutController@update', 'as' => 'about.update']);

    //build_projects
    Route::get('build-projects', ['uses' => 'Admin\BuildProjectController@index', 'as' => 'build_projects.index']);
    Route::put('build_projects/{id}', ['uses' => 'Admin\BuildProjectController@update', 'as' => 'build_projects.update']);

      
    //ourBusiness
    Route::resource('ourBusiness', 'Admin\OurBusinessController');
    Route::post('ourBusiness_restore/{id}', ['uses' => 'Admin\OurBusinessController@restore', 'as' => 'ourBusiness.restore']);
    Route::delete('ourBusiness_perma_del/{id}', ['uses' => 'Admin\OurBusinessController@perma_del', 'as' => 'ourBusiness.perma_del']);

 
     //customerOpinions
     Route::resource('customerOpinions', 'Admin\CustomerOpinionsController');
     Route::post('customerOpinions_restore/{id}', ['uses' => 'Admin\CustomerOpinionsController@restore', 'as' => 'customerOpinions.restore']);
     Route::delete('customerOpinions_perma_del/{id}', ['uses' => 'Admin\CustomerOpinionsController@perma_del', 'as' => 'customerOpinions.perma_del']);


     //blog
     Route::resource('blog', 'Admin\BlogController');
     Route::post('blog/{id}', ['uses' => 'Admin\BlogController@restore', 'as' => 'blog.restore']);
     Route::delete('blog/{id}', ['uses' => 'Admin\BlogController@perma_del', 'as' => 'blog.perma_del']);
     Route::post('blog_mass_destroy', ['uses' => 'Admin\BlogController@massDestroy', 'as' => 'blog.mass_destroy']);


     //systemConstants
     Route::group(['prefix' => 'systemConstants/{parent}', 'as' => 'systemConstants.'], function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'Admin\SystemConstantsController@create']);
            Route::post('/', ['as' => 'store', 'uses' => 'Admin\SystemConstantsController@store']);
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}', ['as' => 'index', 'uses' => 'Admin\SystemConstantsController@edit']);
            Route::put('/{id}', ['as' => 'update', 'uses' => 'Admin\SystemConstantsController@update']);
        });
        
     Route::get('/', ['as' => 'index', 'uses' => 'Admin\SystemConstantsController@index']);
        
        Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'Admin\SystemConstantsController@destroy']);

        Route::post('customerOpinions_restore/{id}', ['uses' => 'Admin\CustomerOpinionsController@restore', 'as' => 'systemConstants.restore']);
        Route::delete('customerOpinions_perma_del/{id}', ['uses' => 'Admin\CustomerOpinionsController@perma_del', 'as' => 'systemConstants.perma_del']);
   

    });

     //statistics
     Route::resource('statistics', 'Admin\StatisticsController');
     Route::post('statistics_restore/{id}', ['uses' => 'Admin\StatisticsController@restore', 'as' => 'statistics.restore']);
     Route::delete('statistics_perma_del/{id}', ['uses' => 'Admin\StatisticsController@perma_del', 'as' => 'statistics.perma_del']);
  
      //digitalReceiver
    Route::get('digitalReceiver', ['uses' => 'Admin\DigitalReceiverController@index', 'as' => 'digitalReceiver.index']);
    Route::put('digitalReceiver/{id}', ['uses' => 'Admin\DigitalReceiverController@update', 'as' => 'digitalReceiver.update']);
    
    //mailingList
    Route::get('mailingList', ['uses' => 'Admin\MailingListController@index', 'as' => 'mailingList.index']);
    Route::get('mailingList/Export', ['uses' => 'Admin\MailingListController@export', 'as' => 'mailingList.export']);
    Route::get('mailingList/sendMsg/{id}', ['uses' => 'Admin\MailingListController@sendMsg', 'as' => 'mailingList.sendMsg.index']);
    Route::post('mailingList/sendMail', ['uses' => 'Admin\MailingListController@sendMail', 'as' => 'mailingList.sendMsg.send']);



    Route::resource('usersmarketer', 'Admin\UsersmarketerController');

    Route::get('testemail', 'Admin\UsersmarketerController@testemail');

    Route::resource('offers', 'Admin\OffersController');
    Route::post('offers_mass_destroy', ['uses' => 'Admin\OffersController@massDestroy', 'as' => 'offers.mass_destroy']);
    Route::post('offers_restore/{id}', ['uses' => 'Admin\OffersController@restore', 'as' => 'offers.restore']);
    Route::delete('offers_perma_del/{id}', ['uses' => 'Admin\OffersController@perma_del', 'as' => 'offers.perma_del']);
   //send msg 
   Route::get('offers/sendMsg/{id}', ['uses' => 'Admin\OffersController@sendMsg', 'as' => 'offers.sendMsg.index']);
   Route::post('offers/sendMail', ['uses' => 'Admin\OffersController@sendMail', 'as' => 'offers.sendMsg.send']);





    Route::get('offersmarketer/{id}', 'Admin\OffersController@show')->name('offersmarketer.show');



    Route::resource('category', 'Admin\CategoryController');
    Route::post('category_mass_destroy', ['uses' => 'Admin\CategoryController@massDestroy', 'as' => 'category.mass_destroy']);
    Route::post('category_restore/{id}', ['uses' => 'Admin\CategoryController@restore', 'as' => 'category.restore']);
    Route::delete('category_perma_del/{id}', ['uses' => 'Admin\CategoryController@perma_del', 'as' => 'category.perma_del']);



    Route::resource('news', 'Admin\NewsController');
    Route::post('news_mass_destroy', ['uses' => 'Admin\NewsController@massDestroy', 'as' => 'news.mass_destroy']);
    Route::post('news_restore/{id}', ['uses' => 'Admin\NewsController@restore', 'as' => 'news.restore']);
    Route::delete('news_perma_del/{id}', ['uses' => 'Admin\NewsController@perma_del', 'as' => 'news.perma_del']);



    Route::resource('team', 'Admin\TeamController');
    Route::post('team_mass_destroy', ['uses' => 'Admin\TeamController@massDestroy', 'as' => 'team.mass_destroy']);
    Route::post('team_restore/{id}', ['uses' => 'Admin\TeamController@restore', 'as' => 'team.restore']);
    Route::delete('team_perma_del/{id}', ['uses' => 'Admin\TeamController@perma_del', 'as' => 'team.perma_del']);



    // Route::resource('offersiqar', 'Admin\OffersiqarController');


    // Route::resource('offerstours', 'Admin\OfferstoursController');


    Route::resource('marketingteam', 'Admin\MarketingteamController');
    Route::post('marketingteam_mass_destroy', ['uses' => 'Admin\MarketingteamController@massDestroy', 'as' => 'marketingteam.mass_destroy']);
    Route::post('marketingteam_restore/{id}', ['uses' => 'Admin\MarketingteamController@restore', 'as' => 'marketingteam.restore']);
    Route::delete('marketingteam_perma_del/{id}', ['uses' => 'Admin\MarketingteamController@perma_del', 'as' => 'marketingteam.perma_del']);



    Route::post('ajaxChangeStatusConsultation', ['uses' => 'Admin\ConsultationController@ajaxChangeStatus', 'as' => 'consultation.ajaxChangeStatus']);
    Route::resource('consultation', 'Admin\ConsultationController');
    Route::post('consultation_mass_destroy', ['uses' => 'Admin\ConsultationController@massDestroy', 'as' => 'consultation.mass_destroy']);
    Route::post('consultation_restore/{id}', ['uses' => 'Admin\ConsultationController@restore', 'as' => 'consultation.restore']);
    Route::delete('consultation_perma_del/{id}', ['uses' => 'Admin\ConsultationController@perma_del', 'as' => 'consultation.perma_del']);
    //send msg 
    Route::get('consultation/sendMsg/{id}', ['uses' => 'Admin\ConsultationController@sendMsg', 'as' => 'consultation.sendMsg.index']);
   Route::post('consultation/sendMail', ['uses' => 'Admin\ConsultationController@sendMail', 'as' => 'consultation.sendMsg.send']);

    Route::resource('supervisors', 'Admin\SupervisorsprojController');
    Route::post('supervisors_mass_destroy', ['uses' => 'Admin\SupervisorsprojController@massDestroy', 'as' => 'supervisors.mass_destroy']);
    Route::post('supervisors_restore/{id}', ['uses' => 'Admin\SupervisorsprojController@restore', 'as' => 'supervisors.restore']);
    Route::delete('supervisors_perma_del/{id}', ['uses' => 'Admin\SupervisorsprojController@perma_del', 'as' => 'supervisors.perma_del']);





    Route::resource('clients', 'Admin\ClientsController');
    Route::post('clients_mass_destroy', ['uses' => 'Admin\ClientsController@massDestroy', 'as' => 'clients.mass_destroy']);
    Route::post('clients_restore/{id}', ['uses' => 'Admin\ClientsController@restore', 'as' => 'clients.restore']);
    Route::delete('clients_perma_del/{id}', ['uses' => 'Admin\ClientsController@perma_del', 'as' => 'clients.perma_del']);
    Route::resource('media', 'Admin\MediaController');
    Route::post('media_mass_destroy', ['uses' => 'Admin\MediaController@massDestroy', 'as' => 'media.mass_destroy']);
    Route::post('media_restore/{id}', ['uses' => 'Admin\MediaController@restore', 'as' => 'media.restore']);
    Route::delete('media_perma_del/{id}', ['uses' => 'Admin\MediaController@perma_del', 'as' => 'media.perma_del']);

    Route::get('settings', 'Admin\SettingsController@edit')->name('settings.create');;
    Route::put('settings', 'Admin\SettingsController@update')->name('settings.update');
    Route::put('settingsprofile', 'Admin\SettingsController@settingsProfileUpdate')->name('settings.settingsprofile');
    Route::post('settings_mass_destroy', ['uses' => 'Admin\SettingsController@massDestroy', 'as' => 'settings.mass_destroy']);
    Route::post('settings_restore/{id}', ['uses' => 'Admin\SettingsController@restore', 'as' => 'settings.restore']);
    Route::delete('settings_perma_del/{id}', ['uses' => 'Admin\SettingsController@perma_del', 'as' => 'settings.perma_del']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');



    Route::model('messenger', 'App\MessengerTopic');
    Route::get('messenger/inbox', 'Admin\MessengerController@inbox')->name('messenger.inbox');
    Route::get('messenger/outbox', 'Admin\MessengerController@outbox')->name('messenger.outbox');
    Route::resource('messenger', 'Admin\MessengerController');





});


$this->get('/admin' , 'HomeController@index')->name('home');
$this->get('/{page}' , 'Web\WebController@goPage')->name('web.goPage');

Route::prefix('/image')->group(function () {
    Route::post('/upload', ['as' => 'upload.image', 'uses' => 'ImageController@upload_image']);
    Route::get('/{size}/{id}', ['as' => 'image', 'uses' => 'ImageHandler@getPublicImage']);
    Route::get('/limit/{size}/{id}', ['as' => 'image', 'uses' => 'ImageHandler@getImageResize']);
    Route::get('/{id}', ['as' => 'image', 'uses' => 'ImageHandler@getDefaultImage']);
});

Route::prefix('/files_consultationِAttachments')->group(function () {
    Route::get('/{link}', ['as' => 'image', 'uses' => 'FilesController@getDefaultFileConsultationِAttachments']);
});

Route::prefix('/files_cv')->group(function () {
    Route::get('/{link}', ['as' => 'image', 'uses' => 'FilesController@getDefaultCV']);
});
