<?php
/*
*plugin name: Talha Post Like Dislike System
*Plugin URI: portfolio.shadiwaltech.com
*Author: Talha Bakhsh
*Description: Single Post Like And Dislike System, Limit The Description of Posts On  Archive Blog Page and sent an email to admin on publishing post by any user.
*version: 1.0.0
*License:GPL v2 or later 
*License URI:https://www.gnu.org/licenses/gpl-2.0.html
*Text Domain:talhalike
*/

// if this file call directely abort.
if(!defined('WPINC')){
    die;
}
// constant defining about version
if(!defined('TALHA_PLUGIN_VERSION')){
    define('TALHA_PLUGIN_VERSION', '1.0.0');

}
// constant defining about plugin directories

if(!defined('TALHA_PLUGIN_DIR')){
    define('TALHA_PLUGIN_DIR', plugin_dir_url(__FILE__));
}

require plugin_dir_path(__FILE__ ). 'inc/settings.php';
require plugin_dir_path(__FILE__). 'inc/db.php';
require plugin_dir_path(__FILE__). 'inc/btns.php';
require plugin_dir_path(__FILE__). 'inc/ajax.php';
require plugin_dir_path(__FILE__). 'inc/scripts.php';
require plugin_dir_path(__FILE__). 'inc/hooks.php';

?>