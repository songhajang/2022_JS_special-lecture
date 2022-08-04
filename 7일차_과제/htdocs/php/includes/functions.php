<?php

include(dirname(__DIR__ . '..').'/controllers/user.php');
// class User {

//     public function index(){
//       echo 'INDEX';
//     }
// }

$name1 = 'user';
$name2 = 'index';
$uu = new $name1();  
// $uu->{$name2}();

/**
 * Displays site name.
 */
function site_name()
{
    echo config('name');
}

/**
 * Displays site url provided in conig.
 */
function site_url()
{
    echo config('site_url');
}

/**
 * Displays site version.
 */
function site_version()
{
    echo config('version');
}

/**
 * Website navigation.
 */
function nav_menu($sep = ' | ')
{
    $nav_menu = '';
    $nav_items = config('nav_menu');
    foreach ($nav_items as $uri => $name) {
        $class = str_replace('page=', '', $_SERVER['QUERY_STRING']) == $uri ? ' active' : '';
        $url = config('site_url') . '/' . (config('pretty_uri') || $uri == '' ? '' : '?page=') . $uri;
        $nav_menu .= '<a href="' . $url . '" title="' . $name . '" class="item ' . $class . '">' . $name . '</a>' . $sep;
    }

    echo trim($nav_menu, $sep);
}


/**
 * Displays page content. It takes the data from
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function page_content()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    // $pages = array_push($_GET['page']);
    $path = getcwd() . '/' . config('content_path') . '/' . $page . '.phtml';

    if (! file_exists($path)) {
        $path = getcwd() . '/' . config('content_path') . '/' . $page . '.php';
        if (! file_exists($path)) {
            $path = getcwd() . '/' . config('content_path') . '/404.phtml';
        }else{
            echo include($path);
            return 0;
        }
    }

    echo file_get_contents($path);
    page_contents($pages);
}

function page_contents($pages){
    echo $pages;

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path = getcwd() . '/' . config('content_path') . '/' . $pages. '/'. $page . '.phtml';


    if (! file_exists($path)) {
        $path = getcwd() . '/' . config('content_path') . '/' . $pages. '/'. $page . '.php';
        if (! file_exists($path)) {
            $path = getcwd() . '/' . config('content_path') . '/404.phtml';
        }else{
            echo include($path);
            return 0;
        }
    }
}

/**
 * 
 */
function api_router($params){
    $RouterClass = new $params[1]();
    $RouterClass->{$_SERVER['REQUEST_METHOD']}($_SERVER['REQUEST_METHOD']);
    header('Content-Type: application/json');
}

/**
 * Displays page title. It takes the data from
 * URL, it replaces the hyphens with spaces and
 * it capitalizes the words.
 */
function page_title()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';
    echo ucwords(str_replace('-', ' ', $page));
}

/**
 * Starts everything and displays the template.
 */
function init()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    // api여부 판단
    $parameters = explode('/', $page);
    if($parameters[0] == "api"){
        api_router($parameters);
    }else{
        require config('template_path') . '/template.php';
    }
}
?>