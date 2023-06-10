<?php
include_once 'models/UserModel.php';

class UserController{
    public function login(){
        $_respuestas = new responses();

        if (isset($_POST)) {
            $user = isset($_POST['user']) ? $_POST['user'] :false;
            $pass = isset($_POST['password']) ? $_POST['password'] :false;
            
            $user = Utils::limpiarData($user,"texto");
            $pass = Utils::limpiarData($pass,"pass");

            $user = filter_var($user, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ\s]+$/")));

            if(preg_match('/^([a-zA-Z][0-9])/',$user)){
                $user = false;
            }
            
            if($user && $pass){
            // Conexion con LDAP
            $ldapconn = ldap_connect("buzon.uach.mx","389")
            or die("Could not connect to LDAP server.");
            $id = "uid=".$user.",ou=People,o=uach.mx,o=uach.mx";

            $ldapbind = ldap_bind($ldapconn, $id, $pass);
    
            ldap_close($ldapconn);

            if($ldapbind){

                $_UserModel = new UserModel();
            
                $_UserModel->setUsuario_user($user);
                $_UserModel->setUsuario_pass($pass);

                $identidad = $_UserModel->login();

                if(!empty($identidad) && isset($identidad[0]['usuario_tipo'])){
                                      
                    $_SESSION['identidad'] = $identidad;
                    if($identidad[0]['usuario_tipo'] == "admin"){
                        $_SESSION['admin'] = true;
                    }elseif($identidad[0]['usuario_tipo'] == "user"){
                        $_SESSION['user'] = true;
                    }

                    $_respuestas->response;
                    $_respuestas->response["result"]["mensaje"] = "Login correcto";
                }else{
                    $_respuestas->error_u00002();
                    $_respuestas->response["result"]["mensaje"] = "Usuario o contraseña incorrectos";
                }
            }else{
                $_respuestas->error_u00002();
                $_respuestas->response["result"]["mensaje"] = "Usuario o contraseña incorrectos";
            }
            
            }else{
                $_respuestas->error_u00001();
            }

            
        }else{
            $_respuestas->error_u00001();
        }

        $_SESSION['respuesta'] = [
            "status" => $_respuestas->response["status"],
            "mensaje" => $_respuestas->response["result"]["mensaje"]
        ];
        header("Location:".base_url);
    }

    // public function activar(){
    //     $_respuestas = new responses();
        
    //     $id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] :false;
    //     $id = Utils::limpiarData($id,"int");
    //     $id = Utils::validarData($id,"int");
        
    //     $status = isset($_GET['status']) && !empty($_GET['status']) ? $_GET['status'] :false;
    //     $status = Utils::limpiarData($status,"boolean");
    //     $status = Utils::validarData($status,"boolean");

    //     if($id){
    //         $_UserModel = new UserModel();
    //         $_UserModel->setUsuario_id($id);
    //         $_UserModel->setUsuario_activo($status);
    //         $usuario = $_UserModel->updateActivo();
    //         if($usuario){
    //             $_respuestas->response["result"]["mensaje"] = "El usuario a sido activado";
    //         }else{
    //             $_respuestas->error_u00001();
    //         }
    //     }else{
    //         $_respuestas->error_u00001();
    //     }
        
    //     $_SESSION['respuesta'] = [
    //         "status" => $_respuestas->response["status"],
    //         "mensaje" => $_respuestas->response["result"]["mensaje"]
    //     ];

    //     header("Location:".base_url."Page/settings");
    // }

    // public function signup(){
    //     $_respuestas = new responses();
    //     // r 
    //     $user = isset($_POST['user']) && !empty($_POST['user']) ? $_POST['user'] :false;
    //     $user = Utils::limpiarData($user,"texto");
    //     $user = Utils::validarData($user,"texto");

    //     $pass = isset($_POST['pass']) && !empty($_POST['pass']) ? $_POST['pass'] :false;
    //     $pass = Utils::limpiarData($pass,"pass");
    //     $pass = Utils::validarData($pass,"pass");

    //     // Conexion con LDAP
    //     $ldapconn = ldap_connect("buzon.uach.mx","389")
    //     or die("Could not connect to LDAP server.");
    //     $id = "uid=".$user.",ou=People,o=uach.mx,o=uach.mx";

    //     try {
    //         $ldapbind = ldap_bind($ldapconn, $id, $pass);
    //     } catch (Exception $e) {
    //         echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    //     }

    //     ldap_close($ldapconn);

    //     if(isset($ldapbind) && $ldapbind){
    //         $_UserModel = new UserModel();
            
    //         $_UserModel->setUsuario_user($user);
    //         $_UserModel->setUsuario_pass($pass);

    //         $save = $_UserModel->save();

    //         if($save){
    //             $_respuestas->response["result"]["mensaje"] = "Registro correcto";
    //         }else{
    //             $_respuestas->error_u00001();
    //         }

    //     }else{
    //         $_respuestas->error_u00001();
    //     }

    //     $_SESSION['respuesta'] = [
    //         "status" => $_respuestas->response["status"],
    //         "mensaje" => $_respuestas->response["result"]["mensaje"]
    //     ];
        
    //     header("Location:".base_url);
    // }

    public function logout(){
        if (isset($_SESSION['identidad'])) {
            unset($_SESSION['identidad']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        header("Location:".base_url);
    }
}