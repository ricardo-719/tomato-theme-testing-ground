<?php
/**
 * Bootstraps the theme
 * 
 * @package tomatotheme
*/

namespace TOMATOTHEME\Inc;

use TOMATOTHEME\Inc\Traits\Singleton;

class tomatotheme {
    use Singleton;

    protected function __construct() {

        // Load class
        $this->set_hooks();
    }

    protected function set_hooks() {
        // Actions and filters
    }
}