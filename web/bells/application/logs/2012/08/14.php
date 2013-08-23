<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-08-14 23:59:46 --- ERROR: ErrorException [ 8 ]: Undefined variable: row ~ APPPATH/views/schedule/edit.php [ 57 ]
2012-08-14 23:59:46 --- STRACE: ErrorException [ 8 ]: Undefined variable: row ~ APPPATH/views/schedule/edit.php [ 57 ]
--
#0 /var/www/html/bells/application/views/schedule/edit.php(57): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/b...', 57, Array)
#1 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#2 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#3 /var/www/html/bells/system/classes/kohana/view.php(228): Kohana_View->render()
#4 /var/www/html/bells/application/views/templates/default/main.php(37): Kohana_View->__toString()
#5 /var/www/html/bells/system/classes/kohana/view.php(61): include('/var/www/html/b...')
#6 /var/www/html/bells/system/classes/kohana/view.php(343): Kohana_View::capture('/var/www/html/b...', Array)
#7 /var/www/html/bells/system/classes/kohana/controller/template.php(44): Kohana_View->render()
#8 /var/www/html/bells/application/classes/controller/admin.php(101): Kohana_Controller_Template->after()
#9 [internal function]: Controller_Admin->after()
#10 /var/www/html/bells/system/classes/kohana/request/client/internal.php(121): ReflectionMethod->invoke(Object(Controller_Schedule))
#11 /var/www/html/bells/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 /var/www/html/bells/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/html/bells/index.php(108): Kohana_Request->execute()
#14 {main}