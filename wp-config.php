<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'alex-shevtsov' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '45{1ucbiGuk!4}33v4IE6dC!IG2:o``/7o?)$b8I*_Zrp}&dylA*QS#KMrktv31x' );
define( 'SECURE_AUTH_KEY',  'db4a07#T&G^lIrUOr1Et({{YZa|!v$eEkZ<rdYNop&XSkD;xx.bP(s)DsfA*e`9|' );
define( 'LOGGED_IN_KEY',    '%#su^R }!hrp|`KG|:G:J>~4 x8nmRK|R9j=.oLzlvd1uU Q/X:7E2/55{iujq](' );
define( 'NONCE_KEY',        '`A~^DCxIQMAGCcs@_B>8ncZ{?ld7>4+HV0OCS;HLp|4MD?rzaPW68&*:~2hg[}s>' );
define( 'AUTH_SALT',        '`jd}vE/9tiEEmpO=RlN6Z->z)ed&orN>(<&>~#O_XVn[k52p7rEJ)!I>D%<zlwVA' );
define( 'SECURE_AUTH_SALT', 'gzl_gY$RBx{*4%I]-y(R{k8q3Rqv U8{]+ID3eB@YZ$cK450=frhHDo4]tZkDC_v' );
define( 'LOGGED_IN_SALT',   'on?^8G?LVP%yfea#wU Yv/<<V/0;P<7FSU,Bq~)Mo;]37k%0G:K&ryMji5fRCGu`' );
define( 'NONCE_SALT',       'X#67;X|. ;:B]uY% zN<-1M>)%A7=-dS>IAs?Ont~{ZFu+<1U;oV`)4GXdtsJsju' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
