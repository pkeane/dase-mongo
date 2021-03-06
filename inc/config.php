<?php

//force https
$conf['app']['force_https'] = false;

$conf['app']['main_title'] = "My DASe Archive";

$conf['app']['log_level'] = 2;

//path to imagemagick convert
$conf['app']['convert'] = '/usr/bin/convert';

//maximum no. of items displayed on a search result page
$conf['app']['max_items'] = 30;

//eid & admin password
//$conf['auth']['superuser']['<username>'] = '<password>';
//$conf['auth']['serviceuser']['prop'] = 'ok';
$conf['auth']['service_token'] = "changeme";

//used to create only-known-by-server security hash
$conf['auth']['token'] = 'changeme'.date('Ymd',time());

//POST/PUT/DELETE token:	
$conf['auth']['ppd_token'] = "changeme".date('Ymd',time());

//define module handlers (can override existing handler)
//$conf['request_handler']['<handler>'] = '<module_name>';
//$conf['request_handler']['login'] = 'openid';
$conf['request_handler']['db'] = 'dbadmin';
$conf['request_handler']['install'] = 'install';

//cache can be file or memcached (only 'file' is implemented) 
$conf['cache']['type'] = 'file';
//config defines a reasonable default
//$conf['cache']['dir'] = '/usr/local/dase/cache';

//search engine
$conf['search']['engine'] = 'db';

//db, file, or something else...
$conf['docstore']['type'] = 'db';
