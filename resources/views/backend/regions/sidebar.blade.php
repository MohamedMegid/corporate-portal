<div class="page-sidebar  sidebar-nav">
    <!-- BEGIN SIDEBAR MENU -->
    <ul id="menu" class="page-sidebar-menu">
        <li class="{{ Request::is('admin') ? 'active' : '' }}
                   {{ Request::is(''.Lang::getlocale().'/admin') ? 'active' : '' }}">
            <a href="/{{Lang::getlocale()}}/admin">
                <i class="livicon" data-name="home" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                <span class="title">{{ trans('backend.dashboard') }}</span>
            </a>
        </li>


        <li class="{{ Request::is(''.Lang::getlocale().'/admin/news') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/news/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="pacman" data-size="20" data-c="#ffffff" data-hc="#00bc8c" data-loop="true"></i>
                <span class="title">{{ trans('backend.news') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/news') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/news">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.list_news') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                <li class="{{ Request::is('admin/news/create') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/news/create">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.create') }} {{ trans('backend.news') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="{{ Request::is(''.Lang::getlocale().'/admin/events') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/events/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="help" data-size="20" data-c="#00bc8c" data-hc="#fff" data-loop="true"></i>
                <span class="title">{{ trans('backend.events') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/events') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/events">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.events') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                <li class="{{ Request::is('admin/events/create') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/events/create">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.create') }} {{ trans('backend.event') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>


        <li class="{{ Request::is(''.Lang::getlocale().'/admin/pages') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/pages/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="doc-portrait" data-size="20" data-c="#ffffff" data-hc="#00bc8c" data-loop="true"></i>
                <span class="title">{{ trans('backend.pages') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/pages') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/pages">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.pages') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
                <li class="{{ Request::is('admin/pages/create') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/pages/create">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.create') }} {{ trans('backend.pages') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="{{ Request::is(''.Lang::getlocale().'/admin/menus') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/menus/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="list-ul" data-size="20" data-c="#EF6F6C" data-hc="#EF6F6C" data-loop="true"></i>
                <span class="title">{{ trans('backend.menus') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/menus') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/menus">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.menus') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
                <li class="{{ Request::is('admin/menus/create-link') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/menus/create-link">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.create') }} {{ trans('backend.links') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="{{ Request::is(''.Lang::getlocale().'/admin/banners') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/banners/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="image" data-size="20" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                <span class="title">{{ trans('backend.banners') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/banners') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/banners">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.list_banners') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                <li class="{{ Request::is('admin/banners/create') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/banners/create">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.create') }} {{ trans('backend.banners') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is(''.Lang::getlocale().'/admin/products') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/products/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="flag" data-size="20" data-c="#418bca" data-hc="#418bca" data-loop="true"></i>
                <span class="title">{{ trans('backend.products') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/products') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/products">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.products') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
                <li class="{{ Request::is('admin/products/create') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/products/create">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.create') }} {{ trans('backend.products') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="{{ Request::is(''.Lang::getlocale().'/admin/services') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/services/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="brush" data-size="20" data-c="#F89A14" data-hc="#418bca" data-loop="true"></i>
                <span class="title">{{ trans('backend.services') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/services') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/services">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.services') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
                <li class="{{ Request::is('admin/services/create') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/services/create">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.create') }} {{ trans('backend.services') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
            </ul>
        </li>  

        <li class="{{ Request::is(''.Lang::getlocale().'/admin/tickets') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/tickets/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="table" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                <span class="title">{{ trans('backend.tickets') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/tickets') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/tickets">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.tickets') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="{{ Request::is(''.Lang::getlocale().'/admin/implinks') ? 'active' : '' }} 
            {{ Request::is(''.Lang::getlocale().'/admin/implinks/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="link" data-size="20" data-c="#ef6f6c" data-hc="#00bc8c" data-loop="true"></i>
                <span class="title">{{ trans('backend.implinks') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/implinks') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/implinks">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.implinks') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                <li class="{{ Request::is('admin/implinks/create') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/implinks/create">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.create') }} {{ trans('backend.implinks') }}
                        @if(Lang::getlocale() == 'ar')
                          <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
        


        <li class=" {{ Request::is('admin/contacts') ? 'active' : '' }} 
                    {{ Request::is('admin/contacts/*') ? 'active' : '' }}
                    {{ Request::is(''.Lang::getlocale().'/admin/contacts') ? 'active' : '' }}
                    {{ Request::is(''.Lang::getlocale().'/admin/contacts/*') ? 'active' : '' }}
                    {{ Request::is(''.Lang::getlocale().'/admin/contacts-info') ? 'active' : '' }}
                    {{ Request::is(''.Lang::getlocale().'/admin/contacts-gmap') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="phone" data-size="20" data-c="#EF6F6C" data-hc="#f6bb42" data-loop="true"></i>
                <span class="title">{{ trans('backend.messages') }}</span>
                <span class="fa arrow"></span>
                <span class="badge badge-danger">{{ $counter->NewMessages() }}</span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/contacts') ? 'active' : '' }}
                           {{ Request::is(''.Lang::getlocale().'/admin/contacts') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/contacts">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ trans('backend.new_messages') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                <li class="{{ Request::is('admin/contacts/replied') ? 'active' : '' }}
                           {{ Request::is(''.Lang::getlocale().'/admin/contacts/replied') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/contacts/replied">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                            {{ trans('backend.replied_messages') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                <li class="{{ Request::is('admin/contacts-info') ? 'active' : '' }}
                           {{ Request::is(''.Lang::getlocale().'/admin/contacts-info') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/contacts-info">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                            {{ trans('backend.contacts_info') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
                <li class="{{ Request::is('admin/contacts-gmap') ? 'active' : '' }}
                           {{ Request::is(''.Lang::getlocale().'/admin/contacts-gmap') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/contacts-gmap">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                            {{ trans('backend.gmap') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

       
        <li class="{{ Request::is(''.Lang::getlocale().'/admin/users/*') ? 'active' : '' }} {{ Request::is(''.Lang::getlocale().'/admin/users') ? 'active' : '' }}
            {{ Request::is(''.Lang::getlocale().'/admin/activated-users') ? 'active' : '' }}
            {{ Request::is(''.Lang::getlocale().'/admin/deactivated-users') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="user" data-size="20" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                <span class="title">{{ trans('backend.users') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/users">
                        
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                         {{ trans('backend.list_users') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif

                    </a>
                </li>
                <li class="{{ Request::is('admin/users/create') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/users/create">

                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                         {{ trans('backend.create') }} {{ trans('backend.user') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is(''.Lang::getlocale().'/admin/social/*') ? 'active' : '' }} {{ Request::is(''.Lang::getlocale().'/admin/social') ? 'active' : '' }}
            {{ Request::is(''.Lang::getlocale().'/admin/activated-social') ? 'active' : '' }}
            {{ Request::is(''.Lang::getlocale().'/admin/deactivated-social') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="move" data-size="20" data-c="#EF6F6C" data-hc="#EF6F6C" data-loop="true"></i>
                <span class="title">{{ trans('backend.Social Media') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/social/edit') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/social/edit">

                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                         {{ trans('backend.edit') }} {{ trans('backend.Social Media') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is(''.Lang::getlocale().'/admin/maininfo/*') ? 'active' : '' }} {{ Request::is(''.Lang::getlocale().'/admin/maininfo') ? 'active' : '' }}
            {{ Request::is(''.Lang::getlocale().'/admin/activated-maininfo') ? 'active' : '' }}
            {{ Request::is(''.Lang::getlocale().'/admin/deactivated-maininfo') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="map" data-size="18" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                <span class="title">{{ trans('backend.Main Info') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/maininfo/edit') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/maininfo/edit">
                        
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                         {{ trans('backend.edit') }} {{ trans('backend.Main Info') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/settings') ? 'active' : '' }} 
                   {{ Request::is('admin/settings/*') ? 'active' : '' }}
                   {{ Request::is(''.Lang::getlocale().'/admin/settings') ? 'active' : '' }} 
                   {{ Request::is(''.Lang::getlocale().'/admin/settings/*') ? 'active' : '' }}">
            <a href="#">
                <i class="livicon" data-name="ban" data-size="20" data-c="rgb(213, 28, 28)" data-hc="rgb(134, 10, 10)" data-loop="true"></i>
                <span class="title">{{ trans('backend.settings') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::is('admin/settings/email') ? 'active' : '' }}
                           {{ Request::is(''.Lang::getlocale().'/admin/settings/email') ? 'active' : '' }}">
                    <a href="/{{Lang::getlocale()}}/admin/settings/email">
                        @if(Lang::getlocale() == 'en')
                         <i class="fa fa-angle-double-right"></i>
                        @endif
                         {{ trans('backend.smtp_settings') }}
                        @if(Lang::getlocale() == 'ar')
                         <i class="fa fa-angle-double-left"></i>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <!-- END SIDEBAR MENU -->
</div>