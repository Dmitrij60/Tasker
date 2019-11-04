<?php
return array(
    'admin/task/page-([0-9]+)' => 'admin/index/$1',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'task/create' => 'task/create',
    'admin/task/update/([0-9]+)' => 'admin/update/$1',
    'admin' => 'admin/index',
    'page-([0-9]+)' => 'site/index/$1',
    '' => 'site/index',
);