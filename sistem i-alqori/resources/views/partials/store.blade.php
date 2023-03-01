 <!--@can('list_student_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-id-card-alt">
                    

                    </i>
                    <span>{{ trans('global.liststudent') }}</span>
                  

                </a>
            </li>
            @endcan
            @can('studentdetails_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-id-card-alt">
                    

                    </i>
                    <span>{{ trans('global.studentdetails') }}</span>
                  

                </a>
            </li>
            @endcan
            @can('studentachievement_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-layer-group">
                 
                    

                    </i>
                    <span>{{ trans('global.studentachievement') }}</span>
                  

                </a>
            </li>
            @endcan
            @can('teacherprofile_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-user-tie">
                 
                    

                    </i>
                    <span>{{ trans('global.teacherprofile') }}</span>
                  

                </a>
            </li>
            @endcan-->