<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages';
$route['/'] = 'pages/index';
$route['hakkimizda'] = 'pages/hakkimizda';
$route['yazarlar'] = 'pages/yazarlar';
$route['iletisim'] = 'pages/iletisim';
$route['giris'] = 'pages/login';
$route['uye-ol'] = 'pages/uyeOl';

$route['programlama-dili/ekle'] = 'ProgDilAndVeriTabani/progDilEkleForm';
$route['yazi-ekle'] = 'pages/yazi';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
