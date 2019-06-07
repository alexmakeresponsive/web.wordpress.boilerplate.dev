<?php
/**
 * Created by PhpStorm.
 * User: aleksandrgorcakov
 * Date: 28.02.2019
 * Time: 22:11
 */

/**
* Add admin bar functions
*/
require_once __DIR__ . '/functions/bar.php';
require_once __DIR__ . '/functions/dashboard/function.php';

/**
* Add main menu functions
*/
require_once __DIR__ . '/functions/menu/main/function.php';

/**
* Add options: general
*/
require_once __DIR__ . '/functions/options/general/function.php';

/**
 * Add functons for edit custom post types
 */
require_once __DIR__ . '/functions/post_type/function.php';

/**
 * Add colomns in grid for custom types
 */
require_once __DIR__ . '/functions/post_type/projects.php';
require_once __DIR__ . '/functions/post_type/news.php';

require_once __DIR__ . '/functions/pages/list.php';
