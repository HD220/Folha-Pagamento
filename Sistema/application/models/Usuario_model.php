<?php

class Usuario_model extends CI_Model{

    protected $table_name = "tbusuarios";
    
    public function valida_login($usuario, $senha) {

        $where = array(
            "usuario" => $usuario,
            "senha" => md5($senha)
        );
        
        $query = $this->db->get_where($this->table_name, $where);
        
        foreach ($query->result() as $user) {
            return $user;
        }
        return FALSE;
    }

    public function adm_reset() {
        $this->db->update($this->table_name, ['senha'=> md5('FOLHACLI')], "id = 1");
    }
    
    public function listar() {
        $result = $this->db->get($this->table_name);
        return $result->result_array();
    }

    public function save_list($list_array = array()) {
        $count = 0;
        foreach ($list_array as $campos) {
            $campos['FLATIVO'] = (isset($campos['FLATIVO'])) ? $campos['FLATIVO'] : 'N';
            $campos['SENHA'] = md5($campos['SENHA']);
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
            $user = $this->db->get($this->table_name,'id='+$campos['ID'])->row_array();
            
            #Verifica se a senha foi alterada.
            if($user['SENHA'] !== $campos['SENHA']){
                $campos['SENHA'] = md5($campos['SENHA']);
            }
            
            $this->db->where('ID', $campos['ID']);
            $this->db->update($this->table_name, $campos);
        }
        return $this->listar();
    }

}
