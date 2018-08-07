<?php

$data = [
    'host'      => 'localhost',
    'port'      => 'port',
    'db'        => 'dbname',
    'user'      => 'root',
    'password'  => '****'
];
return pg_connect(
    'host='.$data['host']
    .' port='.$data['port']
    .' dbname='.$data['db']
    .' user='.$data['user']
    .' password='.$data['password']
);

?>