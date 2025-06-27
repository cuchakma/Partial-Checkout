<?php

namespace W3Aliens\PartialCheckout\Traits;

trait Resolver {

    private array $manifest = [];

    public function _load(): object {
        $path = pc()->_plugin_folder_path . 'assets/.vite/manifest.json';

        $this->manifest = json_decode( file_get_contents( $path ), true );

        return $this;
    }

    public function _get_manifest_file() {
        $_assign_handles = [];

        foreach ( $this->manifest as $key => $value ) {
            $_file_name            = isset( $value['file'] ) ? $value['file'] : 'partial/partial-handle-' . wp_rand( 10000, 4294967295 );
            $_split_file_name      = explode( '/', $_file_name );
            $_last_file_name       = $_split_file_name[count( $_split_file_name ) - 1];
            $_last_file_name_split = explode( '.', $_last_file_name );

            $_final_handle_name = is_array( $_last_file_name_split ) && isset( $_last_file_name_split[0] ) ? $_last_file_name_split[0] : 'partial-handle-' . wp_rand( 10000, 4294967295 );

            $_assign_handles[$_final_handle_name] = $value['file'];
        }

        return $_assign_handles;
    }

    private function _resolve( string $path ): string {
        $url = pc()->_plugin_assets_url . $path;
        return apply_filters( 'pc/assets/resolver/url', $url, $path );
    }
}