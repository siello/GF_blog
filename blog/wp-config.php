<?php
/**
* Основные параметры WordPress.
*
* Скрипт для создания wp-config.php использует этот файл в процессе
* установки. Необязательно использовать веб-интерфейс, можно
* скопировать файл в "wp-config.php" и заполнить значения вручную.
*
* Этот файл содержит следующие параметры:
*
* * Настройки MySQL
* * Секретные ключи
* * Префикс таблиц базы данных
* * ABSPATH
*
* @link https://codex.wordpress.org/Editing_wp-config.php
*
* @package WordPress
*/
// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/blog_user/ftp/files/blog/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'blog');
/** Имя пользователя MySQL */
define('DB_USER', 'blog_user');
/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'ho7NiHVL');
/** Имя сервера MySQL */
define('DB_HOST', 'localhost');
/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');
/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');
/**#@+
* Уникальные ключи и соли для аутентификации.
*
* Смените значение каждой константы на уникальную фразу.
* Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
* Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'P.<?8qOaN<,@WRbo@^j=vI7aa.c&wdpsJbH}`+X9UL<.jk6:[gp:}%qdNe7;.jTS');
define('SECURE_AUTH_KEY',  'Q^4#pFLa:@x9rD$RQ^}/#rXjHe^P<,rJXFv~~GeY3x@*`jH$.T12$|u6yx9u9l.b');
define('LOGGED_IN_KEY',    '8<9%BG1=Dnue+Rqwdr:Bot82<%Xa|E{0B[OBD:@Lg/va^j6^9*(A!cG<FHFlX>I6');
define('NONCE_KEY',        'Hi ={4~ ]/Td6=*BG^.m@+}Pm9Y*k?m{FP]re_lyMyIp_/l;{]d.|K7h,5S5va5{');
define('AUTH_SALT',        'w3}eo?QGTTL5+1SM*WzFZ9tG6N0A/rG9fuDH|i<^VWon`~B7*i+CUL1c|:fGN]6f');
define('SECURE_AUTH_SALT', 'ZX]zB@8=zc+w&}U@8jsZr 5aHOS:(G~j.F+mM}wcP7BS?DMCzc[Ry)uJ7AFqSI(S');
define('LOGGED_IN_SALT',   ')XFa58hlgWYLLNyQos;6]Bl*UHyy{X||vR&e({2j0$O@<_?4%nWFjE3EbdA.v?*U');
define('NONCE_SALT',       'TfD9L?;fXx&fk};jIEW4,(MQbqK4NEVunc,~>E(6Gxx!y:j}6aPWcNa1L7Kq/e, ');
/**#@-*/
/**
* Префикс таблиц в базе данных WordPress.
*
* Можно установить несколько сайтов в одну базу данных, если использовать
* разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
*/
$table_prefix  = 'wp094ft_';
/**
* Для разработчиков: Режим отладки WordPress.
*
* Измените это значение на true, чтобы включить отображение уведомлений при разработке.
* Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
* в своём рабочем окружении.
* 
* Информацию о других отладочных константах можно найти в Кодексе.
*
* @link https://codex.wordpress.org/Debugging_in_WordPress
*/
define('WP_DEBUG', false);
define('FORCE_SSL_ADMIN', true);
/* Это всё, дальше не редактируем. Успехов! */
/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
