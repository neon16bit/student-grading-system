<?php
return [
    'db_host' => 'localhost',
    'db_name' => 'student_info',
    'db_user' => 'root',
    'db_pass' => '', // Default MySQL password for root is empty
    'username' => 'teacher',
    'password' => password_hash('password', PASSWORD_BCRYPT),
];
