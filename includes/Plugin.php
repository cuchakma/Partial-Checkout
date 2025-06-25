<?php

namespace W3Aliens\PartialCheckout;

use W3Aliens\PartialCheckout\Actions\Menu;
use W3Aliens\PartialCheckout\Actions\Assets;
use W3Aliens\PartialCheckout\Traits\Container;
use W3Aliens\PartialCheckout\Traits\Singleton;
use W3Aliens\PartialCheckout\Abstracts\Service;
use W3Aliens\PartialCheckout\Interfaces\AdminInterface;
use W3Aliens\PartialCheckout\Interfaces\PluginInterface;
use W3Aliens\PartialCheckout\Interfaces\PublicInterface;

/**
 *  Base Plugin Class
 */
class Plugin extends Service implements PluginInterface, PublicInterface, AdminInterface {
    use Singleton;
    use Container;

    /**
     * Plugin Version
     *
     * @var string
     */
    public $_plugin_version;

    /**
     * Plugin Text Domain
     *
     * @var string
     */
    public $_plugin_text_domain;

    /**
     * Base Plugin Url
     *
     * @var string
     */
    public $_plugin_base_url;

    /**
     * Base Plugin Absolute Folder Path
     *
     * @var string
     */
    public $_plugin_folder_path;

    /**
     * Plugin Assets URL Path
     *
     * @var string
     */
    public $_plugin_assets_url;

    /**
     * Plugin View Path
     *
     * @var string
     */
    public $_plugin_views_path;

    /**
     * Methods That Will Be Called, When 'run' Method Is Called
     *
     * @var array
     */
    protected $_runnable_methods = ['_initialize_enviroment_variables', '_register_container_services', '_register_hooks'];

    public function __construct() {
        if ( $this->_plugin_requirements() ) {
            $this->run();
        }
    }

    public function _initialize_enviroment_variables(): void {
        $this->_plugin_version     = $this->_plugin_version();
        $this->_plugin_text_domain = $this->_plugin_text_domain();
        $this->_plugin_base_url    = $this->_plugin_base_url();
        $this->_plugin_folder_path = $this->_plugin_folder_path();
        $this->_plugin_assets_url  = $this->_plugin_assets_url();
        $this->_plugin_views_path  = $this->_plugin_views_path();
    }

    public function _register_container_services() {
        $this->set( Assets::class, function ( $container ) {
            return Assets::instance( $this->_plugin_assets_url );
        } );

        $this->set( Menu::class, function ( $container ) {
            return Menu::instance();
        } );
    }

    /**
     * Get the plugin version
     *
     * @return string
     */
    public function _plugin_version(): string {
        return '1.0.0';
    }

    /**
     * Implement Plugin Requirements Logic To Kick Start The Plugin
     *
     * @return boolean
     */
    public function _plugin_requirements(): bool {
        return true;
    }

    /**
     * Plugin Language Text Domain
     *
     * @return string
     */
    public function _plugin_text_domain(): string {
        return 'partial-checkout';
    }

    /**
     * Plugin Base URL
     *
     * @return string
     */
    public function _plugin_base_url(): string {
        return plugin_dir_url( PC_ROOT_FILE );
    }

    /**
     * Plugin Folder Absolute Path
     *
     * @return string
     */
    public function _plugin_folder_path(): string {
        return plugin_dir_path( PC_ROOT_FILE );
    }

    /**
     * Plugin Assets URL
     *
     * @return string
     */
    public function _plugin_assets_url(): string {
        return $this->_plugin_base_url() . 'assets/';
    }

    /**
     * Plugin Views Absolute Path
     *
     * @return string
     */
    public function _plugin_views_path(): string {
        return $this->_plugin_folder_path() . 'views/';
    }

    /**
     * All Wordpress Hooks Are Called Within This Method
     *
     * @return void
     */
    protected function _register_hooks(): void {
        add_action( 'init', [$this, '_admin_services'] );
        add_action( 'init', [$this, '_public_services'] );
    }

    public function _admin_services(): void {
        $this->get( Assets::class );
        $this->get( Menu::class );
    }

    public function _public_services(): void {
    }
}
