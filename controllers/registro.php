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
    default:
        throw new \Exception('Unexpected value');
}

