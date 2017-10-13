<?php
/**
 * Little Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Little_Twenty_Seventeen
 * @since 1.0
 */

setlocale(LC_ALL, 'fr_FR');

function admin_css() {
    $admin_stylesheet = get_stylesheet_directory_uri() . '/assets/css/admin.css';

    wp_enqueue_style( 'admin-styles', $admin_stylesheet );
}
add_action('admin_enqueue_scripts', 'admin_css', 11 );

/**
 * Chargement des scripts du thème
 */
function little_twentyseventeen_scripts() {
    wp_enqueue_style( 'little-twentyseventeen-hc-font', get_theme_file_uri( '/assets/css/font-hc.css' ), array(), '1.5' );
    wp_enqueue_script( 'little-twentyseventeen-soundmanager', get_theme_file_uri( '/assets/js/soundmanager2-nodebug-jsmin.js' ), array(), '1.5' );
}

/**
 * Initialisation du widget situé dans le bandeau
 */
function little_twentyseventeen_widget_init() {
    register_sidebar( array(
        'name'          => __( 'Extra Header Content', 'little-twentyseventeen' ),
        'id'            => 'header-extra',
        'description'   => __( 'Add widgets here to appear in your header.', 'little-twentyseventeen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

/**
 * Traduction de la date en français
 *
 * @param $format
 * @param null $timestamp
 * @param null $echo
 *
 * @return string
 */
function translate_date_french($format, $timestamp = null, $echo = null) {
    $param_D = array('', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
    $param_l = array('', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    $param_F = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    $param_M = array('', 'Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc');
    $return = '';
    if(is_null($timestamp)) { $timestamp = mktime(); }
    for($i = 0, $len = strlen($format); $i < $len; $i++) {
        switch($format[$i]) {
            case '\\' : // fix.slashes
                $i++;
                $return .= isset($format[$i]) ? $format[$i] : '';
                break;
            case 'D' :
                $return .= $param_D[date('N', $timestamp)];
                break;
            case 'l' :
                $return .= $param_l[date('N', $timestamp)];
                break;
            case 'F' :
                $return .= $param_F[date('n', $timestamp)];
                break;
            case 'M' :
                $return .= $param_M[date('n', $timestamp)];
                break;
            default :
                $return .= date($format[$i], $timestamp);
                break;
        }
    }
    if(is_null($echo)) { return $return;} else { echo $return;}
}

/**
 * Gestion du shortcode "last_update"
 *
 * @param $atts
 *
 * @return string
 */
function date_last_update( $atts ) {
    $atts = shortcode_atts(
        array( 'force_date' => null, 'format' => 'd F Y' ),
        $atts
    );

    $lastPost = date("Y-m-d", strtotime(get_lastpostdate()));

    if ( ! empty( $atts['force_date'] )) {
        $forceDate = date("Y-m-d", strtotime($atts['force_date']) );
        if($forceDate > $lastPost) {
            $lastPost = $forceDate;
        }
    }

    return translate_date_french ( $atts['format'], strtotime($lastPost) );
}

/**
 * Gestion du shortcode "current_date"
 *
 * @param $atts
 *
 * @return false|string
 */
function date_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'format' => ''
        ), $atts
    );

    if ( !empty( $atts['format'] ) ) {
        $dateFormat = $atts['format'];
    } else {
        $dateFormat = 'jS F Y';
    }

    return date( $dateFormat );

}

/**
 * Gestion du shortcode "permalink"
 *
 * @param $atts
 *
 * @return false|string
 */
function permalink_thingy($atts) {
    $id = 1;
    $text = "";
    extract(shortcode_atts(array(
        'id' => 1,
        'text' => ""  // default value if none supplied
    ), $atts));

    if ($text) {
        $url = get_permalink($id);
        return "<a href='$url'>$text</a>";
    } else {
        return get_permalink($id);
    }
}
add_shortcode('permalink', 'permalink_thingy');
add_shortcode( 'current_date', 'date_shortcode' );
add_shortcode( 'last_update', 'date_last_update' );

function add_sourire() {
    ?>
    <div class="vc-custom-heading__separator" style="text-align:center;padding-top:9px; margin-top: -5px;"><span class="vc-custom-heading__separator-icon" style="font-size:17px"><i class="hc-icon-smile"></i></span></div>
<?php
}

add_action( 'widgets_init', 'little_twentyseventeen_widget_init' );
add_action( 'wp_enqueue_scripts', 'little_twentyseventeen_scripts' );

/** @noinspection PhpIncludeInspection Dynamic includes */
require get_theme_file_path( '/inc/template-functions.php' );