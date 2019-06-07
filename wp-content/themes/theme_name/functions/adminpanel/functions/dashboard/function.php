<?php

function theme_name_admin_dashboard_widgets() {
	wp_add_dashboard_widget( 'theme_name_dashboard_widget_system_info', 'Информация о хостинге', 'theme_name_dashboard_widget_system_info_html' );
	wp_add_dashboard_widget( 'theme_name_dashboard_widget_upload_info', 'Информация о Медиафайлах', 'theme_name_dashboard_widget_upload_info_html' );

    wp_enqueue_style(
        'theme_name_admin_dashboard_widgets_styles',
        get_template_directory_uri() . '/functions/adminpanel/styles/dashboard.css?r=1'
    );
}
add_action( 'wp_dashboard_setup', 'theme_name_admin_dashboard_widgets' );

/**
 * Html function
 */
function theme_name_dashboard_widget_system_info_html( $post, $callback_args )
{
            $webserver      = $_SERVER['SERVER_SOFTWARE'];
            $php_version    = isset($_SERVER['PHP_VERSION']) ? $_SERVER['PHP_VERSION'] : phpversion();
            $mysql_version  = '';
            $mysql_db_name  = '';
            $mysql_db_tables_count  = '';
            $mysql_db_size  = '';


    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!mysqli_connect_errno()) {
            $mysql_version = $mysqli->server_info;
            $mysql_db_name = DB_NAME;

            $quaries = array(
                "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$mysql_db_name'",
                "SELECT table_schema '$mysql_db_name',
                    sum( data_length + index_length ) / 1024 / 1024 'Data Base Size in MB',
                    table_schema 'db name'
                    FROM information_schema.TABLES
                    GROUP BY table_schema ;
                ",
            );
            $results = array(
                 $mysqli->query($quaries[0]),
                 $mysqli->query($quaries[1]),
            );

            if ($results[0]->num_rows > 0) {
                while($row_0 = $results[0]->fetch_assoc()) {
                    $mysql_db_tables_count = ($row_0['COUNT(*)']);
                }
            }
            if ($results[1]->num_rows > 0) {
                while($row_1 = $results[1]->fetch_assoc()) {
                    if ( $row_1['db name'] === $mysql_db_name ) {
                        $mysql_db_size = round($row_1['Data Base Size in MB'], 1);
                        break;
                    }

                }
            }
    }
    $mysqli->close();

    $html = "
    <table class='theme_name-admin-widget-table'>
        <thead>
            <tr>
                <th>Параметр</th>
                <th class='theme_name-admin-widget-table-th-2'>Значение</th>
            </tr>
        </thead>
        <tbody>
            <!-- Separator -->
            <tr>
                <td>&nbsp;</td>
                <td class='theme_name-admin-widget-table-td-2'></td>
            </tr>
            <!-- Separator -->
            <tr>
                <td>web-сервер</td>
                <td class='theme_name-admin-widget-table-td-2'>$webserver</td>
            </tr>
            <!-- Separator -->
            <tr>
                <td>&nbsp;</td>
                <td class='theme_name-admin-widget-table-td-2'></td>
            </tr>
            <!-- Separator -->
            <tr>
                <td>PHP</td>
                <td class='theme_name-admin-widget-table-td-2'></td>
            </tr>
            <tr>
                <td>версия</td>
                <td class='theme_name-admin-widget-table-td-2'>$php_version</td>
            </tr>
            <!-- Separator -->
            <tr>
                <td>&nbsp;</td>
                <td class='theme_name-admin-widget-table-td-2'></td>
            </tr>
            <!-- Separator -->
            <tr>
                <td>MySQL</td>
                <td class='theme_name-admin-widget-table-td-2'></td>
            </tr>
            <tr>
                <td>версия</td>
                <td class='theme_name-admin-widget-table-td-2'>$mysql_version</td>
            </tr>
            <tr>
                <td>название базы</td>
                <td class='theme_name-admin-widget-table-td-2'>$mysql_db_name</td>
            </tr>
            <tr>
                <td>количество таблиц в базе</td>
                <td class='theme_name-admin-widget-table-td-2'>$mysql_db_tables_count</td>
            </tr>
            <tr>
                <td>размер базы, мб</td>
                <td class='theme_name-admin-widget-table-td-2'>$mysql_db_size</td>
            </tr>
        </tbody>
    </table>
    ";

    echo $html;
}

function theme_name_dashboard_widget_upload_info_html() {
	$html_path 	= '/wp-content/uploads';
	$f 			= $_SERVER['DOCUMENT_ROOT'] . $html_path;

    $io 		= popen ( '/usr/bin/du -sk ' . $f, 'r' );
    $size 		= fgets ( $io, 4096);
    $size_by_b 	= substr ( $size, 0, strpos ( $size, "\t" ) );
	$size_by_mb = round(($size_by_b/1024), 1);

    pclose ( $io );

	$html = "
    <table class='theme_name-admin-widget-table'>
        <thead>
            <tr>
                <th>Параметр</th>
                <th class='theme_name-admin-widget-table-th-2'>Значение</th>
            </tr>
        </thead>
        <tbody>
            <!-- Separator -->
            <tr>
                <td>&nbsp;</td>
                <td class='theme_name-admin-widget-table-td-2'></td>
            </tr>
            <!-- Separator -->
            <tr>
                <td>Размер каталога &quot;$html_path&quot;, мб:</td>
                <td class='theme_name-admin-widget-table-td-2'>$size_by_mb</td>
            </tr>
        </tbody>
    </table>
    ";

    echo $html;
}
