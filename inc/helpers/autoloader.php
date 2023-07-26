<?php
/**
 * Autoloader file for theme
 * 
 * @package tomatotheme
 */

 namespace TOMATOTHEME\Inc\Helpers;

 /**
  * Autoloader function.
  *
  * @param string $resource Source namespace.
  *
  * @return void
  */

  // Parameter represents the requested class or trait to load.
  function autoloader ( $resource = '' ) {
    $resource_path = false;
    $namespace_root = 'TOMATOTHEME\\';
    $resource = trim( $resource, '\\' );

    if ( empty( $resource ) || strpos( $resource, '\\' ) === false || strpos( $resource, $namespace_root ) !== 0 ) {
        // Not our namespace
        return;
    }

    // Remove root namespace to get the actual class or trait name
    $resource = str_replace( $namespace_root, "", $resource );

    $path = explode(
        '\\',
        str_replace('_', '-', strtolower( $resource ) )
    );

    /**
     * Time to determine which type of resource path it is,
     * so that we can deduce the correct file path for it.
     */
    if ( empty( $path[0] ) || empty( $path[1] ) ) {
        return;
    }

    $directory = '';
    $file_name = '';

    if ( 'inc' === $path[0] ) {
        switch ( $path[1] ) {
            case 'traits':
                $directory = 'traits';
                $file_name = sprintf( 'trait-%s', trim( strtolower( $path[2] ) ) );
                break;

            case 'widgets':
            case 'blocks':
                /**
                 * If there is a class name provided for specific directory then load that,
                 * otherwise find in inc/ directory.
                 */
                if ( ! empty( $path[2] ) ) {
                    $directory = sprintf( 'classes/%s', $path[1] );
                    $file_name = sprintf( 'class-%s', trim( strtolower( $path[2] ) ) );
                    break;
                }
            default:
                $directory = 'classes';
                $file_name = sprintf( 'class-%s', trim( strtolower( $path[1] ) ) );
                break;
        }

        $resource_path = sprintf('%s/inc/%s/%s.php', untrailingslashit( 'TOMATOTHEME_DIR_PATH' ), $directory, $file_name );

    }

    /**
     * if $is_valid_file has 0 means valid path or 2 means the file path contains a windows drive path
     */
    $is_valid_file = validate_file( $resource_path );

    if ( !empty( $resource_path ) && file_exists( $resource_path ) && ( 0 === $is_valid_file || 2 === $is_valid_file ) ) {
        // File exists and is valid
        require_once( $resource_path );
    }

  }

  spl_autoload_register( '\TOMATOTHEME\Inc\Helpers\autoloader' );