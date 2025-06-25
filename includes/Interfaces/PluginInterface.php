<?php

namespace W3Aliens\PartialCheckout\Interfaces;

/**
 * Plugin Interface
 */
interface PluginInterface {
    /**
     * Get the plugin version
     *
     * @return string
     */
    public function _plugin_version(): string;

    /**
     * Implement Plugin Requirements Logic To Kick Start The Plugin
     *
     * @return boolean
     */
    public function _plugin_requirements(): bool;

    /**
     * Plugin Language Text Domain
     *
     * @return string
     */
    public function _plugin_text_domain(): string;

    /**
     * Plugin Base URL
     *
     * @return string
     */
    public function _plugin_base_url(): string;

    /**
     * Plugin Folder Absolute Path
     *
     * @return string
     */
    public function _plugin_folder_path(): string;

    /**
     * Plugin Assets URL
     *
     * @return string
     */
    public function _plugin_assets_url(): string;

    /**
     * Plugin Views Absolute Path
     *
     * @return string
     */
    public function _plugin_views_path(): string;

    /**
     * Define Enviroment Variables Required
     *
     * @return void
     */
    public function _initialize_enviroment_variables(): void;
}