<?php

define('DB_NAME',       'db');
define('DB_USER',       'root');
define('DB_PASSWORD',   'password');
define('DB_HOST',       'mysql');
define('DB_CHARSET',    'utf8mb4');
define('DB_COLLATE',    '');	// utf8mb4_unicode_520_ci

$alphabet_cyr = [
                    'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
                    'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
                    'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
                    'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
                ];
$alphabet_lat = [
                    'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
                    'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya',
                    'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P',
                    'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
                ];

$mysqli         = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

function query_update($post_name_value, $post_ID_value) {
    global $alphabet_cyr;
    global $alphabet_lat;

    $post_name_value_decode = urldecode($post_name_value);
    $post_name_value_lat    = str_replace($alphabet_cyr, $alphabet_lat, $post_name_value_decode);

    return "UPDATE `wp_posts` SET post_name = '$post_name_value_lat' WHERE ID = '$post_ID_value';";
}

$query_select   = "SELECT ID, post_type, post_name FROM `wp_posts` WHERE post_type = 'post_type_news';";




$results = $mysqli->query($query_select);
$results_num_rows = $results->num_rows;

echo "rows count = " . $results_num_rows;
echo "<hr>";

if ($results_num_rows > 0) {
    while($row = $results->fetch_assoc()) {

        $response_update = $mysqli->query(query_update($row['post_name'], $row['ID']));

        if ( $response_update === FALSE ) {
            echo "UPDATE row: error. ID = " . $row['ID'];
        } else {
            echo "UPDATE row: success.";
        }
            echo "<br>";
    }
}
