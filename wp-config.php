<?php
/**
 * إعدادات الووردبريس الأساسية
 *
 * عملية إنشاء الملف wp-config.php تستخدم هذا الملف أثناء التنصيب. لا يجب عليك
 * استخدام الموقع، يمكنك نسخ هذا الملف إلى "wp-config.php" وبعدها ملئ القيم المطلوبة.
 *
 * هذا الملف يحتوي على هذه الإعدادات:
 *
 * * إعدادات قاعدة البيانات
 * * مفاتيح الأمان
 * * بادئة جداول قاعدة البيانات
 * * المسار المطلق لمجلد الووردبريس
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** إعدادات قاعدة البيانات - يمكنك الحصول على هذه المعلومات من مستضيفك ** //

/** اسم قاعدة البيانات لووردبريس */
define( 'DB_NAME', 'church' );

/** اسم مستخدم قاعدة البيانات */
define( 'DB_USER', 'root' );

/** كلمة مرور قاعدة البيانات */
define( 'DB_PASSWORD', '' );

/** عنوان خادم قاعدة البيانات */
define( 'DB_HOST', 'localhost' );

/** ترميز قاعدة البيانات */
define( 'DB_CHARSET', 'utf8mb4' );

/** نوع تجميع قاعدة البيانات. لا تغير هذا إن كنت غير متأكد */
define( 'DB_COLLATE', '' );

/**#@+
 * مفاتيح الأمان.
 *
 * استخدم الرابط التالي لتوليد المفاتيح {@link https://api.wordpress.org/secret-key/1.1/salt/}
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^g74ZJm>ib`Teo,PDs[[|e);`l-p?q-vD?iK#fg!ivl7i@Qk(VUj8goU pXW9-&1' );
define( 'SECURE_AUTH_KEY',  '4cGgJCZN DX=q,ssqN{-:}{riq.QV!05e><bJjWd>>,~@R2vJ:~<ZbBP&YVa)xtR' );
define( 'LOGGED_IN_KEY',    'co*W_7K>}klDv=N<1zD=StfJF-Y;`FE856.q^Qn@WT#XPW<|V<96=wqOj?uKKDU@' );
define( 'NONCE_KEY',        'Iqw8~SEg:kNAMVdafeUM(U}$6]r5S7jKuEp8aqD6gt6L$pXNm9COg~2]=+ZB.o:2' );
define( 'AUTH_SALT',        'xCa]9Nt(H|-G-f4z>-cW1O==$E8U8h#k!iLE:Yh;M^tqytzlXeJf3Q_WGzBGUE7L' );
define( 'SECURE_AUTH_SALT', '?Fvsyx1/NmKQ)rM}oq4`r#WH1)4avx&Aoq/i!?a?z~-|9tsjUqylu^!X|Ggnc#5~' );
define( 'LOGGED_IN_SALT',   '<XWF .XS0-Q9+]0}Lv^Gvh@x;PQj@!.Pr1k-vwDE0wJ(G%U+C>y5ma>02eo^D9Yq' );
define( 'NONCE_SALT',       '%jNNt#pz>KB>R-TT`|_:O6{@>>?,xic`sTBX2`j7&9yF*;gd`y5):V4hLi;M?sI1' );

/**#@-*/

/**
 * بادئة الجداول في قاعدة البيانات.
 *
 * تستطيع تركيب أكثر من موقع على نفس قاعدة البيانات إذا أعطيت لكل موقع بادئة جداول مختلفة
 * يرجى استخدام حروف، أرقام وخطوط سفلية فقط!
 */
$table_prefix = 'wp_';

/**
 * للمطورين: نظام تشخيص الأخطاء
 *
 * قم بتغييرالقيمة، إن أردت تمكين عرض الملاحظات والأخطاء أثناء التطوير.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* هذا هو المطلوب، توقف عن التعديل! نتمنى لك التوفيق. */

/** المسار المطلق لمجلد ووردبريس. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** إعداد متغيرات الووردبريس وتضمين الملفات. */
require_once( ABSPATH . 'wp-settings.php' );
