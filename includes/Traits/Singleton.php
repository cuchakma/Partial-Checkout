<?php

namespace W3Aliens\PartialCheckout\Traits;

trait Singleton {
    public static $instance = null;

    public static function instance( $args = [] ) {
        if ( self::$instance == null ) {
            self::$instance = new self( $args );
        }

        return self::$instance;
    }
}