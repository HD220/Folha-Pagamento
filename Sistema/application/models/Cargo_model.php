<?php

class Cargo_model extends CI_Model {

    protected $table_name = "tbcargos";

    public function listar($ativo = 'S', $texto = NULL, $idempresa = NULL) {

        $this->db->select("c.*,e.NOME as NMEMPRESA")
                ->join('tbempresas e', "e.ID = c.IDEMPRESA ");

        if ($ativo == 'S' || $ativo == NULL) {
            $this->db->where("c.FLATIVO", 'S');
        }

        if ($idempresa !== NULL && $idempresa !== "" && $idempresa !== "0") {
            $this->db->where("c.IDEMPRESA", $idempresa);
        }
        
        if ($texto) {
            $this->db->group_start();
            $this->db->like("c.NOME", $texto);
            $this->db->or_like("c.DESCRICAO", $texto);
            $this->db->group_end();
        }
        
        $result = $this->db->get($this->table_name . " c");

        return $result->result_array();
    }

    public function ler($id, $idempresa) {
        if (!$id || !$idempresa) {
            return false;
        }

        $this->db->select("c.*,e.NOME as NMEMPRESA");
        $this->db->join('tbempresas e', "e.ID = c.IDEMPRESA");

        $this->db->where("c.ID", $id);
        $this->db->where("c.IDEMPRESA", $idempresa);

        $result = $this->db->get($this->table_name . " c");
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

    public function get_dropdown() {
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
