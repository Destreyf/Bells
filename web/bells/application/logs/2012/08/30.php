<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-08-30 17:23:55 --- ERROR: Database_Exception [ 2006 ]: MySQL server has gone away [ SELECT * FROM `BellZones` ORDER BY `idBellZone` DESC ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-30 17:23:55 --- STRACE: Database_Exception [ 2006 ]: MySQL server has gone away [ SELECT * FROM `BellZones` ORDER BY `idBellZone` DESC ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/cron.php(22): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Cron->action_bells()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}