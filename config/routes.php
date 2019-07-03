<?php

return array(

    'admin/product/delete/(\d+)' => 'adminProduct/delete/$1',
    'admin/product/edit/(\d+)' => 'adminProduct/edit/$1',
    'admin/product/add' => 'adminProduct/add',
    'admin/product' => 'adminProduct/index',

    'admin/category/delete/(\d+)' => 'adminCategory/delete/$1',
    'admin/category/edit/(\d+)' => 'adminCategory/edit/$1',
    'admin/category/add' => 'adminCategory/add',
    'admin/category' => 'adminCategory/index',

    'admin/order/delete/(\d+)' => 'adminOrder/delete/$1',
    'admin/order/edit/(\d+)' => 'adminOrder/edit/$1',
    'admin/order/view/(\d+)' => 'adminOrder/view/$1',
    'admin/order/add' => 'adminOrder/add',
    'admin/order' => 'adminOrder/index',

    'admin' => 'admin/index',

    'product/(\d+)' => 'product/view/$1',

    'cart/add/(\d+)' => 'cart/index/$1',
    'cart/addAjax/(\d+)' => 'cart/add/$1',
    'cart/delete/(\d+)' => 'cart/delete/$1',
    'cart/checkOut' => 'cart/checkOut',
    'cart' => 'cart/cart',

    'catalog/page_(\d+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index',

    'category/(\w+)/page_(\d+)' => 'catalog/category/$1/$2',
    'category/(\w+)' => 'catalog/category/$1',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet' => 'cabinet/index',

    '' => 'site/index',

    'news/(\d+)' => 'news/view/$1',
    'news' => 'news/index'

);