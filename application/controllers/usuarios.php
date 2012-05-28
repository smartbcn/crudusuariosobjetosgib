<?php
/**
 * Usuarios controller
 *
 * Controller for application usuarios.
 * 
 * @uses       none
 * @package    Usuarios
 * @subpackage Controller
 */
/**
 * Incluir librerias 
 */
require_once ($config['models']."/usuarios.php");

/**
 * Settings iniciales 
 */
//$usuariosModel = new usuariosModel();

//$datos=$usuariosModel -> initUserData();
$datos=usuariosModel::initUserData();
/**
 * Inicializacion de variables 
 */
$usuario='';
$content='';
$route=route('usuarios', 'select');     

/**
 * Parametrizar 
 */

/**
 * Procesar 
 */
//$link=connectDBServer($config);
$db = new dbConnect($config);

switch($route['action'])
{
    case 'delete':
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert            
            if ($_POST['delete']=='Si')
                //$usuariosModel -> procesarDelete($config['usersUploadDirectory']."/images", $config);
            	usuariosModel::procesarDelete($db,$config['usersUploadDirectory']."/images", $config);
            header("Location: ?controller=usuarios&action=select"); 
            break;
        }
        else
        {
            //$usuarios= $usuariosModel -> readUserById($link, $_GET['usuario']);
        	$usuarios= usuariosModel::readUserById($db, $_GET['usuario']);
            $viewVar=array('db'=>$db, 'usuarios'=>$usuarios,'helper'=>$config['helpers']);     
        }
    break;    
    case 'update':       
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert            
            //$usuariosModel ->procesarUpdate($config['usersUploadDirectory']."/images", $config);
        	usuariosModel::procesarUpdate($db,$config['usersUploadDirectory']."/images", $config);
            header("Location: ?controller=usuarios&action=select"); 
            break;
        }
        else
        {
            //$datos=$usuariosModel -> readUserData($link, $config['usersUploadDirectory']."/images");
        	$datos=usuariosModel::readUserData($db, $config['usersUploadDirectory']."/images");
        }        
    case 'insert':
        // Si POST          
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert
            //$usuariosModel -> procesar($config['usersUploadDirectory']."/images", $config);
        	usuariosModel::procesar($db,$config['usersUploadDirectory']."/images", $config);        	
            header("Location: ?controller=usuarios&action=select");            
        }
        else
        {
            //Mostrar formulario
            $viewVar=array('db'=>$db,'usuario'=>'','datos'=>$datos,'helper'=>$config['helpers']);           
        }                             
    break;
    case 'select':
    default:   
        //$usuarios= $usuariosModel ->readUsers($link);
    	$usuarios= usuariosModel::readUsers($db);
        $viewVar=array('db'=>$db,'usuarios'=>$usuarios,'helper'=>$config['helpers']);
    break;
}
/**
 * Mostrar 
 */
$content=view($viewVar, $config['views'].'/'.$route['controller'].'/'.$route['action'].'.phtml');
$db -> disconnectDBServer();
?>