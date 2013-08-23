<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-08-13 01:47:14 --- ERROR: Database_Exception [ 1146 ]: Table 'bells.BellProfiles' doesn't exist [ SELECT * FROM `BellProfiles` WHERE `idBellZone` = NULL || `idBellZone` = 0 ORDER BY `order` ASC ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-13 01:47:14 --- STRACE: Database_Exception [ 1146 ]: Table 'bells.BellProfiles' doesn't exist [ SELECT * FROM `BellProfiles` WHERE `idBellZone` = NULL || `idBellZone` = 0 ORDER BY `order` ASC ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/calendar.php(21): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Calendar->action_index()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Calendar))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 02:06:37 --- ERROR: ErrorException [ 8 ]: Undefined property: Request::$url ~ APPPATH/classes/controller/audio.php [ 63 ]
2012-08-13 02:06:37 --- STRACE: ErrorException [ 8 ]: Undefined property: Request::$url ~ APPPATH/classes/controller/audio.php [ 63 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(63): Kohana_Core::error_handler(8, 'Undefined prope...', '/var/www/html/b...', 63, Array)
#1 [internal function]: Controller_Audio->action_manage()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 02:06:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: bells/audio/manage/1 ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-08-13 02:06:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: bells/audio/manage/1 ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#1 {main}
2012-08-13 02:07:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: bells/audio/manage/1 ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-08-13 02:07:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: bells/audio/manage/1 ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#1 {main}
2012-08-13 02:20:04 --- ERROR: ErrorException [ 1 ]: Class 'URI' not found ~ APPPATH/views/audio/sidebar.php [ 5 ]
2012-08-13 02:20:04 --- STRACE: ErrorException [ 1 ]: Class 'URI' not found ~ APPPATH/views/audio/sidebar.php [ 5 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-13 02:40:02 --- ERROR: ErrorException [ 1 ]: Call to undefined method Controller_Audio::request() ~ APPPATH/classes/controller/audio.php [ 77 ]
2012-08-13 02:40:02 --- STRACE: ErrorException [ 1 ]: Call to undefined method Controller_Audio::request() ~ APPPATH/classes/controller/audio.php [ 77 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-13 02:42:22 --- ERROR: Kohana_Exception [ 0 ]: View variable is not set: data ~ SYSPATH/classes/kohana/view.php [ 171 ]
2012-08-13 02:42:22 --- STRACE: Kohana_Exception [ 0 ]: View variable is not set: data ~ SYSPATH/classes/kohana/view.php [ 171 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(21): Kohana_View->__get('data')
#1 [internal function]: Controller_Audio->action_index()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 02:43:07 --- ERROR: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/controller/audio.php [ 17 ]
2012-08-13 02:43:07 --- STRACE: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/controller/audio.php [ 17 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(17): Kohana_Core::error_handler(2, 'Attempt to assi...', '/var/www/html/b...', 17, Array)
#1 [internal function]: Controller_Audio->before()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 02:43:22 --- ERROR: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/controller/audio.php [ 17 ]
2012-08-13 02:43:22 --- STRACE: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/controller/audio.php [ 17 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(17): Kohana_Core::error_handler(2, 'Attempt to assi...', '/var/www/html/b...', 17, Array)
#1 [internal function]: Controller_Audio->before()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 02:44:09 --- ERROR: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/controller/audio.php [ 17 ]
2012-08-13 02:44:09 --- STRACE: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/controller/audio.php [ 17 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(17): Kohana_Core::error_handler(2, 'Attempt to assi...', '/var/www/html/b...', 17, Array)
#1 [internal function]: Controller_Audio->before()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 02:45:05 --- ERROR: ErrorException [ 8 ]: Undefined variable: jsonEncoded ~ APPPATH/classes/controller/admin.php [ 45 ]
2012-08-13 02:45:05 --- STRACE: ErrorException [ 8 ]: Undefined variable: jsonEncoded ~ APPPATH/classes/controller/admin.php [ 45 ]
--
#0 /var/www/html/bells/application/classes/controller/admin.php(45): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/b...', 45, Array)
#1 /var/www/html/bells/application/classes/controller/audio.php(15): Controller_Admin->before()
#2 [internal function]: Controller_Audio->before()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Audio))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 02:45:16 --- ERROR: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/controller/audio.php [ 17 ]
2012-08-13 02:45:16 --- STRACE: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/controller/audio.php [ 17 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(17): Kohana_Core::error_handler(2, 'Attempt to assi...', '/var/www/html/b...', 17, Array)
#1 [internal function]: Controller_Audio->before()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 02:45:56 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/audio.php [ 23 ]
2012-08-13 02:45:56 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/audio.php [ 23 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(23): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/b...', 23, Array)
#1 [internal function]: Controller_Audio->action_index()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 02:46:23 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/audio.php [ 23 ]
2012-08-13 02:46:23 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/audio.php [ 23 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(23): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/b...', 23, Array)
#1 [internal function]: Controller_Audio->action_index()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 02:46:48 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Audio::$input ~ APPPATH/classes/controller/audio.php [ 79 ]
2012-08-13 02:46:48 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_Audio::$input ~ APPPATH/classes/controller/audio.php [ 79 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(79): Kohana_Core::error_handler(8, 'Undefined prope...', '/var/www/html/b...', 79, Array)
#1 [internal function]: Controller_Audio->action_delete()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 03:03:44 --- ERROR: ErrorException [ 8 ]: Undefined index: audio ~ APPPATH/views/audio/add.php [ 1 ]
2012-08-13 03:03:44 --- STRACE: ErrorException [ 8 ]: Undefined index: audio ~ APPPATH/views/audio/add.php [ 1 ]
--
#0 /var/www/html/bells/application/views/audio/add.php(1): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/b...', 1, Array)
#1 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#2 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#3 /var/www/html/bells/system/classes/kohana/view.php(228): Kohana_View->render()
#4 /var/www/html/bells/application/views/templates/default/main.php(37): Kohana_View->__toString()
#5 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#6 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#7 /var/www/html/bells/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#8 /var/www/html/bells/application/classes/controller/admin.php(97): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Admin->after()
#10 /var/www/html/bells/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Audio))
#11 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#14 {main}
2012-08-13 03:04:20 --- ERROR: ErrorException [ 8 ]: Undefined index: default ~ APPPATH/classes/controller/audio.php [ 51 ]
2012-08-13 03:04:20 --- STRACE: ErrorException [ 8 ]: Undefined index: default ~ APPPATH/classes/controller/audio.php [ 51 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(51): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/b...', 51, Array)
#1 [internal function]: Controller_Audio->action_add()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 03:04:43 --- ERROR: ErrorException [ 8 ]: Undefined index: default ~ APPPATH/classes/controller/audio.php [ 51 ]
2012-08-13 03:04:43 --- STRACE: ErrorException [ 8 ]: Undefined index: default ~ APPPATH/classes/controller/audio.php [ 51 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(51): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/b...', 51, Array)
#1 [internal function]: Controller_Audio->action_add()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 03:04:55 --- ERROR: ErrorException [ 8 ]: Undefined property: stdClass::$idBellAudio ~ APPPATH/classes/controller/audio.php [ 32 ]
2012-08-13 03:04:55 --- STRACE: ErrorException [ 8 ]: Undefined property: stdClass::$idBellAudio ~ APPPATH/classes/controller/audio.php [ 32 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(32): Kohana_Core::error_handler(8, 'Undefined prope...', '/var/www/html/b...', 32, Array)
#1 /var/www/html/bells/application/classes/controller/audio.php(56): Controller_Audio->_handle_audio(Object(stdClass))
#2 [internal function]: Controller_Audio->action_add()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 03:05:42 --- ERROR: ErrorException [ 8 ]: Undefined property: stdClass::$filename ~ APPPATH/classes/controller/audio.php [ 37 ]
2012-08-13 03:05:42 --- STRACE: ErrorException [ 8 ]: Undefined property: stdClass::$filename ~ APPPATH/classes/controller/audio.php [ 37 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(37): Kohana_Core::error_handler(8, 'Undefined prope...', '/var/www/html/b...', 37, Array)
#1 /var/www/html/bells/application/classes/controller/audio.php(58): Controller_Audio->_handle_audio(Object(stdClass))
#2 [internal function]: Controller_Audio->action_add()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 03:06:06 --- ERROR: ErrorException [ 8 ]: Undefined variable: post ~ APPPATH/classes/controller/audio.php [ 45 ]
2012-08-13 03:06:06 --- STRACE: ErrorException [ 8 ]: Undefined variable: post ~ APPPATH/classes/controller/audio.php [ 45 ]
--
#0 /var/www/html/bells/application/classes/controller/audio.php(45): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/b...', 45, Array)
#1 /var/www/html/bells/application/classes/controller/audio.php(59): Controller_Audio->_handle_audio(Object(stdClass))
#2 [internal function]: Controller_Audio->action_add()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Audio))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 03:06:17 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/audio/manage.php [ 1 ]
2012-08-13 03:06:17 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/audio/manage.php [ 1 ]
--
#0 /var/www/html/bells/application/views/audio/manage.php(1): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/b...', 1, Array)
#1 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#2 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#3 /var/www/html/bells/system/classes/kohana/view.php(228): Kohana_View->render()
#4 /var/www/html/bells/application/views/templates/default/main.php(37): Kohana_View->__toString()
#5 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#6 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#7 /var/www/html/bells/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#8 /var/www/html/bells/application/classes/controller/admin.php(97): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Admin->after()
#10 /var/www/html/bells/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Audio))
#11 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#14 {main}
2012-08-13 03:06:26 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/audio/manage.php [ 1 ]
2012-08-13 03:06:26 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/audio/manage.php [ 1 ]
--
#0 /var/www/html/bells/application/views/audio/manage.php(1): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/b...', 1, Array)
#1 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#2 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#3 /var/www/html/bells/system/classes/kohana/view.php(228): Kohana_View->render()
#4 /var/www/html/bells/application/views/templates/default/main.php(37): Kohana_View->__toString()
#5 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#6 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#7 /var/www/html/bells/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#8 /var/www/html/bells/application/classes/controller/admin.php(97): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Admin->after()
#10 /var/www/html/bells/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Audio))
#11 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#14 {main}
2012-08-13 03:06:53 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/audio/manage.php [ 1 ]
2012-08-13 03:06:53 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/audio/manage.php [ 1 ]
--
#0 /var/www/html/bells/application/views/audio/manage.php(1): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/b...', 1, Array)
#1 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#2 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#3 /var/www/html/bells/system/classes/kohana/view.php(228): Kohana_View->render()
#4 /var/www/html/bells/application/views/templates/default/main.php(37): Kohana_View->__toString()
#5 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#6 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#7 /var/www/html/bells/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#8 /var/www/html/bells/application/classes/controller/admin.php(97): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Admin->after()
#10 /var/www/html/bells/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Audio))
#11 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#14 {main}
2012-08-13 03:12:51 --- ERROR: ErrorException [ 8 ]: Undefined index: SERVER_NAME ~ SYSPATH/classes/kohana/url.php [ 79 ]
2012-08-13 03:12:51 --- STRACE: ErrorException [ 8 ]: Undefined index: SERVER_NAME ~ SYSPATH/classes/kohana/url.php [ 79 ]
--
#0 /var/www/html/bells/system/classes/kohana/url.php(79): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/b...', 79, Array)
#1 /var/www/html/bells/system/classes/kohana/url.php(112): Kohana_URL::base(true, '')
#2 /var/www/html/bells/system/classes/kohana/request.php(939): Kohana_URL::site('/', true, '')
#3 /var/www/html/bells/application/classes/controller/admin.php(10): Kohana_Request->redirect('login')
#4 /var/www/html/bells/application/classes/controller/calendar.php(11): Controller_Admin->__construct(Object(Request), Object(Response))
#5 [internal function]: Controller_Calendar->__construct(Object(Request), Object(Response))
#6 /var/www/html/bells/system/classes/kohana/request/client/internal.php(101): ReflectionClass->newInstance(Object(Request), Object(Response))
#7 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#10 {main}
2012-08-13 03:13:36 --- ERROR: ErrorException [ 8 ]: Undefined index: SERVER_NAME ~ SYSPATH/classes/kohana/url.php [ 79 ]
2012-08-13 03:13:36 --- STRACE: ErrorException [ 8 ]: Undefined index: SERVER_NAME ~ SYSPATH/classes/kohana/url.php [ 79 ]
--
#0 /var/www/html/bells/system/classes/kohana/url.php(79): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/b...', 79, Array)
#1 /var/www/html/bells/system/classes/kohana/url.php(112): Kohana_URL::base(true, '')
#2 /var/www/html/bells/system/classes/kohana/request.php(939): Kohana_URL::site('/', true, '')
#3 /var/www/html/bells/application/classes/controller/admin.php(10): Kohana_Request->redirect('login')
#4 /var/www/html/bells/application/classes/controller/calendar.php(11): Controller_Admin->__construct(Object(Request), Object(Response))
#5 [internal function]: Controller_Calendar->__construct(Object(Request), Object(Response))
#6 /var/www/html/bells/system/classes/kohana/request/client/internal.php(101): ReflectionClass->newInstance(Object(Request), Object(Response))
#7 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#10 {main}
2012-08-13 04:37:35 --- ERROR: Database_Exception [ 1146 ]: Table 'bells.BellZone' doesn't exist [ SELECT * FROM `BellZone` ORDER BY `idBellZone` DESC ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-13 04:37:35 --- STRACE: Database_Exception [ 1146 ]: Table 'bells.BellZone' doesn't exist [ SELECT * FROM `BellZone` ORDER BY `idBellZone` DESC ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/cron.php(15): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Cron->action_bells()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 04:37:43 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '2012-08-13'' AND bt.`hour` = ''4'' AND bt.`minute` = ''37'' AND bd.idBellZone=:z' at line 1 [ SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = ''2012-08-13'' AND bt.`hour` = ''4'' AND bt.`minute` = ''37'' AND bd.idBellZone=:zone ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-13 04:37:43 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '2012-08-13'' AND bt.`hour` = ''4'' AND bt.`minute` = ''37'' AND bd.idBellZone=:z' at line 1 [ SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = ''2012-08-13'' AND bt.`hour` = ''4'' AND bt.`minute` = ''37'' AND bd.idBellZone=:zone ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/cron.php(27): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Cron->action_bells()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 04:38:33 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '4' AND bt.`minute` = '38' AND bd.idBellZone= :zone' at line 1 [ SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = '2012-08-13'' AND bt.`hour` = '4' AND bt.`minute` = '38' AND bd.idBellZone= :zone ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-13 04:38:33 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '4' AND bt.`minute` = '38' AND bd.idBellZone= :zone' at line 1 [ SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = '2012-08-13'' AND bt.`hour` = '4' AND bt.`minute` = '38' AND bd.idBellZone= :zone ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/cron.php(27): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Cron->action_bells()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 04:38:51 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '4' AND bt.`minute` = '38' AND bd.idBellZone= '4'' at line 1 [ SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = '2012-08-13'' AND bt.`hour` = '4' AND bt.`minute` = '38' AND bd.idBellZone= '4' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-13 04:38:51 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '4' AND bt.`minute` = '38' AND bd.idBellZone= '4'' at line 1 [ SELECT * FROM `BellDates` bd JOIN `BellTimes` bt ON bt.idBellProfile = bd.idBellProfile WHERE bd.`date` = '2012-08-13'' AND bt.`hour` = '4' AND bt.`minute` = '38' AND bd.idBellZone= '4' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/cron.php(27): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Cron->action_bells()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 04:39:03 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''Monday' = bt.idBellProfile WHERE bt.hour = '4' AND bt.minute = '39' AND bzpd.id' at line 1 [ SELECT * FROM `BellTimes` bt JOIN `BellZoneDefaultProfiles` bzdp ON bzdp.'Monday' = bt.idBellProfile WHERE bt.hour = '4' AND bt.minute = '39' AND bzpd.idBellZone= '4' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-13 04:39:03 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''Monday' = bt.idBellProfile WHERE bt.hour = '4' AND bt.minute = '39' AND bzpd.id' at line 1 [ SELECT * FROM `BellTimes` bt JOIN `BellZoneDefaultProfiles` bzdp ON bzdp.'Monday' = bt.idBellProfile WHERE bt.hour = '4' AND bt.minute = '39' AND bzpd.idBellZone= '4' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/cron.php(35): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Cron->action_bells()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 04:40:29 --- ERROR: Database_Exception [ 1054 ]: Unknown column 'bzpd.idBellZone' in 'where clause' [ SELECT * FROM `BellTimes` bt JOIN `BellZoneDefaultProfiles` bzdp ON bzdp.idBellProfileMonday = bt.idBellProfile WHERE bt.hour = '4' AND bt.minute = '40' AND bzpd.idBellZone= '4' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-08-13 04:40:29 --- STRACE: Database_Exception [ 1054 ]: Unknown column 'bzpd.idBellZone' in 'where clause' [ SELECT * FROM `BellTimes` bt JOIN `BellZoneDefaultProfiles` bzdp ON bzdp.idBellProfileMonday = bt.idBellProfile WHERE bt.hour = '4' AND bt.minute = '40' AND bzpd.idBellZone= '4' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /var/www/html/bells/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', true, Array)
#1 /var/www/html/bells/application/classes/controller/cron.php(38): Kohana_Database_Query->execute()
#2 [internal function]: Controller_Cron->action_bells()
#3 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#4 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#7 {main}
2012-08-13 04:40:50 --- ERROR: ErrorException [ 8 ]: Undefined variable: row ~ APPPATH/classes/controller/cron.php [ 49 ]
2012-08-13 04:40:50 --- STRACE: ErrorException [ 8 ]: Undefined variable: row ~ APPPATH/classes/controller/cron.php [ 49 ]
--
#0 /var/www/html/bells/application/classes/controller/cron.php(49): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/b...', 49, Array)
#1 [internal function]: Controller_Cron->action_bells()
#2 /var/www/html/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Cron))
#3 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#6 {main}
2012-08-13 14:29:19 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL resouces/audio was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-08-13 14:29:19 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL resouces/audio was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#3 {main}