<?php

$real_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR;

$absolute_path = 'http://localhost:81/truffle-pan/assets/';

return [
    'real_backup_db_path' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'backup' . DIRECTORY_SEPARATOR,
    'system'            => 'Truffle',
    'domain'            => 'http://localhost:81/truffle-pan/',
    'admin_email'       => 'test_email@gmail.com', /*email address to whom close day report is to be send*/
    'from_email'        => 'test_email@gmail.com', /*email address from whom close day report is to be send*/
    'db_name'           => 'truffle_pan',
    'database_log_db_name'  => 'truffle_pan_online_database_log',
    'password_for_db_recovery' => 'pScE4yAj',
    'report_path'       => $absolute_path . 'reports/',
    'version'           => 'order',  /* for version 1 => order , for version 3 => order/version-three */
    'retail_version'    => 'retail', /* for version 1 => retail, for version 3 => retail/version-three */
    'take_away_version' => 'take-away', /* for version 1 => take-away , for version 3 => take-away/version-three */
    'pick_up_version'   => 'pick-up', /* for version 1 => pick-up , for version 3 => pick-up/version-three */
    'delivery_version'  => 'delivery', /* for version 1 => delivery , for version 3 => delivery/version-three */
    'allowed_number_of_users' => 10,
    'email_config' => array(
        'username'      =>  '',
        'password'      =>  '', 
        'from'          =>  'truffle@gmail.com',
        'name'          =>  'Truffle',
    ), 
    'user_role' => array(
        'superadmin'        =>  '5VmLKVrUUGUPgnXEp9IuqaVdk7pXQxXK',
        'admin'             =>  'kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h',
        'staff'             =>  '1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7',
        'floor_supervisor'  =>  'naQhEJ9I1yLYtN1ppQF6YtN1ppQF6asd'
    ), 
    'role_user'  => array(
        '5VmLKVrUUGUPgnXEp9IuqaVdk7pXQxXK'  =>  'superadmin',
        'kAdzZNRkmZu6RbNfz3L4fTEdtfrWWb6h'  =>  'admin',
        '1P863mId6OnFEhCCD9zdkH9O5n7h6Kj7'  =>  'staff',
        'naQhEJ9I1yLYtN1ppQF6YtN1ppQF6asd' => 'floor_supervisor' 
    ),
    'upload_path'   => array(
        'upload'            => $real_path . 'uploads' . DIRECTORY_SEPARATOR,
        'menu'              => $real_path . 'uploads' . DIRECTORY_SEPARATOR,
        'profile-picture'   => $real_path . 'profile-picture' . DIRECTORY_SEPARATOR,
        'invoice'           => $real_path . 'invoice' . DIRECTORY_SEPARATOR,
        'shell'             => $real_path . 'shell' . DIRECTORY_SEPARATOR,
        'reports'           => $real_path . 'reports' . DIRECTORY_SEPARATOR,
        'xml'               => $real_path . 'xml' . DIRECTORY_SEPARATOR,
        'text'              => $real_path . 'text' . DIRECTORY_SEPARATOR,
        'csv'              => $real_path . 'csv' . DIRECTORY_SEPARATOR,
        'pdf'               => $real_path . 'pdf' . DIRECTORY_SEPARATOR,
    ),
    'upload_load_path' => array(
        'image'             => $absolute_path . 'images/',
        'upload'            => $absolute_path . 'uploads/',
        'menu'              => $absolute_path . 'uploads/',
        'profile-picture'   => $absolute_path . 'profile-picture/',
        'invoice'           => $absolute_path . 'invoice/',
        'reports'           => $absolute_path . 'reports/',
        'xml'               => $absolute_path . 'xml/',
        'text'              => $absolute_path . 'text/',
        'csv'              => $absolute_path . 'csv/',
        'pdf'               => $absolute_path . 'pdf/',
    ),
    'table-type'       => array (
        0 => 'square', // default
        1 => 'square',
        2 => 'rectangle',
        3 => 'circle'
    ),
    'table-status'    => array(
        0 => 'empty',
        1 => 'occupied',
        2 => 'booked'
    ),
    'type-color' => array (
        0 => '#5f3417', // default
        1 => '#5f3417',
        2 => '#5f3417',
        3 => '#5f3417',
        4 => '#5f3417',
        5 => '#5f3417',

    ),
    'type-color-1' => array (
        0 => '#6f4e37', // default
        1 => '#9c593f',
        2 => '#a0522d',
        3 => '#844d16',
        4 => '#8b4513',
        5 => '#c35e2d',

    ),
    'numbering' => array(
        0 => 'ground',
        1 => 'first',
        2 => 'second',
        3 => 'third',
        4 => 'fourth',
        5 => 'fifth',
        6 => 'sixth',
        7 => 'seventh',
        8 => 'eighth',
        9 => 'ninth',
        10 => 'tenth',
        11 => 'eleventh',
        12 => 'twelfth',
        13 => 'thirteenth',
        14 => 'fourteenth',
        15 => 'fifteenth',
        16 => 'sixteenth',
        17 => 'seventeenth',
        18 => 'eighteenth',
        19 => 'ninteenth',
        20 => 'twentieth'
    ),
    'order_type' => array(
        'table_order'       => 0,
        'take_away'         => 1,
        'delivery'          => 2,
        'delivery_charge'   => 3,
        'pick_up'           => 4,
        'retail'            => 5
    ),
    'payment_type' => array(
        'cash'   => 0,
        'credit' => 1,
        'card'   => 2
    ),
    'debtor_payment_type' => array(
        'cash'   => 0,
        'cheque' => 1,
        'card'   => 2
    ),
    'occupy_type' => array(
        'normal'    => 0,
        'booked'    => 1
    ),
    'break_down_payment_type' => array(
        'advance'        => 1,
        'item_wise'      => 2,
        'cash_receipt'   => 3,
        'credit_receipt' => 4,
        'delivery_charge_cash_receipt' => 5,
        'delivery_charge_credit_receipt' => 6
    ),
    'is_credit_paid' => array(
        'yes'   => 1,
        'no'    => 0
    ),
    'is_payment_return' => array(
        'yes'   => 1,
        'no'    => 0
    ),
    'tip' => array(
        'received'      => 0,
        'distributed'   => 1
    ),
    'bio_pdf_drive' => 'C',
    'shell_drive'   => 'C', // drive of shell
    'db_backup_real_path'       => 'D:\truffle_db_backup',
    'db_backup_absolute_path'   => 'D:/truffle_db_backup/',
    'is_foc' => array(
        'yes' => 1,
        'no'  => 0
    ),
    'delivery_confirmation' => array(
        'done_nothing' => 0,
        'confirm' => 1,
        'cancel'  => 2
    ),
    'retail_confirmation' => array(
        'done_nothing' => 0,
        'confirm' => 1,
        'cancel'  => 2
    ),
    'take_away_confirmation' => array(
        'done_nothing' => 0,
        'confirm' => 1,
        'cancel'  => 2
    ),
    'pick_up_confirmation' => array(
        'done_nothing' => 0,
        'confirm' => 1,
        'cancel'  => 2
    ),
    'kot_status' => array(
        'show'      => 0,
        'hide'      => 1,
        'return'    => 2
    ),
    'kot_kitchen_status' => array(
        'show'      => 0,
        'hide'      => 1
    ),
    /*'category_type' => array(
        'normal' => 0,
        'liquor' => 1
    ),*/
    'category_type' => array(
        'normal' => 0,
        'stock'  => 1
    ),
    'stock_item_quantity_type' => array(
        'ml'    => 0,
        'piece' => 1,
        'gram'    => 2
    ),
    'stock_item_quantity_type_show' => array(
        0 => 'ml',
        1 => 'piece',
        2 => 'gram'
    ),
    'is_opening_stock' => array(
        'no' => 0,
        'yes' => 1
    ), 
    'item_type' => array(
        'regular'    => 0,
        'special'   => 1
    ), 
    'item_type_show' => array(
        0       => 'regular',
        1       => 'special'
    ),
    'is_occupied' => array(
        'yes'   => 0,
        'no'    => 1
    ),
    'membership_type' => array(
        'free'    => 0,
        'paid'    => 1
    ),
    'membership_type_show' => array(
        0    => 'free',
        1    => 'paid'
    ),
    'is_discountable' => array(
        'yes'  => 0,
        'no'   => 1
    ),
    'is_discountable_show' => array(
        0   => 'yes',
        1   => 'no'
    )
];

/* temp_order_list table for showing data on reload for order list */
/* temp_items table for showing data on reload for all order list or billing */
