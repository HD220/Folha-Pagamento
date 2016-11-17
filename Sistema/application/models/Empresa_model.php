<?php

class Empresa_model extends CI_Model {

    protected $table_name = "tbempresas";

    public function listar($idempresa = NULL,$ativo='S',$texto = NULL) {
        
        if($idempresa){
            $this->db->where("IDEMPRESA",$idempresa);
        }
        if($ativo == 'S' || $ativo == NULL){
            $this->db->where("FLATIVO",'S');
        }
        
        if($texto){
            $this->db->like("NOME",$texto);
            $this->db->or_like("NOMECURTO",$texto);
        }
        
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
        
        $this->db->insert($this->table_name, $campos);
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
        $empresas = array(
            "0" => "Sem empresa"
        );
        foreach ($rows as $empresa) {
            $empresas[$empresa->ID] = $empresa->NOME;
        }
        return $empresas;
    }

}
