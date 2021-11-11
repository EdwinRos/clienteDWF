<?php


class Registro
{

    public function registroPaciente()
    {
        $url = "http://localhost:8080/DWF/v1/paciente/registro";


        if (isset($_POST['duiPaciente'])) {
            $arrayData = $_POST;
            unset($arrayData['action']);

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $data = json_encode($arrayData);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            $resp = curl_exec($curl);
            curl_close($curl);
            if($resp != null){
                header('Location: ../views/registro_completo.php');
            }
        } else {
            header('Location: ../views/registro.php');
        }
    }

    public function LoginPaciente(){
        $url = "http://localhost:8080/DWF/v1/paciente/login";



        if(isset($_POST["usuario"])){
            $loginArray  = $_POST;
            unset($loginArray["action"]);

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $data = json_encode($loginArray);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            $resp = curl_exec($curl);
            if($resp != null){
                $paciente = json_decode($resp,true);
                session_start();
                $_SESSION["username"] = $paciente["pacienteId"];
                $_SESSION["correo"] = $paciente["correoPaciente"];
                $_SESSION["nombrePaciente"] = $paciente["nombrePaciente"];
                $_SESSION["apellidoPaciente"] = $paciente["apellidoPaciente"];
                $_SESSION["fnacimiento"] = $paciente["fechaNacimiento"];

                header('Location: ../views/datos.php');
            }
        } else {
            header('Location: ../index.php');
        }


    }

    public function logOut(){
         session_start();
         session_unset();
         session_destroy();
    }

}

$registro = new Registro();

$action = null;

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

switch ($action) {
    case 'registro':
        $registro->registroPaciente();
        break;
    case 'login':
        $registro ->LoginPaciente();
        break;
    case "logOut":
        $registro ->logOut();
        break;
    default:
        throw new \Exception('Unexpected value');
}
