<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('teacher_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/teachers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.teacherManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('teacher_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teachers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teachers") || request()->is("admin/teachers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chalkboard-teacher c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.teacher.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('class_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/class-types*") ? "c-show" : "" }} {{ request()->is("admin/class-names*") ? "c-show" : "" }} {{ request()->is("admin/class-packages*") ? "c-show" : "" }} {{ request()->is("admin/class-numbers*") ? "c-show" : "" }} {{ request()->is("admin/register-classes*") ? "c-show" : "" }} {{ request()->is("admin/assign-class-teachers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-bezier-curve c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.classManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('class_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.class-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/class-types") || request()->is("admin/class-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-receipt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.classType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('class_name_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.class-names.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/class-names") || request()->is("admin/class-names/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.className.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('class_package_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.class-packages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/class-packages") || request()->is("admin/class-packages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.classPackage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('class_number_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.class-numbers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/class-numbers") || request()->is("admin/class-numbers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list-ol c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.classNumber.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('register_class_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.register-classes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/register-classes") || request()->is("admin/register-classes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-coins c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.registerClass.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('assign_class_teacher_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assign-class-teachers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assign-class-teachers") || request()->is("admin/assign-class-teachers/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-window-restore c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assignClassTeacher.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('regist_student_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/students*") ? "c-show" : "" }} {{ request()->is("admin/registrars*") ? "c-show" : "" }} {{ request()->is("admin/stdnt-rgstrs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.registStudentManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('student_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.students.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/students") || request()->is("admin/students/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.student.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('registrar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.registrars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/registrars") || request()->is("admin/registrars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-shield c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.registrar.title') }}
                            </a>
                        </li>
                    @endcan
                   <!-- @can('stdnt_rgstr_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stdnt-rgstrs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stdnt-rgstrs") || request()->is("admin/stdnt-rgstrs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stdntRgstr.title') }}
                            </a>
                        </li>
                    @endcan-->
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
         @can('claim_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.claim.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/claim") || request()->is("admin/claim/*") ? "c-active" : "" }}">
                    <i class="fa-fw fa fa-paper-plane c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.claim.title') }}
                </a>
            </li>
        @endcan
         
         @can('debt_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.debt.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/debt") || request()->is("admin/debt/*") ? "c-active" : "" }}">
                    <i class="fa-fw fa fa-credit-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.debt.title') }}
                </a>
            </li>
        @endcan
        @can('task_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/task-statuses*") ? "c-show" : "" }} {{ request()->is("admin/task-tags*") ? "c-show" : "" }} {{ request()->is("admin/tasks*") ? "c-show" : "" }} {{ request()->is("admin/tasks-calendars*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.taskManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('task_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.task.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tasks_calendar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks-calendars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tasksCalendar.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('expense_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/expense-categories*") ? "c-show" : "" }} {{ request()->is("admin/income-categories*") ? "c-show" : "" }} {{ request()->is("admin/expenses*") ? "c-show" : "" }} {{ request()->is("admin/incomes*") ? "c-show" : "" }} {{ request()->is("admin/expense-reports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-money-bill c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.expenseManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('expense_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expense-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expenseCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.income-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.incomeCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expenses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expense.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.incomes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.income.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expense-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expenseReport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('fee_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/fees*") ? "c-show" : "" }} {{ request()->is("admin/invoices*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.feeManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <!--@can('fee_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.fees.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/fees") || request()->is("admin/fees/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-money-bill-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.fee.title') }}
                            </a>
                        </li>
                    @endcan-->
                    @can('report_class_student')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.report-classes.index-student") }}" class="c-sidebar-nav-link {{ request()->is("admin/report-classes/index-student") || request()->is("admin/report-classes/index-student") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.fee.title') }}
                            </a>
                        </li>
                    @endcan
                   
                </ul>
            </li>
        @endcan
        @can('report_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/report-classes*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reportManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('report_class_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.report-classes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/report-classes") || request()->is("admin/report-classes") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reportClass.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('allowance_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.report-classes.allowance") }}" class="c-sidebar-nav-link {{ request()->is("admin/report-classes/allowance") || request()->is("admin/report-classes/allowance") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.allowance.title') }}
                            </a>
                        </li>
                    @endcan
                   
                   <!-- @can('report_card_access')
                    <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.report-card.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/report-classes/index-student") || request()->is("admin/report-classes/index-student") ? "c-active" : "" }}">
                                <i class="fab fa-audible c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ReportCard.title') }}
                            </a>
                        </li>
                     @endcan   -->
                </ul>
            </li>
        @endcan
         
            
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>