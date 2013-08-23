<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-09-09 18:20:34 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL zone was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2012-09-09 18:20:34 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL zone was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/bells/index.php(108): Kohana_Request->execute()
#3 {main}
2012-09-09 18:25:58 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL schedule was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 113 ]
2012-09-09 18:25:58 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL schedule was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 113 ]
--
#0 /var/www/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/bells/index.php(108): Kohana_Request->execute()
#3 {main}
2012-09-09 18:26:04 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL schedule/add was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 113 ]
2012-09-09 18:26:04 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL schedule/add was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 113 ]
--
#0 /var/www/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/bells/index.php(108): Kohana_Request->execute()
#3 {main}
2012-09-09 18:45:15 --- ERROR: ErrorException [ 2048 ]: Non-static method Kohana_Auth::hash_password() should not be called statically, assuming $this from incompatible context ~ APPPATH/classes/controller/calendar.php [ 14 ]
2012-09-09 18:45:15 --- STRACE: ErrorException [ 2048 ]: Non-static method Kohana_Auth::hash_password() should not be called statically, assuming $this from incompatible context ~ APPPATH/classes/controller/calendar.php [ 14 ]
--
#0 /var/www/bells/application/classes/controller/calendar.php(14): Kohana_Core::error_handler(2048, 'Non-static meth...', '/var/www/bells/...', 14, Array)
#1 [internal function]: Controller_Calendar->action_index()
#2 /var/www/bells/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Calendar))
#3 /var/www/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /var/www/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/bells/index.php(108): Kohana_Request->execute()
#6 {main}