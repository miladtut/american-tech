<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contact management
        Gate::define('contact_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contact companies
        Gate::define('contact_company_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_company_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_company_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_company_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_company_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contacts
        Gate::define('contact_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content management
        Gate::define('content_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content categories
        Gate::define('content_category_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_category_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content tags
        Gate::define('content_tag_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_tag_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_tag_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_tag_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_tag_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content pages
        Gate::define('content_page_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: College
        Gate::define('college_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('college_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('college_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('college_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('college_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: News
        Gate::define('news_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('news_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('news_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('news_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('news_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Books
        Gate::define('book_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('book_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('book_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('book_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('book_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Services
        Gate::define('service_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('service_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('service_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('service_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('service_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Courses
        Gate::define('course_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('course_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('course_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('course_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('course_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Software
        Gate::define('software_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('software_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('software_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('software_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('software_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Newsimages
        Gate::define('newsimage_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('newsimage_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('newsimage_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('newsimage_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('newsimage_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });



        // Auth gates for: Newsimages
        Gate::define('slider_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('slider_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('slider_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('slider_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('slider_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });


        // Auth gates for: Newsimages
        Gate::define('offer_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('offer_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('offer_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('offer_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('offer_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });


        Gate::define('client_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('client_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('client_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('client_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('client_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });


        Gate::define('setting_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('setting_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('setting_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('setting_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('setting_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });


        Gate::define('medium_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('medium_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('medium_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('medium_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('medium_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

      //blog
      Gate::define('blog_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

    //systemConstants
    Gate::define('systemConstants_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

     //mailingList
    Gate::define('mailingList_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

    //digitalReceiver
    Gate::define('digitalReceiver_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

    //customerOpinions
    Gate::define('customerOpinions_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

    //technologies
    Gate::define('technologies_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

    //ourBusiness
    Gate::define('ourBusiness_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

    //statistics
    Gate::define('statistics_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

    //about
    Gate::define('about_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

     //about
     Gate::define('buildProject_access', function ($user) {
        return in_array($user->role_id, [1]);
    });

    }
}
