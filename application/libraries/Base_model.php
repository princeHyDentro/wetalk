<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_model {
	private $ci;

	public function __construct()
	{
		// get ci reference
		$this->ci = & get_instance();
	}

	public function convert_mysql_type($field_type, $field_max_length = -1)
	{
		$field_type = strtolower($field_type);
		if($tmp_pos = strpos($field_type, '(')) $field_type = substr($field_type, 0, $tmp_pos);
		if($tmp_pos = strpos($field_type, '[')) $field_type = substr($field_type, 0, $tmp_pos);
		switch($field_type)
		{
			case 'bit':
				$type = TFIELD_BOOL;
				break;
			case 'tinyint':
				if($field_max_length == 1)	$type = TFIELD_BOOL;
				else $type = TFIELD_INT;
				break;
			case 'smallint':
			case 'mediumint':
			case 'int':
				$type = TFIELD_INT;
				break;
			case 'bigint':
			case 'float':
			case 'double':
			case 'decimal':
				$type = TFIELD_FLOAT;
				break;
			case 'char':
			case 'varchar':
			case 'tinytext':
			case 'text':
			case 'mediumtext':
			case 'longtext':
			case 'binary':
			case 'varbinary':
			case 'tinyblob':
			case 'mediumblob':
			case 'blob':
			case 'longblob':
			case 'enum':
			case 'set':
				$type = TFIELD_STR;
				break;
			case 'date':
			case 'datetime':
			case 'time':
			case 'timestamp':
			case 'year':
				$type = TFIELD_DATE;
				break;
			default:
				$type = TFIELD_DEFAULT;
				break;
		}

		return $type;
	}

	public function is_function_defined($function_name)
	{
		$passed = TRUE;

		$this->db->select('ROUTINE_NAME');
		$this->db->from('INFORMATION_SCHEMA.ROUTINES');
		$this->db->where("`ROUTINE_TYPE` = 'FUNCTION' AND
						  `ROUTINE_SCHEMA` = '".$this->db->database."' AND
						  `ROUTINE_NAME` = '$function_name'");
		$query = $this->db->get();
		if($query->num_rows() == 0)
			$passed = FALSE;

		return $passed;
	}
}

/* End of file Base_model.php */
