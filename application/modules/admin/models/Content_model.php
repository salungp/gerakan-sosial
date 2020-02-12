<?php

class Content_model extends CI_Model
{
  private $table = 'content';
  public $data; 

  public function __construct()
  {
    parent::__construct();
  }

  public function orderBy($field, $type)
  {
    $this->db->order_by($field, $type);
    return $this;
  }

  public function like($field, $val)
  {
    $this->db->like($field, $val);
    return $this;
  }

  public function get()
  {
    $this->data = $this->db->get($this->table);
    return $this;
  }

  public function where($field, $val)
  {
    $this->db->where($field, $val);
    return $this;
  }

  public function single()
  {
    return $this->data->row_array();
  }

  public function all()
  {
    return $this->data->result_array();
  }

  public function getAll()
  {
    return $this->get()->all();
  }

  public function create($data)
  {
    $this->db->insert($this->table, $data);
  }
}