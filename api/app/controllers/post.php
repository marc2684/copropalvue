<?php 

/*
 * This file is part of the Ocrend Framewok 2 package.
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
$app->post('/', function(Request $http) use($app) {
    return $app->json([]);  
});
