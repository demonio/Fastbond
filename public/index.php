<?php
const APP_CHARSET = 'UTF-8';
const APP_PATH = 'C:/xampp/htdocs/PUBLICO/fastbond/private/';
const CORE_PATH = 'C:/xampp/htdocs/core_1968/';
const PRODUCTION = false;
const PUB_PATH = 'C:/xampp/htdocs/PUBLICO/fastbond/public/';
const PUBLIC_PATH = '/';

$url = $_SERVER['PATH_INFO'] ?? '/';

require CORE_PATH.'kumbia/bootstrap.php';
