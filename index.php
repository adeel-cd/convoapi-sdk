<?php

require './vendor/autoload.php';

//$c = new \Poc\Convo\ConvoRole();
//echo $c->listAllRoles([]);

$c = new \Poc\Convo\ConvoAuth();
echo $c->authenticateUser(['username' => 'admin@codedistrict.com', 'password' => 'password']);

//$c = new \Poc\Convo\ConvoChannel();
//$c->activateChannel([]);