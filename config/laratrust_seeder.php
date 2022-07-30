<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'admins' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'coupons' => 'c,r,u,d',
            'brands' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'banners' => 'c,r,u,d',
            'orders' => 'r,d',
            'cmsPages' => 'c,r,u,d',
         ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
