<?php
////////////////////////////////////////////////////////////////////////////////
//
//  PROMOONLINE - TODOS OS DIREITOS RESERVADOS
//  Copyright 2009 - Lucas Zerma - lzerma@gmail.com
//
//  Classe por ser o prototipo do client webservice.
//
////////////////////////////////////////////////////////////////////////////////
/**
 * @classDescription Client of webservice.
 * @see www.promoooline.com.br
 * @author Lucas Zerma <lucas@promoonline.com.br>
 * @copyright PromoOnline Mobile Marketing.
 */
class Postgres
{
	/**
	 * @var
	 */
	private $bdhost = "localhost";
	/**
	 * @var
	 */
	private $bduser = "sys_rcplay";
	/**
	 * @var
	 */
	private $dbname = "sys_mobilizeweb";
	/**
	 * @var
	 */
	private $bdpass = "sys_rcplay";
	/**
	 * @var
	 */
	private $conn = null;
	/**
	 *
	 * @return
	 */
	public function Postgres ()
	{
		$conn_string = "host=$this->bdhost port=5432 dbname=$this->dbname user=$this->bduser password=$this->bdpass";
		$this->conn = pg_connect($conn_string) or $this->throwError();
	}
	/**
	 *
	 * @param object $query
	 * @param object $lastid [optional]
	 * @return
	 */
	public function insert ($query)
	{
		$ret = @pg_query($this->conn, $query);
		if ($ret != false) {
			return $ret;
		}
		return false;
	}
	/**
	 *
	 * @param object $query
	 * @return
	 */
	public function exec ($query)
	{
		$error = false;
		$ret = @pg_query($this->conn, $query) or $error = true;
		if ($error) {
			return false;
		} else {
			return pg_fetch_object($ret);
		}
	}
	/**
	 *
	 * @param object $query
	 * @return
	 */
	public function fetchAll ($query, $to_array = false)
	{
		$ret = pg_query($this->conn, $query);
		if (! $ret) {
			return false;
		} else {
			if ($to_array) {
				return pg_fetch_all($ret);
			} else {
				return (object) pg_fetch_all($ret);
			}
		}
	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $query
	 * @param unknown_type $toArray
	 */
	public function fetchRow($query, $to_array = false) {
		$ret = pg_query($this->conn, $query);
		if (! $ret) {
			return false;
		} else {
			if ($to_array) {
				return @reset(pg_fetch_all($ret));
			} else {
				return (object) @reset(pg_fetch_all($ret));
			}
		}
	}
	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $object
	 */
	public function insertObject ($object, $lastid = true)
	{
		try {
			$className = get_class($object);
			$properties = get_class_vars($className);
			$pk = null;
			foreach ($properties as $property => $value) {
				$properties[$property] = $object->$property;
				if (substr($property, 0, 3) == "pk_") {
					$pk = $property;
					unset($properties[$property]);
				}
			}
			$fields = implode(",", array_keys($properties));
			$values = array_map(array("Postgres", "checkType"), array_values($properties));
			$values = implode(",", $values);
			$sql = "INSERT INTO " . strtolower($className) . " ({$fields}) VALUES ({$values})";
			$re = $this->insert($sql);
// 			die($sql);
			if($re) {
				if($lastid) { 
					return $this->getLastId($className, $pk);
				}
				return true;
			}
			else {
				return false;
			}
		} catch (Exception $e) {
			$this->throwError();
		}
	}
	/**
	 *
	 * Enter description here ...
	 */
	public function checkType ($type)
	{
		if (is_string($type)) {
			if (is_numeric($type) || is_int($type)) {
				return $type;
			}
			return "'$type'";
		} else
		if (is_numeric($type) || is_int($type)) {
			return $type;
		}
		else {
			return "'$type'";
		}
	}
	/**
	 *
	 * @return
	 */
	private function throwError ()
	{
		throw new ErrorException("Um erro ocorreu ao tentar se conectar com o banco de dados, verifique suas configurações");
	}
	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $re
	 */
	public function getLastId ($table, $pk)
	{
		$table = strtolower($table);
		$query = "SELECT currval(pg_get_serial_sequence('{$table}', '{$pk}')) as last_id FROM {$table}";
		$ret = $this->exec($query);
		return $ret->last_id;
	}
}

