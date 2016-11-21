<?php

class Escala_model extends CI_Model {

    protected $table_name = "tbescalas";

    public function listar($idempresa,$mes = NULL,$ano = NULL) {
        
        $mes = ($mes)?$mes:date("m");
        $ano = ($ano)?$ano:date("Y");
        
        #Pega o numero de dias do mes passado ou da data atual
        $nudias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        
        $dias_escala = array();
        for($dia = 1;$dia <= $nudias;$dia++){
            //echo ($ano."-".$mes."-".$dia)."</br>";
            $this->db->where("DATA",$ano."-".$mes."-".$dia);
            $this->db->where("IDEMPRESA",$idempresa);
            $escalas = $this->db->get($this->table_name);
            $dias_escala[$dia."/".$mes."/".$ano] = $escalas->result_array();
        }
        
        return $dias_escala;
        
    }
    
    public function ler($idempresa,$data) {
        //echo ($ano."-".$mes."-".$dia)."</br>";
            $this->db->where("DATA",$data);
            $this->db->where("IDEMPRESA",$idempresa);
            $escalas = $this->db->get($this->table_name);
            return $escalas->result_array();
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
    
}