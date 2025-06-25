<?php

namespace W3Aliens\PartialCheckout\Actions;

use W3Aliens\PartialCheckout\Traits\Resolver;
use W3Aliens\PartialCheckout\Traits\Singleton;
use W3Aliens\PartialCheckout\Abstracts\Service;
use W3Aliens\PartialCheckout\Interfaces\AdminInterface;

class Assets extends Service implements AdminInterface {
    use Singleton;
    use Resolver;

    public $_assets_path;

    public $_react_handles = [
        'react', //not necessary for vite, as it loads everything in build file, it can be removed as well
        'react-dom', //not necessary for vite, as it loads everything in build file, it can be removed as well
        'wp-api',
        'wp-i18n'
    ];

    public $_assets_source_paths = [
        'react-src/index.jsx'
    ];

    public function __construct( $assets_path ) {
        $this->_assets_path = $assets_path;
        $this->run();
    }

    public function _register_hooks(): void {
        add_action( 'admin_enqueue_scripts', [$this, '_admin_services'] );
    }

    public function _admin_services(): void {
        wp_enqueue_script( 'partial-checkout', $this->load()->resolve( $this->_assets_source_paths[0] ), $this->_react_handles, wp_rand(), true );
    }
}