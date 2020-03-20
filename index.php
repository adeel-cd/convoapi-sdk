<?php

require './vendor/autoload.php';


$c = new \Poc\Convo\ConvoAuth();
echo $c->authenticateUser(['username' => 'admincodedistrict.com', 'password' => 'password']);