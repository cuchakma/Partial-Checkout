<?php

namespace W3Aliens\PartialCheckout\Traits;

trait Resolver {
    
    private array $manifest = [];

    public function load(): object {
        $path = pc()->_plugin_folder_path . 'assets/.vite/manifest.json';

        $this->manifest = json_decode( file_get_contents( $path ), true );

        return $this;
    }

    private function resolve( string $path ): string {
        $url = '';

        if ( ! empty( $this->manifest[$path] ) ) {
            $url = pc()->_plugin_assets_url . "{$this->manifest[$path]['file']}";
        }

        return apply_filters( 'pc/assets/resolver/url', $url, $path );
    }
}