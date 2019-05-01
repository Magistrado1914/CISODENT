<?php
date_default_timezone_set('UTC');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//https://developers.facebook.com/docs/graph-api/reference/user
session_start();
require '../Libs/APIs/Facebook/config.php';
define('FACEBOOK_SDK_V4_SRC_DIR','../Libs/APIs/Facebook/');

require_once '../Libs/APIs/Facebook/autoload.php';

$fb = new Facebook\Facebook(array(
  'app_id'  => $config['App_ID'],
  'app_secret' => $config['App_Secret'],
    'default_graph_version' => 'v2.4'
));

try {
	
	$helper = $fb->getRedirectLoginHelper();
	
	$accessToken = $helper->getAccessToken();
	
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,work,website,email,first_name,birthday', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo $user['name'].' '.$user['first_name'].' '.$user['id'];
// OR
// echo $user->getName();

var_dump($user);

?>
