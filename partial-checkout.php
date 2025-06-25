<?php
/**
 * Plugin Name: Partial Checkout
 * Plugin URI:  www.facebook.com
 * Description: A plugin to record partial checkout.
 * Version:     1.0.0
 * Author:      Cupid Chakma
 * Author URI:  www.facebook.com
 * Text Domain: partial-checkout
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 *
 * @package     Partial Checkout
 * @author      Cupid Chakma
 * @copyright   2025 w3Aliens
 * @license     GPL-2.0
 *
 */

require 'vendor/autoload.php';

use W3Aliens\PartialCheckout\Plugin;

define( 'PC_ROOT_DIR', __DIR__ );
define( 'PC_ROOT_FILE', __FILE__ );

function pc() {
    return Plugin::instance();
}

pc();
