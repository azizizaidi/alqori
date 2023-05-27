<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'id Login',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'code'                 => 'Code',
            'code_helper'          => ' ',
              'phone'                 => 'Phone',
            'phone_helper'          => ' ',
        ],
    ],
    'student' => [
        'title'          => 'Student',
        'title_singular' => 'Student',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'student'           => 'Student',
            'student_helper'    => ' ',
            'registrar'           => 'Registrar',
            'registrar_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'code'              => 'Code',
            'code_helper'       => ' ',
            'age_stage'         => 'Age Stage',
            'age_stage_helper'  => ' ',
            'notes'             => 'Notes',
            'note_helper'       => ' ',
        ],
    ],
    'teacherManagement' => [
        'title'          => 'Teacher Management',
        'title_singular' => 'Teacher Management',
    ],
    'teacher' => [
        'title'          => 'Teacher',
        'title_singular' => 'Teacher',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'teacher'             => 'Teacher',
            'teacher_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'code'                => 'Code',
            'code_helper'         => ' ',
            'phone'               => 'Phone',
            'phone_helper'        => ' ',
            'address'             => 'Address',
            'address_helper'      => ' ',
            'position'            => 'Position',
            'position_helper'     => ' ',
            'sex'                 => 'Sex',
            'sex_helper'          => ' ',
            'resume'              => 'Resume',
            'resume_helper'       => ' ',
            'bank_name'           => 'Bank Name',
            'bank_name_helper'    => ' ',
            'account_bank'        => 'Account Bank',
            'account_bank_helper' => ' ',
        ],
    ],
    'classManagement' => [
        'title'          => 'Class Management',
        'title_singular' => 'Class Management',
    ],
    'classType' => [
        'title'          => 'Class Type',
        'title_singular' => 'Class Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'className' => [
        'title'          => 'Class Name',
        'title_singular' => 'Class Name',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'feeperhour'        => 'Fee',
            'feeperhour_helper' => ' ',
            'allowanceperhour'  => 'Allowance',
      'allowanceperhour_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'classPackage' => [
        'title'          => 'Class Package',
        'title_singular' => 'Class Package',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'batch'              => 'Batch',
            'batch_helper'       => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'classNumber' => [
        'title'          => 'Class Number',
        'title_singular' => 'Class Number',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'registStudentManagement' => [
        'title'          => 'Registrar Student',
        'title_singular' => 'Registrar Student',
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
        
        
    ],
    
     'claim' => [
        'title'          => 'Claim',
        'title_singular' => 'Claim',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'amount'            => 'Amount',
            'amount_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
        
        
    ],
    
      'debt' => [
        'title'          => 'Debt',
        'title_singular' => 'Debt',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'description'             => 'Description',
            'description_helper'      => ' ',
            'amount'            => 'Amount',
            'amount_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
        
        
    ],
    
    'taskManagement' => [
        'title'          => 'Task management',
        'title_singular' => 'Task management',
    ],
    'taskStatus' => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'taskTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'task' => [
        'title'          => 'Tasks',
        'title_singular' => 'Task',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'attachment'         => 'Attachment',
            'attachment_helper'  => ' ',
            'due_date'           => 'Due date',
            'due_date_helper'    => ' ',
            'assigned_to'        => 'Assigned to',
            'assigned_to_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'tasksCalendar' => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'registrar' => [
        'title'          => 'Registrar',
        'title_singular' => 'Registrar',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'code'              => 'Code',
            'code_helper'       => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'registrar'         => 'Registrar',
            'registrar_helper'  => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'expenseManagement' => [
        'title'          => 'Expense Management',
        'title_singular' => 'Expense Management',
    ],
    'expenseCategory' => [
        'title'          => 'Expense Categories',
        'title_singular' => 'Expense Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'incomeCategory' => [
        'title'          => 'Income categories',
        'title_singular' => 'Income Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'expense' => [
        'title'          => 'Expenses',
        'title_singular' => 'Expense',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'expense_category'        => 'Expense Category',
            'expense_category_helper' => ' ',
            'entry_date'              => 'Entry Date',
            'entry_date_helper'       => ' ',
            'amount'                  => 'Amount',
            'amount_helper'           => ' ',
            'description'             => 'Description',
            'description_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'income' => [
        'title'          => 'Income',
        'title_singular' => 'Income',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'income_category'        => 'Income Category',
            'income_category_helper' => ' ',
            'entry_date'             => 'Entry Date',
            'entry_date_helper'      => ' ',
            'amount'                 => 'Amount',
            'amount_helper'          => ' ',
            'description'            => 'Description',
            'description_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'expenseReport' => [
        'title'          => 'Monthly report',
        'title_singular' => 'Monthly report',
        'reports'        => [
            'title'             => 'Reports',
            'title_singular'    => 'Report',
            'incomeReport'      => 'Incomes report',
            'incomeByCategory'  => 'Income by category',
            'expenseByCategory' => 'Expense by category',
            'income'            => 'Income',
            'expense'           => 'Expense',
            'profit'            => 'Profit',
        ],
    ],
    'feeManagement' => [
        'title'          => 'Fee Management',
        'title_singular' => 'Fee Management',

    ],
    'claim' => [
        'title'          => 'Claim ',
        'title_singular' => 'Claim',
    ],
    'fee' => [
        'title'          => 'Fee',
        'title_singular' => 'Fee',
    ],
    'reportManagement' => [
        'title'          => 'Report Management',
        'title_singular' => 'Report Management',
    ],
    'registerClass' => [
        'title'          => 'Register Class',
        'title_singular' => 'Register Class',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'class_type'           => 'Class Type',
            'class_type_helper'    => ' ',
            'class_name'           => 'Class Name',
            'class_name_helper'    => ' ',
            'class_package'        => 'Class Package',
            'class_package_helper' => ' ',
            'class_numer'          => 'Class Numer',
            'class_numer_helper'   => ' ',
            'code_class'           => 'Code Class',
            'code_class_helper'    => ' ',
           
        ],
    ],
    'assignClassTeacher' => [
        'title'          => 'Assign Class Teacher',
        'title_singular' => 'Assign Class Teacher',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'teacher'             => 'Teacher',
            'teacher_helper'      => ' ',
            'student'             => 'Student',
            'student_helper'      => ' ',
            'class'               => 'Class',
            'class_helper'        => ' ',
            'teacher_code'        => 'Teacher Code',
            'teacher_code_helper' => ' ',
            'student_code'        => 'Student Code',
            'student_code_helper' => ' ',
        ],
    ],
    'stdntRgstr' => [
        'title'          => 'Stdnt Rgstr',
        'title_singular' => 'Stdnt Rgstr',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'registrar'         => 'Registrar',
            'registrar_helper'  => ' ',
            'student'           => 'Student',
            'student_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'reportClass' => [
        'title'          => 'Report Class',
        'title_singular' => 'Report Class',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'teacher'           => 'Teacher',
            'teacher_helper'    => ' ',
            'student_achievement'           => 'Student Achievement',
            'student_achievement_helper'    => ' ',
            'student_achievement_2'           => 'Student Achievement(2)',
            'student_achievement_2_helper'    => ' ',
            'registrar'           => 'Registrar',
            'registrar_helper'    => ' ',
            'classname'           => 'Class Name',
            'classname_helper'    => ' ',
            'classname_2'           => 'Class Name(2)',
            'classname_2_helper'    => ' ',
            'date'              => 'Date',
            'date_helper'       => ' ',
            'date_2'              => 'Date(2)',
            'date_2_helper'       => ' ',
            'total_hour'        => 'Total Hour',
            'total_hour_helper' => ' ',
            'total_hour_2'        => 'Total Hour(2)',
            'total_hour_2_helper' => ' ',
            'total_fee'        => 'Total Fee',
            'total_fee_helper' => ' ',
            'class'           => 'Class',
            'class_helper'    => ' ',
            'allowance'        => 'Allowance',
            'allowance_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
            'fee_student'        => 'Fee',
            'fee_student_helper' => ' ',
             'note'              => 'Note',
            'note_helper'        => ' ',
            'allowance_note'     => 'Allowance Note',
            'allowance_note_helper'    => ' ',
               'status'        => 'Status',
            'status_helper' => ' ',
            'month'         => 'Month',
            'month_helper'  => ' ',
             'phone'         => 'Phone',
            'phone_helper'  => ' ',
        ],
    ],
    'invoiceStudent' => [
        'title'          => 'Invoice Student',
        'title_singular' => 'Invoice Student',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'teacher'           => 'Teacher',
            'teacher_helper'    => ' ',
            'student'           => 'Student',
            'student_helper'    => ' ',
            'date'              => 'Date',
            'date_helper'       => ' ',
            'total_hour'        => 'Total Hour',
            'total_hour_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'invoice' => [
        'title'          => 'Invoice',
        'title_singular' => 'Invoice',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'student'            => 'Student',
            'student_helper'     => ' ',
            'registrar'          => 'Registrar',
            'registrar_helper'   => ' ',
            'teacher'            => 'Teacher',
            'teacher_helper'     => ' ',
            'class'              => 'Class',
            'class_helper'       => ' ',
            'total_hour'         => 'Total Hour',
            'total_hour_helper'  => ' ',
            'amount_fee'         => 'Amount Fee',
            'amount_fee_helper'  => ' ',
            'date_class'         => 'Date Class',
            'date_class_helper'  => ' ',
            'fee_perhour'        => 'Fee Perhour',
            'fee_perhour_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'ReportCard' => [
        'title'          => 'Report Card ',
        'title_singular' => 'Report Card',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'teacher'           => 'Teacher',
            'teacher_helper'    => ' ',
            'student'           => 'Student',
            'student_helper'    => ' ',
            'date'              => 'Date',
            'date_helper'       => ' ',
            'subject'           => 'Subject',
            'subject_helper'    => ' ',
            'desc'              => 'Description',
            'desc_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'feepay' => [
        'title'          => 'Manual Transaction ',
        'title_singular' => 'Manual Transaction',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'payer'             => 'Payer',
            'payer_helper'      => ' ',
            'image'             => 'Image',
            'subject_helper'    => ' ',
            'ref'               => 'Reference',
            'ref_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

    'allowance' => [
        'title'          => 'Allowance',
        'title_singular' => 'Allowance',
    ],

    'registrarbyteacher' => [
        'title'          => 'Class Info',
        'title_singular' => 'Class Info',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'registrar'            => 'Registrar',
            'registrar_helper'     => ' ',
            'classname'          => 'Classname',
            'classname_helper'   => ' ',
            'allowanceperhour'            => 'Allowance per Hour',
            'allowanceperhour_helper'     => ' ',
            'total_allowance'            => 'Total Allowance',
            'total_allowance_helper'     => ' ',
            'class'              => 'Class',
            'class_helper'       => ' ',
            'total_hour'         => 'Total Hour',
            'total_hour_helper'  => ' ',
            'amount_fee'         => 'Amount Fee',
            'amount_fee_helper'  => ' ',
            'date_class'         => 'Date Class',
            'date_class_helper'  => ' ',
            'fee_perhour'        => 'Fee Perhour',
            'fee_perhour_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
];
