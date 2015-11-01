<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date updated Sept 19, 2015
 */

/** Create alias for Router. */
use MyApp\Core\Router;
use MyApp\Library\Hooks;

/** Define routes. */
Router::any('', 'MyApp\Controllers\Welcome@index');
Router::any('subpage', 'MyApp\Controllers\Welcome@subPage');

Router::any('tickets', 'MyApp\Controllers\Tickets@index');
Router::any('tickets/browse', 'MyApp\Controllers\Tickets@browse');


/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('MyApp\Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = false;

/** Execute matched routes. */
Router::dispatch();
