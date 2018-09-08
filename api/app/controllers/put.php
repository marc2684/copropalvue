<?php

/*
 * This file is part of the Ocrend Framewok 3 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

/**
 * Confirma el cambio de contraseña
 * 
 * @return json con información
*/
$app->put('/lostpass/recovery', function(Request $http) use($app) {
    $u = new Model\Users;
    return $app->json($u->changeTemporalPass());  
});
