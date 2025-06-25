<?php

namespace W3Aliens\PartialCheckout\Traits;
use WP_Error;

trait Container {
    private $bindings = [];

    public function set( string $id, callable $factory ) {
        $this->bindings[$id] = $factory( $this );
    }

    public function get( string $id ) {
        if ( ! isset( $this->bindings[$id] ) ) {
            throw new WP_Error( 'invalid-class-namespace', "Namespace {$id} not registered" );
        }

        $factory = $this->bindings[$id];

        return $factory;
    }
}