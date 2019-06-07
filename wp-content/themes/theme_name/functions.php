<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//add consts
require_once __DIR__ . '/functions/constants.php';

$collection         = new Theme\ThemeName\Collection( get_consts(array('data_export' => true)) );
$project            = new Theme\ThemeName\Post\Type\Project($collection->get_project_collection());
$options_general    = new Theme\ThemeName\Options\General($collection->get_options_collection('general'));

//add styles and scripts
require_once __DIR__ . '/functions/design.php';

require_once __DIR__ . '/functions/nav/function.php';

require_once __DIR__ . '/functions/http.php';
require_once __DIR__ . '/functions/date.php';
require_once __DIR__ . '/functions/img.php';
require_once __DIR__ . '/functions/content.php';

//add custom post types
require_once __DIR__ . '/functions/posts/types.php';
//add notify
require_once __DIR__ . '/functions/taxonomy/types.php';

require_once __DIR__ . '/functions/adminpanel/functions/plugins/plugin-name/functions.php';

//add custom pagination
require_once __DIR__ . '/functions/pagination/paged.php';
require_once __DIR__ . '/functions/pagination/ajax/function.php';

require_once __DIR__ . '/functions/adminpanel/function.php';
