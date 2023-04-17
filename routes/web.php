<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::post('permissions/parse-csv-import', 'PermissionsController@parseCsvImport')->name('permissions.parseCsvImport');
    Route::post('permissions/process-csv-import', 'PermissionsController@processCsvImport')->name('permissions.processCsvImport');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/parse-csv-import', 'RolesController@parseCsvImport')->name('roles.parseCsvImport');
    Route::post('roles/process-csv-import', 'RolesController@processCsvImport')->name('roles.processCsvImport');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Student
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::post('students/parse-csv-import', 'StudentController@parseCsvImport')->name('students.parseCsvImport');
    Route::post('students/process-csv-import', 'StudentController@processCsvImport')->name('students.processCsvImport');
    Route::resource('students', 'StudentController');

    // Teacher
    Route::delete('teachers/destroy', 'TeacherController@massDestroy')->name('teachers.massDestroy');
    Route::post('teachers/media', 'TeacherController@storeMedia')->name('teachers.storeMedia');
    Route::post('teachers/ckmedia', 'TeacherController@storeCKEditorImages')->name('teachers.storeCKEditorImages');
    Route::post('teachers/parse-csv-import', 'TeacherController@parseCsvImport')->name('teachers.parseCsvImport');
    Route::post('teachers/process-csv-import', 'TeacherController@processCsvImport')->name('teachers.processCsvImport');
    Route::resource('teachers', 'TeacherController');

    // Class Type
    Route::delete('class-types/destroy', 'ClassTypeController@massDestroy')->name('class-types.massDestroy');
    Route::post('class-types/parse-csv-import', 'ClassTypeController@parseCsvImport')->name('class-types.parseCsvImport');
    Route::post('class-types/process-csv-import', 'ClassTypeController@processCsvImport')->name('class-types.processCsvImport');
    Route::resource('class-types', 'ClassTypeController');

    // Class Name
    Route::delete('class-names/destroy', 'ClassNameController@massDestroy')->name('class-names.massDestroy');
    Route::post('class-names/parse-csv-import', 'ClassNameController@parseCsvImport')->name('class-names.parseCsvImport');
    Route::post('class-names/process-csv-import', 'ClassNameController@processCsvImport')->name('class-names.processCsvImport');
    Route::resource('class-names', 'ClassNameController');

    // Class Package
    Route::delete('class-packages/destroy', 'ClassPackageController@massDestroy')->name('class-packages.massDestroy');
    Route::post('class-packages/parse-csv-import', 'ClassPackageController@parseCsvImport')->name('class-packages.parseCsvImport');
    Route::post('class-packages/process-csv-import', 'ClassPackageController@processCsvImport')->name('class-packages.processCsvImport');
    Route::resource('class-packages', 'ClassPackageController');

    // Class Number
    Route::delete('class-numbers/destroy', 'ClassNumberController@massDestroy')->name('class-numbers.massDestroy');
    Route::post('class-numbers/parse-csv-import', 'ClassNumberController@parseCsvImport')->name('class-numbers.parseCsvImport');
    Route::post('class-numbers/process-csv-import', 'ClassNumberController@processCsvImport')->name('class-numbers.processCsvImport');
    Route::resource('class-numbers', 'ClassNumberController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);
    
     // Claim
    //Route::delete('claim/destroy', 'ClaimController@massDestroy')->name('claim.massDestroy');
    
    Route::resource('claim', 'ClaimController');
    
    // Debt
     Route::get('debt/pay{debt}', 'DebtController@payDebt')->name('debt.pay');
    Route::resource('debt', 'DebtController');

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Registrar
    Route::delete('registrars/destroy', 'RegistrarController@massDestroy')->name('registrars.massDestroy');
    Route::post('registrars/parse-csv-import', 'RegistrarController@parseCsvImport')->name('registrars.parseCsvImport');
    Route::post('registrars/process-csv-import', 'RegistrarController@processCsvImport')->name('registrars.processCsvImport');
    Route::resource('registrars', 'RegistrarController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Fee
    Route::delete('fees/destroy', 'FeeController@massDestroy')->name('fees.massDestroy');
    Route::resource('fees', 'FeeController');

    // Register Class
    Route::delete('register-classes/destroy', 'RegisterClassController@massDestroy')->name('register-classes.massDestroy');
    Route::post('register-classes/parse-csv-import', 'RegisterClassController@parseCsvImport')->name('register-classes.parseCsvImport');
    Route::post('register-classes/process-csv-import', 'RegisterClassController@processCsvImport')->name('register-classes.processCsvImport');
    Route::resource('register-classes', 'RegisterClassController');

    // Assign Class Teacher
    Route::delete('assign-class-teachers/destroy', 'AssignClassTeacherController@massDestroy')->name('assign-class-teachers.massDestroy');
    Route::post('assign-class-teachers/parse-csv-import', 'AssignClassTeacherController@parseCsvImport')->name('assign-class-teachers.parseCsvImport');
    Route::post('assign-class-teachers/process-csv-import', 'AssignClassTeacherController@processCsvImport')->name('assign-class-teachers.processCsvImport');
    Route::resource('assign-class-teachers', 'AssignClassTeacherController');

    // Stdnt Rgstr
    Route::delete('stdnt-rgstrs/destroy', 'StdntRgstrController@massDestroy')->name('stdnt-rgstrs.massDestroy');
    Route::post('stdnt-rgstrs/parse-csv-import', 'StdntRgstrController@parseCsvImport')->name('stdnt-rgstrs.parseCsvImport');
    Route::post('stdnt-rgstrs/process-csv-import', 'StdntRgstrController@processCsvImport')->name('stdnt-rgstrs.processCsvImport');
    Route::resource('stdnt-rgstrs', 'StdntRgstrController');

    // Report Class
    Route::get('report-classes/index-student', 'ReportClassController@indexstudent')->name('report-classes.index-student');
    Route::get('report-classes/showinvoice/{reportClass}', 'ReportClassController@showinvoice')->name('report-classes.showinvoice');
    Route::get('report-classes/payment-page/{reportClass}', 'ReportClassController@paymentPage')->name('report-classes.paymentpage');
    
    //admin.allowance
    Route::get('report-classes/allowance', 'ReportClassController@allowance')->name('report-classes.allowance');
    Route::get('report-classes/editallowance/{teacher}', 'ReportClassController@editallowance')->name('edit_allowance');
    Route::put('report-classes/updateallowance/{teacher}', 'ReportClassController@updateallowance')->name('update_allowance');
    
    Route::delete('report-classes/destroy', 'ReportClassController@massDestroy')->name('report-classes.massDestroy');
    Route::post('report-classes/parse-csv-import', 'ReportClassController@parseCsvImport')->name('report-classes.parseCsvImport');
    Route::post('report-classes/process-csv-import', 'ReportClassController@processCsvImport')->name('report-classes.processCsvImport');
   // Route::get('report-classes/getregistrar/{id}','ReportClassController@getRegistrar');
    Route::get('report-classes/getclass/{id}','ReportClassController@getClass');
    Route::resource('report-classes', 'ReportClassController');

    //Report Card
    Route::delete('report-card/destroy', 'ReportCardController@massDestroy')->name('report-card.massDestroy');
    Route::post('report-card/parse-csv-import', 'ReportCardController@parseCsvImport')->name('report-card.parseCsvImport');
    Route::post('report-card/process-csv-import', 'ReportCardController@processCsvImport')->name('report-card.processCsvImport');
    Route::resource('report-card', 'ReportCardController');
    

    // Invoice
    //Route::delete('invoices/destroy', 'InvoiceController@massDestroy')->name('invoices.massDestroy');
    //Route::post('invoices/parse-csv-import', 'InvoiceController@parseCsvImport')->name('invoices.parseCsvImport');
    //Route::post('invoices/process-csv-import', 'InvoiceController@processCsvImport')->name('invoices.processCsvImport');
    //Route::resource('invoices', 'InvoiceController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');

    //toyyibpay
  
    Route::get('toyyibpay/createbill/{reportClass}', 'ReportClassController@createBill')->name('toyyibpay.createBill');

    //Route::get('toyyibpay/createbill/{reportClass}', 'ReportClassController@createBill')->name('toyyibpay.createBill');
    //Route::get('create-bill-with-sum/{ids}/{sum}', 'ReportClassController@createBill')->name('toyyibpay.createBillWithSum');
    Route::get('toyyibpay/paymentstatus/{reportClass}', 'ReportClassController@paymentStatus')->name('toyyibpay.paymentstatus');
    Route::get('toyyibpay/callback', 'ReportClassController@callback')->name('toyyibpay.callback');



    //pdfinvoice
    Route::get('pdfinvoice', 'pdfInvoiceController@index')->name('pdfinvoice.index');

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


