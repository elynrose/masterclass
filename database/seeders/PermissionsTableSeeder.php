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
                'title' => 'landing_page_create',
            ],
            [
                'id'    => 18,
                'title' => 'landing_page_edit',
            ],
            [
                'id'    => 19,
                'title' => 'landing_page_show',
            ],
            [
                'id'    => 20,
                'title' => 'landing_page_delete',
            ],
            [
                'id'    => 21,
                'title' => 'landing_page_access',
            ],
            [
                'id'    => 22,
                'title' => 'subscriber_create',
            ],
            [
                'id'    => 23,
                'title' => 'subscriber_edit',
            ],
            [
                'id'    => 24,
                'title' => 'subscriber_show',
            ],
            [
                'id'    => 25,
                'title' => 'subscriber_delete',
            ],
            [
                'id'    => 26,
                'title' => 'subscriber_access',
            ],
            [
                'id'    => 27,
                'title' => 'session_create',
            ],
            [
                'id'    => 28,
                'title' => 'session_edit',
            ],
            [
                'id'    => 29,
                'title' => 'session_show',
            ],
            [
                'id'    => 30,
                'title' => 'session_delete',
            ],
            [
                'id'    => 31,
                'title' => 'session_access',
            ],
            [
                'id'    => 32,
                'title' => 'attendee_create',
            ],
            [
                'id'    => 33,
                'title' => 'attendee_edit',
            ],
            [
                'id'    => 34,
                'title' => 'attendee_show',
            ],
            [
                'id'    => 35,
                'title' => 'attendee_delete',
            ],
            [
                'id'    => 36,
                'title' => 'attendee_access',
            ],
            [
                'id'    => 37,
                'title' => 'email_create',
            ],
            [
                'id'    => 38,
                'title' => 'email_edit',
            ],
            [
                'id'    => 39,
                'title' => 'email_show',
            ],
            [
                'id'    => 40,
                'title' => 'email_delete',
            ],
            [
                'id'    => 41,
                'title' => 'email_access',
            ],
            [
                'id'    => 42,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 43,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 44,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 45,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 46,
                'title' => 'payment_create',
            ],
            [
                'id'    => 47,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 48,
                'title' => 'payment_show',
            ],
            [
                'id'    => 49,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 50,
                'title' => 'payment_access',
            ],
            [
                'id'    => 51,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
