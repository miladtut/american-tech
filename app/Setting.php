<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
/**
 * Class Setting
 *
 * @package App
 * @property string $address
 * @property string $mobile
 * @property string $email
 * @property text $hourwork
 * @property text $footertext
 * @property string $copyright
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $petrest
 * @property string $google
 * @property string $youtube
 * @property string $instagram
 * @property string $titlewebsite
*/
class Setting extends Model
{
    use SoftDeletes;

    protected $fillable = ['address', 'mobile', 'email',
        'footertext', 'copyright', 'facebook',
        'twitter', 'linkedin', 'petrest', 'google', 'youtube',
        'instagram', 'titlewebsite'
        ,'subtitlework' ,'subtitleservices','subtitlealbum' ,'subtitleteam' ,'subtitlecontact' ,'subtitlenews'
        ,'subtitlework_en' ,'subtitleservices_en' ,'subtitlealbum_en' ,'subtitleteam_en' , 'subtitlecontact_en','subtitlenews_en'
        ,'subtitlework_tr' ,'subtitleservices_tr' ,'subtitlealbum_tr' ,'subtitleteam_tr' , 'subtitlenews_tr' ,'subtitlecontact_tr'
        ,'about_us_tr','about_us_en','about_us',
         'contact_us' ,'contact_us_en','contact_us_tr',
         'studio' ,'studio_en' ,'studio_tr',
         'clients' ,'clients_en','clients_tr',
         'lastnews','lastnews_en' ,'lastnews_tr' ,
         'services','services_en' ,'services_tr' ,
         'ourwork' , 'ourwork_tr' , 'ourwork_en' ,
         'team','team_en' , 'team_tr' ,'companyFile',
         'home','home_en','home_tr',
         'more_work' , 'more_work_en' ,'more_work_tr',
         'copyright_tr','copyright_en' ,
         'address_en' , 'address_tr' ,'hourwork','hourwork_en','logo',
         'behance' , 'whatsapp','snapchat' ,'tags' ,'meta_desc' ,'meta_title', 'meta_desc_en' ,'meta_title_en' , 'key_words'
         ,'text_services_ar','text_services_en','text_business_ar','text_business_en'


    ];
    protected $hidden = [];


