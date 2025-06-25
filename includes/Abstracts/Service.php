<?php

namespace W3Aliens\PartialCheckout\Abstracts;

abstract class Service {

    /**
     * Methods That Will Be Called, When 'run' Method Is Called
     *
     * @var array
     */
    protected $_runnable_methods = ['_register_hooks'];

    /**
     * All Wordpress Hooks Are Called Within This Method
     *
     * @return void
     */
    abstract protected function _register_hooks(): void;

    /**
     * Responsible For Call All Methods
     *
     * @return void
     */
    public function run(): void {
        foreach ( $this->_runnable_methods as $method ) {
            $this->{$method}();
        }
    }
}