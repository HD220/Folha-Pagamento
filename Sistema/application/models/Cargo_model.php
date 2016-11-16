<?php

class Cargo_model extends CI_Model {

    protected $table_name = "tbcargos";

    public function listar() {
        $this->db->where("FLATIVO", 'S');
        $result = $this->db->get($this->table_name);
        return $result->result_array();
    }
    
    public function ler($id = null) {
        $this->db->where("ID", $id);
        $result = $this->db->get($this->table_name);
        return $result->row_array();
    }

    public function save_list($list_array = array()) {
        $count = 0;
        foreach ($list_array as $campos) {
            $campos['FLATIVO'] = (isset($campos['FLATIVO'])) ? $campos['FLATIVO'] : 'N';
            $this->db->insert($this->table_name, $campos);
            $count++;
        }
        return $count;
    }

    public function save($campos = array()) {
        $count = 0;
        $campos['FLATIVO'] = (isset($campos['FLATIVO'])) ? $campos['FLATIVO'] : 'N';
        $this->db->insert($this->table_name, $campos);
        $count++;

        return $this->listar();
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

    public function update($campos = array()) {

        $campos['FLATIVO'] = (isset($campos['FLATIVO'])) ? $campos['FLATIVO'] : 'N';
        $this->db->where('ID', $campos['ID']);
        $this->db->update($this->table_name, $campos);

        return $this->listar();
    }
    
    public function get_dropdown(){
        $this->db->select("ID,NOME");
        $this->db->where("FLATIVO", "S");
        $rows = $this->db->get($this->table_name)->result();
        $cargos = array(
            "0" => "Sem cargo"
        );
        foreach ($rows as $cargo) {
            $cargos[$cargo->ID] = $cargo->NOME;
        }
        return $cargos;
    }

}
