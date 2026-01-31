<?php

// 1 - diretorios base
define ('BASE_DIR', dirname(__FILE__, 2));

// 2 - define onde estao as views
define('VIEWS', BASE_DIR . '/View)');

// 3 - acesso ao banco de dados
$_ENV['db']['host'] = "localhost:3306";
$_ENV['db']['user'] = "root";
$_ENV['db']['pass'] = "Dev@2026";
$_ENV['db']['database'] = "db_pmh";



