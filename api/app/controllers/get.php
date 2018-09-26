<?php

/*
 * This file is part of the Ocrend Framewok 3 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

use app\models as Model;
use Ocrend\Kernel\Sessions\Sessions;
use Ocrend\Kernel\Sessions\SessionException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Root
 *
 * @return json con información
 */
$app->get('/', function(Request $http) use($app) {
    return $app->json(['message' => 'COPROPAL v 0.1']);  
});

/**
 * Retorna la información del usuario conectado actualmente
 * 
 * @return json
 */
$app->get('/users/{id}', function(Request $http, $id) use($app) {
    $u = new Model\Users;
    return $app->json($u->getUserById($id));  
})->assert('id', '\d+');;

/**
 * Confirma el cambio de contraseña
 * 
 * @return json con información
*/
$app->get('/lostpass/recovery', function(Request $http) use($app) {
    $u = new Model\Users;
    return $app->json($u->changeTemporalPass());  
});