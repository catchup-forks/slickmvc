<?php
/**
 * Model - the base model
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace MyApp\Core;

use MyApp\Library\Database;

/**
 * Base model class all other models will extend from this base.
 */
abstract class Model
{
    /**
     * Hold the database connection.
     *
     * @var object
     */
    protected $_db;

    /**
     * Create a new instance of the database helper.
     */
    public function __construct()
    {
        /** connect to PDO here. */
        $this->_db = Database::get();
    }
}
