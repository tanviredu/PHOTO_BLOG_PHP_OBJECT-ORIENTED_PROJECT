<?php

/**
 * setting the absolute file system  path for the
 *  root root directory the library path
 */

defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'opt'.DS.'lampp'.DS.'htdocs'.DS.'PHOTO_BLOG_PHP_OBJECT-ORIENTED_PROJECT');
    defined('LIB_PATH') ? null : define('LIB_PATH',SITE_ROOT.DS.'includes');

    require_once(LIB_PATH.DS.'config.php');
    require_once(LIB_PATH.DS.'database.php');

    /**
     *if you make a parent class you must import if before the child class
     * called thats why database_object class first then the user class
     * */
    require_once(LIB_PATH.DS.'database_object.php');
    require_once(LIB_PATH.DS.'user.php');
    require_once(LIB_PATH.DS.'session.php');
    require_once(LIB_PATH.DS.'functions.php');
?>