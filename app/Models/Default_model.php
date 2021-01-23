<?php
namespace App\Models;

use CodeIgniter\Model;

/**
 * Default Model
 */
class Default_model extends Model
{
	protected $table = '';
	protected $primaryKey = 'id';
	protected $db;

	public function getAsYouWish(string $table, array $where = []) : array
	{
		if(empty($where))
			return $this->db->table($table)->findAll();
		else
			return $this->db->table($table)->where($where)->get()->getResultArray();
	}

	public function setTable(string $table)
	{
		$this->table = $table;
		return $this;
	}

	public function setAllowedField()
	{
		if($table) {
			$this->allowedFields = $this->db->getFieldNames($this->table);
			return $this;
		} else {
			return false;
		}
	}
}