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
        'partial-checkout-react-compiler'   => '_react-source-compiler.js-BhTzXy3Z.js',
        'partial-checkout-react-app-source' => 'react-src/index.jsx'
    ];

    public function __construct( $assets_path ) {
        $this->_assets_path = $assets_path;
        $this->run(); // run the assets class
    }

    public function _register_hooks(): void {
        add_action( 'admin_enqueue_scripts', [$this, '_admin_services'] );
        add_filter( 'script_loader_tag', [$this, '_add_module_to_script'], 99999999, 3 );
    }

    public function _admin_services(): void {
        $this->_load(); // load the resolver
        foreach ( $this->_get_manifest_file() as $handle => $source_path ) {
            if ( wp_script_is( 'react', 'registered' ) && $handle == 'react-source-compiler' ) { // if react js and its utilities are loaded in wordpress by default, then do not load the react, react-dom source compiler files from the plugin
                continue;
            }
            wp_enqueue_script( $handle, $this->_resolve( $source_path ), $this->_react_handles, wp_rand(), true );
        }
    }

    public function _add_module_to_script( $tag, $handle, $src ) {
        if ( isset( $this->_get_manifest_file()[$handle] ) ) {
            $tag = '<script type=module src="' . esc_url( $src ) . '" id="' . $handle . '-js"></script>';
        }
        return $tag;
    }
}