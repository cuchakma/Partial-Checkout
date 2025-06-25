<?php

namespace W3Aliens\PartialCheckout\Actions;

use W3Aliens\PartialCheckout\Traits\Singleton;
use W3Aliens\PartialCheckout\Abstracts\Service;
use W3Aliens\PartialCheckout\Interfaces\AdminInterface;

class Menu extends Service implements AdminInterface {

    use Singleton;

    public function __construct() {
        $this->run();
    }

    public function _register_hooks(): void {
        add_action( 'admin_menu', [$this, '_admin_services'] );
    }

    public function _admin_services(): void {
        add_menu_page(
            'Partial Checkout',
            'Partial Checkout',
            'manage_options',
            'partial-checkout',
            [$this, 'show_menu_view'],
            'dashicons-games',
            6
        );

    }

    public function show_menu_view() {
        include pc()->_plugin_views_path . 'dashboard.php';
    }
}