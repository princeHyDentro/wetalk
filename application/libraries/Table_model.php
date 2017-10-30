<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_model {
	
	protected $enforce_field_types = TRUE;
	protected $dateformat = "Y.m.d - H:i:s";
	private $ci;
	protected $name;
	public $results = array();
	public $insert_id = FALSE;
	protected $types = array();
	protected $fields = array();
	public function __construct($_name = NULL, $dateformat = '"d.m.Y - H:i"', $_enforce_field_types = TRUE)
	{
		// set params
		if(is_array($_name)) $_name = reset($_name);
		$this->name = $_name;
		$this->enforce_field_types = $_enforce_field_types;
		$this->ci = & get_instance();
		$this->ci->load->database();

		if($this->name)
		{
			if( ! $this->ci->db->table_exists($this->name))
			{
				if($this->name) log_message('error', "db error: table not found by name '{$_name}'");
				return FALSE;
			}
			// get db field info
			$this->fields = $this->ci->db->field_data($this->name);
			// define types: convert db types to own local types
			foreach ($this->fields as $field)
			{
				$this->ci->load->library('Base_model');
				$type = $this->ci->base_model->convert_mysql_type($field->type, $field->max_length);
				$this->types[$field->name] = $type;
			}
			// define data fields
			$this->fields = array_values($this->ci->db->list_fields($this->name));
		}
	}

	public function initialize($_dateformat = "d.m.Y - H:i", $_enforce_field_types = FALSE)
	{
		// Define the date format
		$this->dateformat = $_dateformat;
		// Define whether to enforce db field types in PHP by type cast
		$this->enforce_field_types = $_enforce_field_types;
		// Since we change "enforce_field_types" reset results array
		$this->results = array();
	}

	public function is_valid_index($testvar)
	{
		$passed = FALSE;

		// count number of correct fields in "data"
		if(ctype_digit($testvar) OR is_int($testvar))
			if((int)$testvar >= 0)
				$passed = TRUE;

		return $passed;
	}

	public function get_types()
	{
		return $this->types;
	}

	public function get_fields()
	{
		return $this->fields;
	}


	public function get_name()
	{
		return $this->name;
	}

	public function is_valid_data($data)
	{
		$passed = TRUE;

		if( ! $this->is_valid_subdata($data) OR (count($data) != count($this->fields)))
			$passed = FALSE;

		return $passed;
	}

	public function is_valid_subdata($data)
	{
		$passed = TRUE;

		// count number of correct fields in "data"
		if( ! empty($data) AND is_array($data))
		{
			foreach ($data as $key => $value)
				if( ! in_array($key, $this->fields))
					$passed = FALSE;
		}
		else $passed = FALSE;

		return $passed;
	}

	public function get_data($query_string = FALSE)
	{
		// get data depending on whether query string is given with "query" or "get"
		try
		{
			if($query_string)
				$data = $this->ci->db->query($query_string);
			else
				$data = $this->ci->db->get();
		}
		catch(Exception $e)
		{
			log_message('error', "db error: error executing query to get matching data ({$e->getMessage()})");
			return FALSE;
		}

		$data = $data->result_array();
		$this->results = $data;
		// if desired, convert each data field to its correct PHP type
		if(( ! empty($data)))
		{
			if($this->enforce_field_types)
			{
				foreach ($data as $index => $row)
				{
					foreach ($row as $field => $value)
					{
						// convert to types
						switch($this->types[$field])
						{
							case TFIELD_FLOAT:
								$this->results[$index][$field] = (float)$value;
								break;
							case TFIELD_INT:
								$this->results[$index][$field] = (int)$value;
								break;
							case TFIELD_BOOL:
								$this->results[$index][$field] = (bool)$value;
								break;
							case TFIELD_DATE:
								 $this->results[$index][$field] = date($this->dateformat, strtotime($value));
								break;
							case TFIELD_STR:
								$this->results[$index][$field] = $value;
								break;
						}
					}
				}
			}
			else // if enforce_field_types FALSE at least convert date fields
				foreach ($data as $index => $row)
					foreach ($row as $field => $value)
						if($this->types[$field] == TFIELD_DATE)
							$this->results[$index][$field] = date($this->dateformat, strtotime($value));
		}

		return $this->results;
	}


	public function complete_data($subdata, $query_string = FALSE)
	{
		// check if given data array is a valid (partial) data
		if( ! $this->is_valid_subdata($subdata))
		{
			log_message('error', 'error: data array not valid)');
			return FALSE;
		}

		try
		{
			if($query_string)
				$data = $this->ci->db->query($query_string);
			else
				$data = $this->ci->db->get();
		}
		catch(Exception $e)
		{
			log_message('error', "db error: error executing query to get matching data ({$e->getMessage()})");
			return FALSE;
		}

		$data = $data->result_array();

		// if desired, convert each data field to its correct PHP type
		if( ! empty($data))
		{
			$data = reset($data);
			if($this->enforce_field_types)
			{
				foreach ($this->types as $field => $type)
				{
					// convert to types
					switch($type)
					{
						case TFIELD_FLOAT:
							$data[$field] = (float)$data[$field];
							break;
						case TFIELD_INT:
							$data[$field] = (int)$data[$field];
							break;
						case TFIELD_BOOL:
							$data[$field] = (bool)$data[$field];
							break;
						case TFIELD_DATE:
							$data[$field] = date($this->dateformat, strtotime($data[$field]));
							break;
						case TFIELD_STR:
							$data[$field] = $data[$field];
							break;
					}
				}
			}
		}
		else
		{
			log_message('error', "db error: getting row from db for completion of given subdata failed");
			return array();
		}

		// complete given data array with table data array
		foreach ($data as $field => $value)
			if( ! array_key_exists($field, $subdata))
				$subdata[$field] = $value;

		return $subdata;
	}

	public function insert_data($data = FALSE)
	{
		// check if given data array is a valid (partial) data
		if($data)
		{
			if( ! $this->is_valid_subdata($data))
			{
				log_message('error', 'error: data array not valid)');
				return FALSE;
			}
		}

		try
		{
			if($data)
				$this->ci->db->insert($this->name, $data);
			else
				$this->ci->db->insert($this->name);

			$this->insert_id = $this->ci->db->insert_id();
		}
		catch(Exception $e)
		{
			log_message('error', "db error: failed to insert data ({$e->getMessage()})");
			return FALSE;
		}

		return TRUE;
	}


	public function update_data($data = FALSE)
	{
		// check if given data array is a valid (partial) data
		if($data)
		{
			if( ! $this->is_valid_subdata($data))
			{
				log_message('error', 'error: data array not valid)');
				return FALSE;
			}
		}

		try
		{
			if($data)
				$this->ci->db->update($this->name, $data);
			else
				$this->ci->db->update($this->name);
		}
		catch(Exception $e)
		{
			log_message('error', "db error: failed to update data ({$e->getMessage()}), ".
						'did you forget to set a correct where query before call?');
			return FALSE;
		}

		return TRUE;
	}

	public function delete_data($ids = FALSE)
	{
		// check if given ids array is a valid (partial) data array
		if($ids)
		{
			if( ! $this->is_valid_subdata($ids))
			{
				log_message('error', 'error: ids array not valid)');
				return FALSE;
			}
		}

		try
		{
			if($ids)
				$this->ci->db->delete($this->name, $ids);
			else
				$this->ci->db->delete($this->name);
		}
		catch(Exception $e)
		{
			log_message('error', "db error: failed to delete data ({$e->getMessage()})");
			return FALSE;
		}

		return TRUE;
	}
}

/* End of file Table_model.php */
