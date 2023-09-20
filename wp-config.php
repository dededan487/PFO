<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'portfolio_two_db' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'j-Qa=BdR&CAX*233A6L[6iC!M{QSi@{2jy~U]C&bD]]3X(#^FPNj]dLuf&>X)ZHR' );
define( 'SECURE_AUTH_KEY',  'vk+`/9}~j-Yp{oLc0:-zXD^4NL[fBmffyD SCe,L6w[VdfP6,|X(2h0r:SYi8,xh' );
define( 'LOGGED_IN_KEY',    'LMOfj}gYvucr(b<r~$Xu`$;J{ZC%f>Kzko~Eb9M}K%)N2:fg;NB6wzV<7:y]ZN5O' );
define( 'NONCE_KEY',        'M3ho3d2z(wS{(i{XQ56unCvf?[ZTa]qa0UmY%@4`Rx&Wr(Nf|*o#E_-[df0z]=AY' );
define( 'AUTH_SALT',        'iJlc<IzlusY[Ip{CdT7@At_tpg_8.S^SZA_44Vtc?jDeJ.TLv;HIUL~`?xslT(Gf' );
define( 'SECURE_AUTH_SALT', '^|n3B:y?OQ-]bMrjum>AP6[Qpx$FSW-9,vOUTTEJD}%c(}eTuh-qQdh|`0L%bg%[' );
define( 'LOGGED_IN_SALT',   'ejb%seP|-)~~?l@GDF!r-:iN[;COu?6T@3.e zj/M9i0uQPi1+Cu`[dBg)3^+f]y' );
define( 'NONCE_SALT',       'y+,LLd$gnCQI)THq]VPp_DX&r]YA%rX7w<]O:%O<}K KW&.d`D0HM)&!UG|gK+Xw' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY',false);
/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
