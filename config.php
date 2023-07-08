<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'preparetest';
$CFG->dbuser    = 'phpmyadmin';
$CFG->dbpass    = 'P@ssw0rd';
$CFG->prefix    = 'mo_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '0',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = 'http://learning.preparetest.com';
$CFG->dataroot  = '/var/www/moodledata/';
$CFG->admin     = 'admin';
// $CFG->sslproxy=false;
$CFG->directorypermissions = 0777;
// $CFG->alternateloginurl = 'https://preparetest.com/user-login/';
require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
