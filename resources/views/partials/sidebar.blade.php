@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
          
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-globe"></i>
                    <span class="title">@lang('quickadmin.qa_website')</span>
                </a>
            </li>


            @can('user_management_access')

                @can('user_access')
                    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan


            @endcan

            @if(Auth::user()->type == 'admin' )
                @can('content_page_access')
                    <li class="{{ $request->segment(2) == 'content_pages' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.content_pages.index') }}">
                            <i class="fa fa-file-o"></i>
                            <span class="title">
                                @lang('quickadmin.content-pages.title')
                            </span>
                        </a>
                    </li>
                @endcan
            @endif


            @if(Auth::user()->type == 'admin' )

              

            @endif


            <li>
                <a href="{{ route('admin.offers.index') }}">
                    <i class="fa fa-codiepie"></i>
                    <span>@lang('global.offers.title')</span>
                    @if(Auth::user()->type == 'admin'  && $offers_count_new > 0)
                     <span class="badge badge-danger" >{{$offers_count_new}}</span>
                     @endif


                </a>
            </li>


            @if(Auth::user()->type == 'admin' )


                <li>
                    <a href="{{ route('admin.team.index') }}">
                        <i class="fa fa-codiepie"></i>
                        <span>@lang('quickadmin.team.title')</span>

                        @if(Auth::user()->type == 'admin'  && $team_count_new > 0)
                            <span class="badge badge-danger" >{{$team_count_new}}</span>
                        @endif
                    </a>
                </li>



                <li>
                    <a href="{{ route('admin.supervisors.index') }}">
                        <i class="fa fa-codiepie"></i>
                        <span> مشرفي ادارة المشاريع</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.marketingteam.index') }}">
                        <i class="fa fa-codiepie"></i>
                        <span>@lang('global.marketingteam.title')</span>

                        @if( Auth::user()->type == 'admin' && $marketer_count_new > 0)
                            <span class="badge badge-danger" >{{$marketer_count_new}}</span>
                        @endif
                    </a>
                </li>


              
            @endif

            <li>
                <a href="{{ route('admin.consultation.index') }}">
                    <i class="fa fa-codiepie"></i>
                    <span>@lang('global.consultation.title')</span>

                    @if( Auth::user()->type == 'admin'  && $consultation_count_new > 0)
                        <span class="badge badge-danger" >{{ $consultation_count_new }}</span>
                    @endif

                </a>
            </li>

            @if(Auth::user()->type == 'admin')
                <li>
                    <a href="{{ route('admin.settings.create') }}">
                        <i class="fa fa-gears"></i>
                        <span class="badge badge-danger" >@lang('global.settings.title')</span>
                    </a>
                </li>

            @endif

            @if(Auth::user()->type == 'admin')
            
            @php
            $array_active = array("sliders","about-us","services", "statistics", "customerOpinions"
            ,"clients","digitalReceiver","blog","BlogDepartments",'ourBusiness','build_projects'
            );
            @endphp


                  
            <li class=" treeview  {{in_array( @$is_active,$array_active) ?'active treeview menu-open':''}}" style="height: auto;">
                <a href="#">
                 <i class="fa fa-dashboard"></i> <span>@lang('global.siteComponents')</span>
                 <span class="pull-right-container">
                   <i class="fa fa-chevron-left"></i>
                 </span>
               </a>
               <ul class="treeview-menu" style="">
                
                <li class="{{@$is_active=='sliders'? 'active'  : ''}}">
                     <a href="{{ route('admin.sliders.index') }}">
                     <i class="fa fa-circle-o"></i>
                   @lang('global.slider.title')
                    </a>
                </li>

                <li class="{{@$is_active=='about-us'? 'active'  : ''}}">
                    <a href="{{ route('admin.about.index') }}">
                    <i class="fa fa-circle-o"></i>
                   @lang('global.about.title')
                   </a>
               </li>

               @can('service_access')
               <li class="{{@$is_active=='services'? 'active'  : ''}}">
                   <a href="{{ route('admin.services.index') }}">
                       <i class="fa fa-circle-o"></i>
                     @lang('global.services.title')
                   </a>
               </li>
              @endcan
        
              <li class="{{@$is_active=='statistics'? 'active'  : ''}}">
                <a href="{{ route('admin.statistics.index') }}">
                <i class="fa fa-circle-o"></i>
                @lang('global.statistics.title')
               </a>
               </li>

               <li class="{{@$is_active=='ourBusiness'? 'active'  : ''}}">
                <a href="{{ route('admin.ourBusiness.index') }}">
                <i class="fa fa-circle-o"></i>@lang('global.ourBusiness.title')
               </a>
               </li>

               
             
               <li class="{{@$is_active=='build_projects'? 'active'  : ''}}">
                <a href="{{ route('admin.build_projects.index') }}">
                <i class="fa fa-circle-o"></i>@lang('global.build_projects.title')
               </a>
               </li>
             

               

               <li class="{{@$is_active=='customerOpinions'? 'active'  : ''}}">
                <a href="{{ route('admin.customerOpinions.index') }}">
                <i class="fa fa-circle-o"></i>@lang('global.customerOpinions.title')
               </a>
               </li>
    
               <li class="{{@$is_active=='clients'? 'active'  : ''}}">
                <a href="{{ route('admin.clients.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>@lang('global.clients.title')</span>
                </a>
              </li>

              <li class="{{@$is_active=='digitalReceiver'? 'active'  : ''}}">
                <a href="{{ route('admin.digitalReceiver.index') }}">
                <i class="fa fa-circle-o"></i>@lang('global.digitalReceiver.title')
               </a>
               </li>

               @php
               $array_active_blog = array("blog","BlogDepartments"
               );
               @endphp
               {{-- //blog --}}
               <li class=" treeview  {{in_array( @$is_active,$array_active_blog) ?'active treeview menu-open':''}}" style="height: auto;">
                <a href="#">
                 <i class="fa fa-dashboard"></i> <span>@lang('global.blog.title')</span>
                 <span class="pull-right-container">
                    <i class="fa fa-chevron-left"></i>
                </span>
               </a>
               <ul class="treeview-menu" style="">
                <li class="{{@$is_active=='blog'? 'active'  : ''}}">
                     <a href="{{route('admin.blog.index')}}"><i class="fa fa-circle-o"></i>
                     @lang('global.blog.title')
                    </a>
                </li>

                <li class="{{@$is_active=='BlogDepartments'? 'active'  : ''}}">
                    <a href="{{route('admin.systemConstants.index',['parent'=>'BlogDepartments'])}}"><i class="fa fa-circle-o"></i>
                        @lang('global.systemConstants.parent.blogDepartments')
                   </a>
               </li>

            </ul>
             </li>



            </ul>
            </li>
    
          

            {{--  system_constants  --}}
            @php
            $array_active_system_constants = array("consultationType","CounselingStatus","ConsultationTimes"
            );
            @endphp
            <li class=" treeview  {{in_array( @$is_active,$array_active_system_constants) ?'active treeview menu-open':''}}" style="height: auto;">
                <a href="#">
                 <i class="fa fa-dashboard"></i> <span>@lang('global.systemConstants.title')</span>
                 <span class="pull-right-container">
                    <i class="fa fa-chevron-left"></i>
                 </span>
               </a>
               <ul class="treeview-menu" style="">
                <li class="{{@$is_active=='consultationType'? 'active'  : ''}}">
                    <a href="{{route('admin.systemConstants.index',['parent'=>'consultationType'])}}">
                        <i class="fa fa-circle-o"></i>
                       <span>@lang('global.systemConstants.parent.consultationType')</span>
                    </a>
                </li>

                <li class="{{@$is_active=='CounselingStatus'? 'active'  : ''}}">
                    <a href="{{route('admin.systemConstants.index',['parent'=>'CounselingStatus'])}}">
                        <i class="fa fa-circle-o"></i>
                        <span>@lang('global.systemConstants.parent.counselingStatus')</span>
                    </a>
                </li>
    
                <li class="{{@$is_active=='ConsultationTimes'? 'active'  : ''}}"> 
                    <a href="{{route('admin.systemConstants.index',['parent'=>'ConsultationTimes'])}}">
                        <i class="fa fa-circle-o"></i>
                        <span>@lang('global.systemConstants.parent.consultationTimes')</span>
                    </a>
                </li>
                


                </ul>
             </li>
    
             <li>
                <a href="{{ route('admin.mailingList.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.mailingList.title')</span>
                </a>
            </li>
 
        @endif


            @if(Auth::user()->type != 'admin')
                <li>
                    <a href="{{ url('admin/settings/profile') }}">
                        <i class="fa fa-gears"></i>
                        <span>الاعدادات </span>
                    </a>
                </li>

                
            @endif

            @if(Auth::user()->role_id == 1)

                @php ($unread = App\MessengerTopic::countUnread())
                {{--  <li class="{{ $request->segment(2) == 'messenger' ? 'active' : '' }} {{ ($unread > 0 ? 'unread' : '') }}">
                    <a href="{{ route('admin.messenger.index') }}">
                        <i class="fa fa-envelope"></i>

                        <span>بريد الموقع</span>

                    </a>
                </li>  --}}
                <style>
                    .page-sidebar-menu .unread * {
                        font-weight:bold !important;
                    }
                </style>

            @endif

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>


    <style>
        .sidebar-menu li a .fa-angle-left, .sidebar-menu li .label, .sidebar-menu li .badge {
            position:inherit;
            top: 89%;
            left: 2px;
            background-color: #ff4d4d;
        }

    </style>