<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require '../Libs/APIs/Facebook/config.php';
define('FACEBOOK_SDK_V4_SRC_DIR','../Libs/APIs/Facebook/');

require_once '../Libs/APIs/Facebook/autoload.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook\Facebook(array(
  'app_id'  => $config['App_ID'],
  'app_secret' => $config['App_Secret'],
    'default_graph_version' => 'v2.9'
));

//$helper = $facebook->getRedirectLoginHelper();
//$permissions = ['email', 'user_likes','publish_actions','user_managed_groups']; // optional
//$loginUrl = $helper->getLoginUrl('http://localhost/test/fbtest/post.php', $permissions);
//$loginUrl = $helper->getLoginUrl('http://localhost/test/fbtest/perfil.php', $permissions);
//echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $facebook->get('/me?fields=id,name', 'EAAIYy7dsHiIBABCl5oTwmhycvehJAo2lGKDUtcgQvuQ5kMVIGXr5FeHlx3eReAj9vRseUiLcZCoQZBYtMzsaB68oeXHDKQ9BGOmzicy3pmGHC8VBgdZBU2UCdgMK0Llv6ATbauP9UhPbhH2zXNXjuQZCostIcvv4cB6NKDqZA6nHgfU03ZBdYZC');
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  $user = $response->getGraphUser();


$Ruta= "../somosioticos/somosioticos_dialogflow.php";
if(is_readable($Ruta)){
    include_once $Ruta;
}


credenciales('Cisodent', '123456789');
// SI NO EXISTE LA BASE DE DATOS
//debug();
$mysqli = mysqli_connect("localhost", "root", "", "scrmm_cisodent");
if(!$mysqli){
    echo "Error, no se pudo conctar a la base de datos MySQL." . PHP_EOL;
    die();
}
// SI EL 'INTENT' EXISTE
if(intent_recibido("Informacion")){
    //$Saludos = obtener_variables()['Saludo_0'];
    
        enviar_texto_Plataforma("aaa".$user['name'], origen());  
     
}
if(intent_recibido("Detalles_Afirmacion")){
    echo "Existe.";
    $Nombres = obtener_variables()['Nombre_0'];
    $Telefono = obtener_variables()['Telefono_0'];
    $Distrito = obtener_variables()['Distrito_0'];
    FncnAgrgr_Prspcts($Nombres, $Telefono);
    //enviar_texto("__");   
}

/*if(intent_recibido("Calculadora")){
    $valor_0 = obtener_variables()['numero_0'];
    $valor_1 = obtener_variables()['numero_1'];
    $resultado = $valor_0 + $valor_1;
    enviar_texto("Luego de sumar los valores, te digo que el resultad es " . $resultado);
}*/
function Imagen($Actvr){
    switch($Actvr){
        case 0:
            break;
        case 1:
            if(intent_recibido("Imagen")){
                if(origen()=="FACEBOOK"){
                    $imagenes[0] = "https://http2.mlstatic.com/teipe-cobra-original-D_NQ_NP_285711-MLV20612629647_032016-F.jpg";
                    
                    
                }
                if(origen()=="TELEGRAM"){
                    $imagenes[0] = "https://http2.mlstatic.com/teipe-cobra-original-D_NQ_NP_285711-MLV20612629647_032016-F.jpg";
                    
                
                }
                enviar_imagenes($imagenes, origen());
                
            }
            break;
        default:
            break;
    }
}

function IniciarSesion($ID){
    global $mysqli;
    $Resultado = $mysqli->query("SELECT `usuario`.* FROM `usuario` WHERE `usuario`.`cod_usuario` = '$ID';");
    $Prdcts_0 = mysqli_fetch_assoc($Resultado);
    $Prdcts = $Prdcts_0['cod_usuario'];
    return $Prdcts;
}

function FncnAgrgr_Prspcts($Nombres, $Numero){
    global $mysqli;
    $mysqli->query("INSERT INTO `prospecto` (`cod_prospe`, `cod_empresa`, `ape_paterno`, `ape_materno`, `nombres`, `fec_contac`, `tel_cel`, `num_pros`, `flgprior`, `flg_sexo`, `est_reg`, `fec_reg`, `usr_reg`, `fec_mod`, `usr_mod`, `maq_ip`, `cod_tip_cap`, `observa`, `cod_tip_ori`, `flg_asisten`) VALUES('0', '', '', '', '$Nombres', '', '$Numero', '', '', '', '1', '', '01010101', '', '', '', '', '', '', '');");
    
}
function FncnActlzr_Prspcts($Cantidad){
    global $mysqli;
    $mysqli->query("UPDATE `prospecto`.* SET `0_prdctsvnts`.`Cntdd` = `0_prdctsvnts`.`Cntdd` + $Cantidad;");
    
}

?>