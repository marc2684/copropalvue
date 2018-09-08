<?php

/*
 * This file is part of the Ocrend Framewok 3 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 * @author Brayan Narváez <prinick@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

use app\models as Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ocrend\Kernel\Models\ModelsException;

/**
 * Convertir esta api en RESTFULL para recibir JSON
 */
$app->before(function (Request $request) use ($app) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

/**
 * Servidores autorizados para consumir la api.
 */
$app->after(function (Request $request, Response $response) {
    global $config;

    $response->headers->set('Access-Control-Allow-Origin', $config['api']['origin']);
});