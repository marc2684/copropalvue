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
 * Registra un nuevo usuario
 * 
 * @return json con información
*/
$app->post('/register', function(Request $http) use($app) {
    $u = new Model\Users;
    return $app->json($u->register());  
});

/**
 * Registra un nuevo usuario
 * 
 * @return json con información
*/
$app->post('/login', function(Request $http) use($app) {
    $u = new Model\Users;
    return $app->json($u->login());  
});

/**
 * Solicita recuperar contraseña
 * 
 * @return json con información
*/
$app->post('/lostpass/send', function(Request $http) use($app) {
    $u = new Model\Users;
    return $app->json($u->lostpass());  
});
