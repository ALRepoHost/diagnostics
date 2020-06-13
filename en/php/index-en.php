<?php

/*
* Simple framework that helps you test your apps
* @author: macfanpl
* @version: (tag-based)
*/
require 'inc/diagnostics.php';
require 'inc/global.php';

// Class inits. Note that you dont have to use all of the classess initialized below
$ac = new diagnostics();
$gl = new globalConfig();

// Sets the name of the fired-up function
$ac->runAllRecursively();
?>