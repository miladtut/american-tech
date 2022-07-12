<?php

namespace App\Providers;

use App\Client;
use App\Consultation;
use App\Marketingteam;
use App\Offer;
use App\Team;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $offers_count_new = Offer::where('seen' , 0)->count();
        $team_count_new = Team::where('seen' , 0)->count();
        $marketer_count_new = Marketingteam::where('seen' , 0)->count();
        $consultation_count_new = Consultation::where('seen' , 0)->count();
        view()->composer('*',function($view)
             use($offers_count_new  ,$team_count_new , $marketer_count_new ,$consultation_count_new) {

            $view->with('site_setting', Setting::all()->first());
            $view->with('clients', Client::all());
            $view->with('offers_count_new', $offers_count_new );
            $view->with('team_count_new', $team_count_new );
            $view->with('marketer_count_new', $marketer_count_new);
            $view->with('consultation_count_new', $consultation_count_new);

        });

        if (\Cookie::get('language')) {\App::setLocale(\Crypt::decrypt(\Cookie::get('language')));}

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }

    }
}
