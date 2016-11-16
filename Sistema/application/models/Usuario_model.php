<?php

class Usuario_model extends CI_Model {

    protected $table_name = "tbusuarios";

    public function valida_login($usuario, $senha) {

        $where = array(
            "USUARIO" => $usuario,
            "SENHA" => md5($senha)
        );

        $query = $this->db->get_where($this->table_name, $where);
        
        foreach ($query->result() as $user) {
            return $user;
        }
        return FALSE;
    }

    public function adm_reset() {
        $this->db->update($this->table_name, ['SENHA' => md5('FOLHACLI')], "id = 1");
    }

    public function ler($id) {
        $this->db->where('ID', $id);
        $result = $this->db->get($this->table_name);
        return $result->row_array();
    }

    public function listar($ativo = 'S', $texto = NULL) {
        if ($ativo == 'S' || $ativo == NULL) {
            $this->db->where("FLATIVO", 'S');
        }

        if ($texto) {
            $this->db->where("ID", $texto);
            $this->db->or_like("NOME", $texto);
            $this->db->or_like("USUARIO ", $texto);
        }

        $result = $this->db->get($this->table_name);
        return $result->result_array();
    }

    public function save_list($list_array = array()) {
        $count = 0;
        foreach ($list_array as $campos) {
            $campos['FLATIVO'] = (isset($campos['FLATIVO'])) ? $campos['FLATIVO'] : 'N';
            $campos['SENHA'] = md5($campos['SENHA']);
            $this->db->insert($this->table_name, $campos);
            $count++;
        }
        return $count;
    }

    public function save($campos = array()) {
        
        $campos['SENHA'] = md5($campos['SENHA']);
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
            $user = $this->db->get($this->table_name, 'id=' + $campos['ID'])->row_array();

            #Verifica se a senha foi alterada.
            if ($user['SENHA'] !== $campos['SENHA']) {
                $campos['SENHA'] = md5($campos['SENHA']);
            }

            $this->db->where('ID', $campos['ID']);
            $this->db->update($this->table_name, $campos);
        }
        return $this->listar();
    }

    public function update($campos = array()) {
        
        if($campos['SENHA'] == '' || $campos['SENHA'] == NULL){
            unset($campos['SENHA']);
        }  else {
            $campos['SENHA'] = md5($campos['SENHA']);
        }
        
        $campos['FLATIVO'] = (isset($campos['FLATIVO'])) ? 'S' : 'N';
        $this->db->where('ID', $campos['ID']);
        $this->db->update($this->table_name, $campos);

        return $this->listar();
    }

}
