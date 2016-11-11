<?php

class Empresa_model extends CI_Model{

    protected $table_name = "tbempresas";
    
    public function listar() {
        $this->db->where("FLATIVO",'S');
        $result = $this->db->get($this->table_name);
        return $result->result_array();
    }

    public function save_list($list_array = array()) {
        $count = 0;
        foreach ($list_array as $campos) {
            $campos['FLATIVO'] = (isset($campos['FLATIVO'])) ? $campos['FLATIVO'] : 'N';
            $this->db->insert($this->table_name,$campos);
            $count++;
        }
        return $count;
    }

    public function ativos() {
        $this->db->where("FLATIVO", "S");
        return $this->db->get($this->table_name)->num_rows();
    }

    public function update_list($list_array = array()) {

        foreach ($list_array as $campos) {
            
            $campos['FLATIVO'] = (isset($campos['FLATIVO'])) ? $campos['FLATIVO'] : 'N';
            $this->db->where('ID', $campos['ID']);
            $this->db->update($this->table_name, $campos);
            
        }
        return $this->listar();
    }

}
