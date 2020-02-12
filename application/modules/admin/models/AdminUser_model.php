<?php

class AdminUser_model extends CI_Model
{
  private $table = 'users';
  public $data;

  public function __contruct()
  {
    parent::__contruct();
  }

  public function getAll()
  {
    $data = $this->db->get($this->table)->result_array();
    return $data;
  }

  public function getSingle($id)
  {
    $data = $this->db->get_where($this->table, ['id' => $id])->row_array();
    return $data;
  }

  public function create($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function orderBy($key, $val)
  {
    $this->db->order_by($key, $val);
    return $this;
  }

  public function like($key, $val)
  {
    $this->db->like($key, $val);
    return $this;
  }

  public function get()
  {
    $this->data = $this->db->get($this->table);
    return $this;
  }

  public function where($key, $val)
  {
    $this->db->where($key, $val);
    return $this;
  }

  public function row()
  {
    return $this->data->row_array();
  }

  public function result()
  {
    return $this->data->resutl_array();
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function update($data, $id)
  {
    $this->where('id', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($key, $val)
  {
    $this->db->delete($this->table, [$key => $val]);
  }
}