    public function getAddressAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['address_en'] == '')  {
                return $this->attributes['address'];
            }else{
                return  $this->attributes['address_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['address_tr'] == '')  {
                return $this->attributes['address_en'];
            }else{
                return  $this->attributes['address_tr'];
            }
        }


        return  $this->attributes['address'];

    }


    public function getCopyrightAttribute($input)
    {

        if(App::isLocale('en')){

            if($this->attributes['copyright_en'] == '')  {
                return $this->attributes['copyright'];
            }else{
                return  $this->attributes['copyright_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['copyright_tr'] == '')  {
                return $this->attributes['copyright_en'];
            }else{
                return  $this->attributes['copyright_tr'];
            }
        }


        return  $this->attributes['copyright'];

    }

    public function getHomeAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['home_en'] == '')  {
                return $this->attributes['home'];
            }else{
                return  $this->attributes['home_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['home_tr'] == '')  {
                return $this->attributes['home_en'];
            }else{
                return  $this->attributes['home_tr'];
            }
        }


        return  $this->attributes['home'];

    }

    public function getMoreworkAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['more_work_en'] == '')  {
                return $this->attributes['more_work'];
            }else{
                return  $this->attributes['more_work_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['more_work_tr'] == '')  {
                return $this->attributes['more_work_en'];
            }else{
                return  $this->attributes['more_work_tr'];
            }
        }


        return  $this->attributes['more_work'];

    }


    public function getAboutUsAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['about_us_en'] == '')  {
                return $this->attributes['about_us'];
            }else{
                return  $this->attributes['about_us_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['about_us_tr'] == '')  {
                return $this->attributes['about_us_en'];
            }else{
                return  $this->attributes['about_us_tr'];
            }
        }


        return  $this->attributes['about_us'];

    }

    public function getContactUsAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['contact_us_en'] == '')  {
                return $this->attributes['contact_us'];
            }else{
                return  $this->attributes['contact_us_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['contact_us_tr'] == '')  {
                return $this->attributes['contact_us_en'];
            }else{
                return  $this->attributes['contact_us_tr'];
            }
        }


        return  $this->attributes['contact_us'];

    }



    public function getStudioAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['studio_en'] == '')  {
                return $this->attributes['studio'];
            }else{
                return  $this->attributes['studio_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['studio_tr'] == '')  {
                return $this->attributes['studio_en'];
            }else{
                return  $this->attributes['studio_tr'];
            }
        }


        return  $this->attributes['studio'];

    }

    public function getClientsAttribute($input)
    {

        if(App::isLocale('en')){
            if($this->attributes['clients_en'] == '')  {
                return $this->attributes['clients'];
            }else{
                return  $this->attributes['clients_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['clients_tr'] == '')  {
                return $this->attributes['clients_en'];
            }else{
                return  $this->attributes['clients_tr'];
            }
        }

        return  $this->attributes['clients'];

    }


    public function getLastnewsAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['lastnews_en'] == '')  {
                return $this->attributes['lastnews'];
            }else{
                return  $this->attributes['lastnews_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['lastnews_tr'] == '')  {
                return $this->attributes['lastnews_en'];
            }else{
                return  $this->attributes['lastnews_tr'];
            }
        }


        return  $this->attributes['lastnews'];

    }

    public function getServicesAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['services_en'] == '')  {
                return $this->attributes['services'];
            }else{
                return  $this->attributes['services_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['services_tr'] == '')  {
                return $this->attributes['services_en'];
            }else{
                return  $this->attributes['services_tr'];
            }
        }


        return  $this->attributes['services'];

    }



    public function getOurworkAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['ourwork_en'] == '')  {
                return $this->attributes['ourwork'];
            }else{
                return  $this->attributes['ourwork_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['ourwork_tr'] == '')  {
                return $this->attributes['ourwork_en'];
            }else{
                return  $this->attributes['ourwork_tr'];
            }
        }


        return  $this->attributes['ourwork'];

    }


    public function getTeamAttribute($input)
    {


        if(App::isLocale('en')){

            if($this->attributes['team_en'] == '')  {
                return $this->attributes['team'];
            }else{
                return  $this->attributes['team_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['team_tr'] == '')  {
                return $this->attributes['team_en'];
            }else{
                return  $this->attributes['team_tr'];
            }
        }

        return  $this->attributes['team'];

    }



    public function getSubtitleworkAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['subtitlework_en'] == '')  {
                return $this->attributes['subtitlework'];
            }else{
                return  $this->attributes['subtitlework_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['subtitlework_tr'] == '')  {
                return $this->attributes['subtitlework'];
            }else{
                return  $this->attributes['subtitlework_tr'];
            }
        }


        return  $this->attributes['subtitlework'];

    }



    public function getSubtitleservicesAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['subtitleservices_en'] == '')  {
                return $this->attributes['subtitleservices_en'];
            }else{
                return  $this->attributes['subtitleservices_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['subtitleservices_tr'] == '')  {
                return $this->attributes['subtitleservices_en'];
            }else{
                return  $this->attributes['subtitleservices_tr'];
            }
        }


        return  $this->attributes['subtitleservices'];

    }



    public function getSubtitlealbumAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['subtitlealbum_en'] == '')  {
                return $this->attributes['subtitlealbum_en'];
            }else{
                return  $this->attributes['subtitlealbum_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['subtitlealbum_tr'] == '')  {
                return $this->attributes['subtitlealbum_en'];
            }else{
                return  $this->attributes['subtitlealbum_tr'];
            }
        }


        return  $this->attributes['subtitlealbum'];

    }




    public function getSubtitleteamAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['subtitleteam_en'] == '')  {
                return $this->attributes['subtitleteam_en'];
            }else{
                return  $this->attributes['subtitleteam_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['subtitleteam_tr'] == '')  {
                return $this->attributes['subtitleteam_en'];
            }else{
                return  $this->attributes['subtitleteam_tr'];
            }
        }


        return  $this->attributes['subtitleteam'];

    }


    public function getSubtitlecontactAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['subtitlecontact_en'] == '')  {
                return $this->attributes['subtitlecontact_en'];
            }else{
                return  $this->attributes['subtitlecontact_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['subtitlecontact_tr'] == '')  {
                return $this->attributes['subtitlecontact_en'];
            }else{
                return  $this->attributes['subtitlecontact_tr'];
            }
        }


        return  $this->attributes['subtitlecontact'];

    }


    public function getSubtitlenewsAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['subtitlenews_en'] == '')  {
                return $this->attributes['subtitlenews_en'];
            }else{
                return  $this->attributes['subtitlenews_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['subtitlenews_tr'] == '')  {
                return $this->attributes['subtitlenews_en'];
            }else{
                return  $this->attributes['subtitlenews_tr'];
            }
        }


        return  $this->attributes['subtitlenews'];

    }
}
