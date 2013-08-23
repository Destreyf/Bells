<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-08-15 00:38:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: schedule/edit/schedule/edit/1 ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-08-15 00:38:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: schedule/edit/schedule/edit/1 ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#1 {main}
2012-08-15 00:38:56 --- ERROR: Database_Exception [ 1146 ]: Table 'bells.BellProfile' doesn't exist [ UPDATE `BellProfile` SET `name` = 'Weekday!', `idBellAudio` = '0' WHERE `idBellProfile` = '1' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-15 00:38:56 --- STRACE: Database_Exception [ 1146 ]: Table 'bells.BellProfile' doesn't exist [ UPDATE `BellProfile` SET `name` = 'Weekday!', `idBellAudio` = '0' WHERE `idBellProfile` = '1' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(3, 'UPDATE `BellPro...', false, Array)
#1 /var/www/html/bells/application/classes/controller/schedule.php(19): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Schedule->action_edit()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Schedule))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-15 00:45:57 --- ERROR: Database_Exception [ 1054 ]: Unknown column 'idBellProfile' in 'field list' [ INSERT INTO `BellAudio` (`idBellProfile`, `idBellAudio`, `hour`, `minute`, `name`) VALUES ('1', '0', 7, '30', 'School Start') ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-15 00:45:57 --- STRACE: Database_Exception [ 1054 ]: Unknown column 'idBellProfile' in 'field list' [ INSERT INTO `BellAudio` (`idBellProfile`, `idBellAudio`, `hour`, `minute`, `name`) VALUES ('1', '0', 7, '30', 'School Start') ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(2, 'INSERT INTO `Be...', false, Array)
#1 /var/www/html/bells/application/classes/controller/schedule.php(32): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Schedule->action_edit()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Schedule))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-15 00:55:39 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '>' ~ APPPATH/views/schedule/edit.php [ 67 ]
2012-08-15 00:55:39 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '>' ~ APPPATH/views/schedule/edit.php [ 67 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-15 01:33:38 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND bd.last_idBellTime != bt.idBellTime' at line 1 [ SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = '2012-08-15' AND bt.`hour` = '1' AND bt.`minute` = '33' AND bd.idBellZone= '4' AND AND bd.last_idBellTime != bt.idBellTime ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-15 01:33:38 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND bd.last_idBellTime != bt.idBellTime' at line 1 [ SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = '2012-08-15' AND bt.`hour` = '1' AND bt.`minute` = '33' AND bd.idBellZone= '4' AND AND bd.last_idBellTime != bt.idBellTime ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/cron.php(30): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Cron->action_bells()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-15 01:36:01 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cron.php [ 37 ]
2012-08-15 01:36:01 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cron.php [ 37 ]
--
#0 /var/www/html/bells/application/classes/controller/cron.php(37): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/b...', 37, Array)
#1 [internal function]: Controller_Cron->action_bells()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-15 01:36:47 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cron.php [ 38 ]
2012-08-15 01:36:47 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/cron.php [ 38 ]
--
#0 /var/www/html/bells/application/classes/controller/cron.php(38): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/b...', 38, Array)
#1 [internal function]: Controller_Cron->action_bells()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-15 01:44:34 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL resoruces/audio was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-08-15 01:44:34 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL resoruces/audio was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#3 {main}