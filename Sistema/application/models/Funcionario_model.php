<?php

class Funcionario_model extends CI_Model {

    protected $table_name = "tbfuncionarios";

    public function listar($ativo = 'S', $texto = NULL, $idempresa = NULL) {

        $this->db->select("f.*,c.NOME as NMCARGO,t.NOME as NMTURNO")
                ->join('tbcargos c', "c.ID = f.IDCARGO AND c.IDEMPRESA = f.IDEMPRESA ")
                ->join('tbturnos t', "t.ID = f.IDTURNO AND t.IDEMPRESA = f.IDEMPRESA ");

        if ($ativo == 'S' || $ativo == NULL) {
            $this->db->where("f.DTDEMISSAO", '0000-00-00');
        }

        if ($idempresa !== NULL && $idempresa !== "" && $idempresa !== "0") {
            $this->db->where("f.IDEMPRESA", $idempresa);
        }
        
        if ($texto) {
            $this->db->group_start();
            $this->db->or_like("f.NOME", $texto);
            $this->db->or_like("f.APELIDO", $texto);
            $this->db->or_like("c.NOME", $texto);
            $this->db->or_like("t.NOME", $texto);
            $this->db->group_end();
        }
        
        $result = $this->db->get($this->table_name . " f");

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

        $result = $this->db->get($this->table_name . " c")->row_array();
        
        #Separa endereco
        list($result['ENDERECO']['CEP'],
             $result['ENDERECO']['LOGRADOURO'],
             $result['ENDERECO']['COMPLEMENTO'],
             $result['ENDERECO']['NUMERO'],
             $result['ENDERECO']['BAIRRO'],
             $result['ENDERECO']['CIDADE'],
             $result['ENDERECO']['UF']) = explode("|", $result['DSENDERECO']);
           
        #Separa preferencia de folga
        list($result['PREFFOLGA']['DOM'],
             $result['PREFFOLGA']['SEG'],
             $result['PREFFOLGA']['TER'],
             $result['PREFFOLGA']['QUA'],
             $result['PREFFOLGA']['QUI'],
             $result['PREFFOLGA']['SEX'],
             $result['PREFFOLGA']['SAB']) = explode("|", $result['FLPREFFOLGA']);
        
        unset($result['FLPREFFOLGA'],$result['DSENDERECO']);
        
        return $result;
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
               
        #Concatena preferencia de folgas FLPREFFOLGA
        $pref = array();
        $pref[] = isset($campos['PREFFOLGA']['DOM'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['SEG'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['TER'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['QUA'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['QUI'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['SEX'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['SAB'])?'S':'N';
        $campos['FLPREFFOLGA'] = implode('|', $pref);
        unset($campos['PREFFOLGA']);
        
        #Concatena endereço de folgas DSENDERECO
        $campos['DSENDERECO'] = implode('|', $campos['ENDERECO']);
        unset($campos['ENDERECO']);
        
        
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
        #Concatena preferencia de folgas FLPREFFOLGA
        $pref = array();
        $pref[] = isset($campos['PREFFOLGA']['DOM'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['SEG'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['TER'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['QUA'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['QUI'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['SEX'])?'S':'N';
        $pref[] = isset($campos['PREFFOLGA']['SAB'])?'S':'N';
        $campos['FLPREFFOLGA'] = implode('|', $pref);
        unset($campos['PREFFOLGA']);
        
        #Concatena endereço de folgas DSENDERECO
        $campos['DSENDERECO'] = implode('|', $campos['ENDERECO']);
        unset($campos['ENDERECO']);
        
        $this->db->where('ID', $campos['ID']);
        $this->db->update($this->table_name, $campos);

        return $this->listar();
    }

    public function get_dropdown($idempresa) {
        $this->db->where("DTDEMISSAO", '0000-00-00');
        $this->db->where('IDEMPRESA',$idempresa);
        $this->db->select("ID,APELIDO");
        $rows = $this->db->get($this->table_name)->result();
        $funcionarios = array();
        foreach ($rows as $funcionario) {
            $funcionarios[$funcionario->ID] = $funcionario->APELIDO;
        }
        return $funcionarios;
    }

}
