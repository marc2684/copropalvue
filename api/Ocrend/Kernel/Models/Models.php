<?php

/*
 * This file is part of the Ocrend Framewok 3 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ocrend\Kernel\Models;

use Ocrend\Kernel\Router\IRouter;
use Ocrend\Kernel\Helpers\Functions;

/**
 * Clase para conectar todos los modelos del sistema y compartir la configuración.
 *
 * @author Brayan Narváez <prinick@ocrend.com>
 */
abstract class Models {

    /**
      * Pretende ser el id de la entidad manejada
      *
      * @var int 
    */
    protected $id = 0;

    /**
      * Contiene el id del usuario que tiene su sesión iniciada.
      *
      * @var int|null con id del usuario
    */
    protected $id_user = null;

    /**
      * Inicia la configuración inicial de cualquier modelo
      *                                    
    */
    protected function __construct() {
        global $session, $cookie;
                
        # Verificar sesión del usuario
        $session_name = $cookie->get('session_hash') . '__user_id';
        if(null !== $session->get($session_name)) {
           $this->id_user = $session->get($session_name);
        }
    }

    /**
      * Asigna el id desde un modelo, ideal para cuando queremos darle un valor numérico 
      * que proviene de un formulario y puede ser inseguro.
      *
      * @param mixed $id : Id a asignar en $this->id
      * @param string $default_msg : Mensaje a mostrar en caso de que no se pueda asignar
      *
      * @throws ModelsException
      */
    protected function setId($id, string $default_msg = 'No puede asignarse el id.') {
      if (null == $id || !is_numeric($id) || $id <= 0) {
        throw new ModelsException($default_msg);
      }

      $this->id = (int) $id;
    }

    /**
     * Da una respuesta válida para la api, si un elemento no existe devuelve un arreglo vacío.
     * 
     * @param mixed $result
     * @param bool $limit_one : Especifica si sólamente se quiere un resultado
     * 
     * @return array con la respuesta
     */
    protected function apiResponse($result, bool $limit_one = false) : array {
      if(false == $result) {
        return array();
      }

      return $limit_one ? $result[0] : $result;
    }

}
