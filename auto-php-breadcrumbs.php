<?php
function breadcrumbs($home = 'Home') {
  global $page_title; //global varable that takes it's value from the page that breadcrubs will appear on. Can be deleted if you wish.
    $breadcrumb  = '<div class="breadcrumb-container"><div class="container"><ol class="breadcrumb">';
    $root_domain = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'].'/';
    $breadcrumbs = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    $breadcrumb .= '<li><i class="fa fa-home"></i><a href="' . $root_domain . '" title="Home Page"><span>' . $home . '</span></a></li>';
    foreach ($breadcrumbs as $crumb) {
        $link = ucwords(str_replace(array(".php","-","_"), array(""," "," "), $crumb));
        $root_domain .=  $crumb . '/';
        $breadcrumb .= '<li><a href="'. $root_domain .'" title="'.$page_title.'"><span>' . $link . '</span></a></li>';
    }
    $breadcrumb .= '</ol>';
    $breadcrumb .= '</div>';
    $breadcrumb .= '</div>';
    return $breadcrumb;
}
echo breadcrumbs();
?>
