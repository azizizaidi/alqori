<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'student_create',
            ],
            [
                'id'    => 18,
                'title' => 'student_edit',
            ],
            [
                'id'    => 19,
                'title' => 'student_show',
            ],
            [
                'id'    => 20,
                'title' => 'student_delete',
            ],
            [
                'id'    => 21,
                'title' => 'student_access',
            ],
            [
                'id'    => 22,
                'title' => 'teacher_management_access',
            ],
            [
                'id'    => 23,
                'title' => 'teacher_create',
            ],
            [
                'id'    => 24,
                'title' => 'teacher_edit',
            ],
            [
                'id'    => 25,
                'title' => 'teacher_show',
            ],
            [
                'id'    => 26,
                'title' => 'teacher_delete',
            ],
            [
                'id'    => 27,
                'title' => 'teacher_access',
            ],
            [
                'id'    => 28,
                'title' => 'class_management_access',
            ],
            [
                'id'    => 29,
                'title' => 'class_type_create',
            ],
            [
                'id'    => 30,
                'title' => 'class_type_edit',
            ],
            [
                'id'    => 31,
                'title' => 'class_type_show',
            ],
            [
                'id'    => 32,
                'title' => 'class_type_delete',
            ],
            [
                'id'    => 33,
                'title' => 'class_type_access',
            ],
            [
                'id'    => 34,
                'title' => 'class_name_create',
            ],
            [
                'id'    => 35,
                'title' => 'class_name_edit',
            ],
            [
                'id'    => 36,
                'title' => 'class_name_show',
            ],
            [
                'id'    => 37,
                'title' => 'class_name_delete',
            ],
            [
                'id'    => 38,
                'title' => 'class_name_access',
            ],
            [
                'id'    => 39,
                'title' => 'class_package_create',
            ],
            [
                'id'    => 40,
                'title' => 'class_package_edit',
            ],
            [
                'id'    => 41,
                'title' => 'class_package_show',
            ],
            [
                'id'    => 42,
                'title' => 'class_package_delete',
            ],
            [
                'id'    => 43,
                'title' => 'class_package_access',
            ],
            [
                'id'    => 44,
                'title' => 'class_number_create',
            ],
            [
                'id'    => 45,
                'title' => 'class_number_edit',
            ],
            [
                'id'    => 46,
                'title' => 'class_number_show',
            ],
            [
                'id'    => 47,
                'title' => 'class_number_delete',
            ],
            [
                'id'    => 48,
                'title' => 'class_number_access',
            ],
            [
                'id'    => 49,
                'title' => 'regist_student_management_access',
            ],
            [
                'id'    => 50,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 51,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 52,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 53,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 54,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 55,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 56,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 57,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 58,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 59,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 60,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 61,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 62,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 63,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 64,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 65,
                'title' => 'task_create',
            ],
            [
                'id'    => 66,
                'title' => 'task_edit',
            ],
            [
                'id'    => 67,
                'title' => 'task_show',
            ],
            [
                'id'    => 68,
                'title' => 'task_delete',
            ],
            [
                'id'    => 69,
                'title' => 'task_access',
            ],
            [
                'id'    => 70,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 71,
                'title' => 'registrar_create',
            ],
            [
                'id'    => 72,
                'title' => 'registrar_edit',
            ],
            [
                'id'    => 73,
                'title' => 'registrar_show',
            ],
            [
                'id'    => 74,
                'title' => 'registrar_delete',
            ],
            [
                'id'    => 75,
                'title' => 'registrar_access',
            ],
            [
                'id'    => 76,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 77,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 78,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 79,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 80,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 81,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 82,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 83,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 84,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 85,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 86,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 87,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 88,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 89,
                'title' => 'expense_create',
            ],
            [
                'id'    => 90,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 91,
                'title' => 'expense_show',
            ],
            [
                'id'    => 92,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 93,
                'title' => 'expense_access',
            ],
            [
                'id'    => 94,
                'title' => 'income_create',
            ],
            [
                'id'    => 95,
                'title' => 'income_edit',
            ],
            [
                'id'    => 96,
                'title' => 'income_show',
            ],
            [
                'id'    => 97,
                'title' => 'income_delete',
            ],
            [
                'id'    => 98,
                'title' => 'income_access',
            ],
            [
                'id'    => 99,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 100,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 101,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 102,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 103,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 104,
                'title' => 'fee_management_access',
            ],
            [
                'id'    => 105,
                'title' => 'fee_create',
            ],
            [
                'id'    => 106,
                'title' => 'fee_edit',
            ],
            [
                'id'    => 107,
                'title' => 'fee_show',
            ],
            [
                'id'    => 108,
                'title' => 'fee_delete',
            ],
            [
                'id'    => 109,
                'title' => 'fee_access',
            ],
            [
                'id'    => 110,
                'title' => 'report_management_access',
            ],
            [
                'id'    => 111,
                'title' => 'register_class_create',
            ],
            [
                'id'    => 112,
                'title' => 'register_class_edit',
            ],
            [
                'id'    => 113,
                'title' => 'register_class_show',
            ],
            [
                'id'    => 114,
                'title' => 'register_class_delete',
            ],
            [
                'id'    => 115,
                'title' => 'register_class_access',
            ],
            [
                'id'    => 116,
                'title' => 'assign_class_teacher_create',
            ],
            [
                'id'    => 117,
                'title' => 'assign_class_teacher_edit',
            ],
            [
                'id'    => 118,
                'title' => 'assign_class_teacher_show',
            ],
            [
                'id'    => 119,
                'title' => 'assign_class_teacher_delete',
            ],
            [
                'id'    => 120,
                'title' => 'assign_class_teacher_access',
            ],
            [
                'id'    => 121,
                'title' => 'stdnt_rgstr_create',
            ],
            [
                'id'    => 122,
                'title' => 'stdnt_rgstr_edit',
            ],
            [
                'id'    => 123,
                'title' => 'stdnt_rgstr_show',
            ],
            [
                'id'    => 124,
                'title' => 'stdnt_rgstr_delete',
            ],
            [
                'id'    => 125,
                'title' => 'stdnt_rgstr_access',
            ],
            [
                'id'    => 126,
                'title' => 'report_class_create',
            ],
            [
                'id'    => 127,
                'title' => 'report_class_edit',
            ],
            [
                'id'    => 128,
                'title' => 'report_class_show',
            ],
            [
                'id'    => 129,
                'title' => 'report_class_delete',
            ],
            [
                'id'    => 130,
                'title' => 'report_class_access',
            ],
            [
                'id'    => 131,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 132,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 133,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 134,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 135,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 136,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
