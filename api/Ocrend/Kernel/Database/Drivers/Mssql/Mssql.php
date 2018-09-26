<?php

/*
 * This file is part of the Ocrend Framewok 3 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ocrend\Kernel\Database\Drivers\Mssql;

use Ocrend\Kernel\Database\Driver;
use \PDO;

/**
 * Driver de conexión con Mssql utilizando PDO
 * 
 * @author Marco Corona
 */
class Mssql extends \PDO implements Driver {

  /**
   * Constructor de la clase
   */
  public function __construct() {
    global $config;

    # Configuración
    $mssql = $config['database']['drivers']['mssql'];

    # Establecer conexión, si la base de datos no existe, es creada
    parent::__construct(
      'sqlsrv:Server='.$mssql['server'].'\\'.$mssql['instance'].';Database='.$mssql['name'].';ConnectionPooling=0',
      'sa',
      'Compac08',
      array(
          \PDO::ATTR_EMULATE_PREPARES => false,
          \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
      )
    );

  }
    
  /**
   * Escapa caracteres para evitar sql injection
   * 
   * @param string $param : Parámetro
   * 
   * @return string escapado
   */
  public function scape($param) : string {
    if (null === $param) {
        return '';
    }
    if (is_numeric($param) and $param <= 2147483647) {
        if (explode('.', $param)[0] != $param) {
            return (string) $param;
        }
        return (string) $param;
    }
    return (string) trim(str_replace(['\\', "\x00", '\n', '\r', "'", '"', "\x1a"], ['\\\\', '\\0', '\\n', '\\r', "\'", '\"', '\\Z'], $param));
  }

    /**
     * Selecciona elementos de una tabla y devuelve un objeto
     * 
     * @param string $fields: Campos
     * @param string $table: Tabla
     * @param null|string $inners: Inners
     * @param null|string $where : Condiciones
     * @param null|int $limit: Límite de resultados
     * @param string $extra: Instrucciones extras
     * 
     * @return bool|stdClass
     */
    public function select(string $fields, string $table, $inners = null, $where = null, $limit = null, string $extra = '') {
      $query = "SELECT "
      . (null !== $limit ? "TOP ($limit) " : '')
      . "$fields FROM $table $inners "
      . (null != $where ? "WHERE $where" : '') 
      . " $extra ";
      
      $result = $this->query($query);

      // print_r($query);

      if(false != $result && sizeof($result)) {
        $matriz = (array) $result->fetchAll(PDO::FETCH_ASSOC);
        $result->closeCursor();

        return $matriz;
      }

        return false;
    }

    /**
     * Actualiza elementos de una tabla en la base de datos según una condición
     *
     * @param string $table: Tabla a actualizar
     * @param array $e: Arreglo asociativo de elementos, con la estrctura 'campo_en_la_tabla' => 'valor_a_insertar_en_ese_campo',
     *                  todos los elementos del arreglo $e, serán sanados por el método sin necesidad de hacerlo manualmente al crear el arreglo
     * @param null|string $where: Condición que indica quienes serán modificados
     * @param null|string $limite: Límite de elementos modificados, por defecto los modifica a todos
     *
     * @throws \RuntimeException si el arreglo está vacío
     * @return int con la cantidad de tablas afectadas
    */
    public function update(string $table, array $e, $where = null, $limit = null) : int {
        if (sizeof($e) == 0) {
            throw new \RuntimeException('El arreglo pasado por $this->db->update(\'' . $table . '\'...) está vacío.');
        }

        $query = "UPDATE"
        . (null !== $limit ? "TOP ($limit) " : '')
        . "$table SET ";
        foreach ($e as $campo => $valor) {
            $query .= $campo . '=\'' . $this->scape($valor) . '\',';
        }
        $query[strlen($query) - 1] = ' ';

        return $this->exec($query
        . (null != $where ? "WHERE $where" : '')
        );
    }

    /**
     * Inserta una serie de elementos a una tabla en la base de datos
     *
     * @param string $table: Tabla a la cual se le va a insertar elementos
     * @param array $e: Arreglo asociativo de elementos, con la estrctura 'campo_en_la_tabla' => 'valor_a_insertar_en_ese_campo',
     *                  todos los elementos del arreglo $e, serán sanados por el método sin necesidad de hacerlo manualmente al crear el arreglo
     *
     * @throws \RuntimeException si el arreglo está vacío
     * 
     * @return int con el PRIMARY AUTO_INCREMENT de el último elemento insertado
     */
    public function insert(string $table, array $e) : int {
      if (sizeof($e) == 0) {
        throw new \RuntimeException('El arreglo pasado por $this->db->insert(\'' . $table . '\',...) está vacío.');
      }

      $query = "INSERT INTO $table (";
      $values = '';
      foreach ($e as $campo => $v) {
          $query .= $campo . ',';
          $values .= '\'' . $this->scape($v) . '\',';
      }
      $query[strlen($query) - 1] = ')';
      $values[strlen($values) - 1] = ')';
      $query .= ' VALUES (' . $values . ';';

      $this->exec($query);

      return $this->lastInsertId(); 
    }

    /**
     * Elimina elementos de una tabla y devuelve la cantidad de filas afectadas
     * 
     * @param string $table: Tabla a la cual se le quiere remover un elemento
     * @param null|string $where: Condición de borrado que define quien/quienes son dichos elementos
     * @param null|string $limit: Por defecto se limita a borrar un solo elemento que cumpla el $where
     * 
     * @return int cantidad de filas afectadas
     */
    public function delete(string $table, $where = null, $limit = null) : int {
      return $this->exec("DELETE ". (null !== $limit ? "TOP ($limit)" : '') ." FROM $table " . (null != $where ? "WHERE $where" : ' '));
    }

    /**
     * __destruct()
     */
    public function __destruct() {}
}
