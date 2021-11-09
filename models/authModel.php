<?php
	require_once '../vendor/autoload.php';
	
	use GuzzleHttp\Client;

	// https://codigonaranja.com/como-usar-restful-web-services-con-php -> Link de la doc para hacer peticiones

	class AuthModel
	{
		protected function authLogin($user, $password)
		{
			$response = NULL;
			// Iniciamos el objeto de la petición
			$client = new Client([
			    'base_uri' => 'http://localhost/blog/api/v1/post.php', // Definir uri de la API
			    'timeout'  => 5.0,
			]);

			// Definimos los datos de envio
			$data = array(
				'user' => $user,
				'password' => $password,
			);

			$res = $client->request('POST', '', ['form_params' => $data]);

			if ($res->getStatusCode() == '200') { //Verifico que me retorne 200 = OK
				// debemos retornar el token si es que vamos a usar seguridad
			 	$response = $res->getBody();
			}

			return $response;
		}
	}

