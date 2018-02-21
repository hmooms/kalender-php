<?php
function route(){

  $url = splitUrl();

  if(!$url['controller']){
    require(ROOT . 'controller/' . DEFAULT_CONTROLLER . 'controller.php');
    call_user_func('index');
  } else if(file_exists(ROOT . 'controller/' . $url['controller'] . '.php')){
    require(ROOT . 'controller/' . $url['controller'] . '.php');
    if(function_exists($url['action'])){
      if($url['params']) {
        call_user_func_array($url['action'], $url['params']);
      } else {
        call_user_func($url['action']);
      }
    } else {
      require(ROOT . 'controller/ErrorController.php');
      call_user_func('error_404');
    }
  } else {
    require(ROOT . 'controller/ErrorController.php');
    call_user_func('error_404');
  }
}

function splitUrl() {

  if (isset($_GET['url'])) {
    $tmp_url = trim($_GET['url'], "/");
    $tmp_url = filter_var($tmp_url, FILTER_SANITIZE_URL);
    $tmp_url = explode("/", $tmp_url);

    $url['controller'] = isset($tmp_url[0]) ? ucwords($tmp_url[0] . 'controller') : null;
    $url['action'] = isset($tmp_url[1]) ? $tmp_url[1] : 'index';
    unset($tmp_url[0], $tmp_url[1]);
    $url['params'] = array_values($tmp_url);
    return $url;
  }
}
