<?php

class Escala_model extends CI_Model {

    protected $table_name = "tbescalas";

    public function __construct() {
        parent::__construct();
        #Pega funcionarios ativos
        $this->load->model("Funcionario_model", "func");
    }

    public function listar($idempresa, $semana = NULL, $mes = NULL, $ano = NULL) {

        #Seta de acordo com o atual caso não tenha valor.
        $mes = ($mes) ? $mes : date("m");
        $ano = ($ano) ? $ano : date("Y");

        if (!$semana) {
            #Encontra semana do mes
            $semana_mes_atual = strftime("%U", strtotime($ano . "-" . $mes . "-" . date('d')));
            $semana_mes_inicial = strftime("%U", strtotime($ano . "-" . $mes . "-01"));
            $semana = ($semana_mes_atual - $semana_mes_inicial) + 1;
        }
        $dias_escala = array();
        foreach ($this->dias_semana($semana, $mes, $ano) as $dia_mes => $dia_da_semana) {
            list($ano, $mes, $dia) = explode("-", $dia_mes);
            $key = $dia . '-' . $mes . '-' . $ano;
            $dias_escala[$key] = $this->ler($idempresa, $dia_mes);

            foreach ($dias_escala[$key] as $id => $folga) {
                $folga['FLFOLGASEMANA'] = FALSE;
                $folga['FLFOLGADOMINGO'] = FALSE;

                if ($this->folga_semana($idempresa, $folga['IDFOLGANTE'], $folga['DATA'], $semana) >= 2) {
                    $folga['FLFOLGASEMANA'] = TRUE;
                }
                if ($this->folga_domingo($idempresa, $folga['IDFOLGANTE'], $folga['DATA'])) {
                    $folga['FLFOLGADOMINGO'] = TRUE;
                }
                $dias_escala[$key][$id] = $folga;
            }
        }
        //var_dump($dias_escala);
        return $dias_escala;
    }

    #Retorna array com os dias da semana

    public function dias_semana($semana, $mes, $ano) {

        $nudias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

        $dias = array();
        for ($dia = 1; $dia <= $nudias; $dia++) {

            #Encontra semana do mes
            $semana_mes_atual = strftime("%U", strtotime($ano . "-" . $mes . "-" . $dia));
            $semana_mes_inicial = strftime("%U", strtotime($ano . "-" . $mes . "-01"));
            $semana_mes = ($semana_mes_atual - $semana_mes_inicial) + 1;

            if ($semana_mes == 1) {
                $dia_semana_inicio_mes = date("N", strtotime($ano . "-" . $mes . "-01"));

                if ($dia_semana_inicio_mes !== 7) {
                    list($dia_anterior, $mes_anterior, $ano_anterior) = explode("-", date("d-m-Y", mktime(0, 0, 0, $mes, $dia - $dia_semana_inicio_mes, $ano)));
                    $ult_dia = date("d", mktime(0, 0, 0, $mes, -1, $ano));
                    for ($dia_anterior; $dia_anterior <= $ult_dia; $dia_anterior++) {
                        if ($semana_mes == $semana) {
                            $dias[$ano_anterior . "-" . $mes_anterior . "-" . $dia_anterior] = TRUE;
                        }
                    }
                }
            }

            if ($semana_mes == $semana) {
                #compara semana do mes com a passada na camada da function
                $dias[$ano . "-" . $mes . "-" . $dia] = TRUE;
            }

            $dia_semana_fim_mes = date("N", strtotime($ano . "-" . $mes . "-" . $dia));

            if (($dia == $nudias) && ($dia_semana_fim_mes !== 7)) {

                list($mes_prox, $ano_prox) = explode("-", date("m-Y", mktime(0, 0, 0, $mes + 1, 1, $ano)));

                for ($dia_prox = 1; $dia_prox <= 6 - $dia_semana_fim_mes; $dia_prox++) {
                    if ($semana_mes == $semana) {
                        $dias[$ano_prox . "-" . $mes_prox . "-" . $dia_prox] = TRUE;
                    }
                }
            }
        }
        return $dias;
    }

    public function ler_funcionario($idempresa, $idfuncionario, $data) {
        $this->db->where("DATA", $data);
        $this->db->where("IDEMPRESA", $idempresa);
        $this->db->where("IDFOLGANTE", $idfuncionario);
        $escalas = $this->db->get($this->table_name);
        return $escalas->result_array();
    }

    public function ler($idempresa, $data, $idfolgante = NULL, $idfolguista = NULL) {
        $this->db->select('ESCA.*,GANTE.APELIDO AS NMFOLGANTE,GUISTA.APELIDO AS NMFOLGUISTA');
        $this->db->join("tbfuncionarios GANTE", "GANTE.ID = ESCA.IDFOLGANTE AND GANTE.IDEMPRESA = ESCA.IDEMPRESA");
        $this->db->join("tbfuncionarios GUISTA", "GUISTA.ID = ESCA.IDFOLGUISTA AND GUISTA.IDEMPRESA = ESCA.IDEMPRESA");
        if ($idfolgante) {
            $this->db->where("IDFOLGANTE", $idfolgante);
        }
        if ($idfolguista) {
            $this->db->where("IDFOLGUISTA", $idfolguista);
        }
        $this->db->where("ESCA.DATA", $data);
        $this->db->where("ESCA.IDEMPRESA", $idempresa);

        $escalas = $this->db->get($this->table_name . " ESCA");

        if ($idfolgante && $idfolguista) {
            return $escalas->row_array();
        } else {
            return $escalas->result_array();
        }
    }

    public function folguista_or_folgante($idempresa, $data, $idfuncionario) {

        #verifica se o funcionario esta como folgante para o dia
        $folgante = $this->ler($idempresa, $data, $idfuncionario);

        #verifica se o funcionario esta como folguista para o dia
        $folguista = $this->ler($idempresa, $data, FALSE, $idfuncionario);

        if (count($folgante) > 0 || count($folguista) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function folga_semana($idempresa, $idfuncionario, $data, $semana) {

        list($ano, $mes, $dia) = explode("-", $data);

        $folga = 0;
        foreach ($this->dias_semana($semana, $mes, $ano) as $dia_mes => $dia_da_semana) {
            $folgas = $this->ler($idempresa, $dia_mes, $idfuncionario);
            if (count($folgas) > 0) {
                $folga++;
            }
        }
        return ($folga > 1);
    }

    function folga_domingo($idempresa, $idfuncionario, $data) {

        list($ano, $mes, $dia) = explode("-", $data);

        $ultimodiames = date("t", strtotime($data));

        $folga = 0;
        for ($diames = 1; $diames < $ultimodiames; $diames++) {
            $diasemana = date("N", strtotime("$ano-$mes-$diames"));
            if ($diasemana == 7) {

                $r = $this->ler($idempresa, "$ano-$mes-$diames", $idfuncionario);

                if (count($r) > 0) {

                    $folga++;
                }
            }
        }

        return ($folga > 0);
    }

    public function folga_semana_domingo($idempresa, $semana = NULL, $mes = NULL, $ano = NULL) {

        if (!$semana) {
            #Encontra semana do mes
            $semana_mes_atual = strftime("%U", strtotime(date("Y-m-d")));
            $semana_mes_inicial = strftime("%U", strtotime(date("Y-m") . "-01"));
            $semana = ($semana_mes_atual - $semana_mes_inicial) + 1;
        }


        $funcionarios = $this->func->get_dropdown($idempresa);

        $folga = ['SEMANA' => [], 'DOMINGO' => []];

        #Percorre funcionarios
        foreach ($funcionarios as $idfuncionario => $nome) {
            #inicia contagem
            $count_semana = 0;
            $count_domingo = 0;

            //var_dump($this->folga_domingo($idempresa, $idfuncionario, date("Y-m-d")));

            if ($this->folga_domingo($idempresa, $idfuncionario, date("Y-m-d"))) {
                $count_domingo = 1;
            }

            #Percorre dias da semana
            foreach ($this->dias_semana($semana, $mes, $ano) as $data => $dia_da_semana) {
                if ($dia_da_semana) {
                    $result = $this->ler_funcionario($idempresa, $idfuncionario, $data);
                    if (count($result) > 0) {
                        $count_semana++;
                    }
                }
            }
            if ($count_semana == 0) {
                $folga['SEMANA'][$idfuncionario] = $nome;
            }

            if ($count_domingo == 0) {
                $folga['DOMINGO'][$idfuncionario] = $nome;
            }
        }
        return $folga;
    }

    public function save($campos = array()) {

        #verifica se o folgante é igual ao folguista
        if ($campos['IDFOLGANTE'] == $campos['IDFOLGUISTA']) {
            return "folgante e folguista não podem ser o mesmo.";
        }

        #verifica se o folgante esta como folgante ou folguista para o dia
        $folgante = $this->folguista_or_folgante($campos['IDEMPRESA'], $campos['DATA'], $campos['IDFOLGANTE']);

        #verifica se o folgante esta como folgante ou folguista para o dia
        $folguista = $this->folguista_or_folgante($campos['IDEMPRESA'], $campos['DATA'], $campos['IDFOLGUISTA']);

        if ($folgante || $folguista) {
            return "Folgante ou folguista já possuem registro para o dia";
        }

        #Seta de acordo com o atual caso não tenha valor.
        list($ano, $mes, $dia) = explode('-', $campos['DATA']);

        #Encontra semana do mes
        $semana_mes = strftime("%U", strtotime($ano . "-" . $mes . "-" . $dia));
        $semana_mes_inicial = strftime("%U", strtotime($ano . "-" . $mes . "-01"));
        $campos['FLSEMANAMES'] = ($semana_mes - $semana_mes_inicial) + 1;

        #Encontra o dia da semana
        $campos['FLDIASEMANA'] = date("N", strtotime($ano . "-" . $mes . "-" . $dia));


        if (!$this->db->insert($this->table_name, $campos)) {
            #se é chave duplicada
            if ($this->db->error()['code'] == 1062) {
                return "Este funcionário já possui folga para o dia especificado.";
            }
            return $this->db->error();
        }

        #verifica se ja possui folga na semana
        if ($this->folga_semana($campos['IDEMPRESA'], $campos['IDFOLGANTE'], $campos['DATA'], $campos['FLSEMANAMES'])) {

            return "Folga adicionada porem o funcionario ja possui folga nessa semana.";
        }

        #verifica se ja possui folga no domingo do mes
        if ($this->folga_domingo($campos['IDEMPRESA'], $campos['IDFOLGANTE'], $campos['DATA'])) {
            return "Folga adicionada porem o funcionario ja possui folga no domigo do mês.";
        }

        return TRUE;
    }

    public function update($campos = array()) {

        #verifica se o folgante é igual ao folguista
        if ($campos['IDFOLGANTE'] == $campos['IDFOLGUISTA']) {
            return "folgante e folguista não podem ser o mesmo.";
        }

        #verifica se o folgante esta como folgante ou folguista para o dia
        $folguista = $this->folguista_or_folgante($campos['IDEMPRESA'], $campos['DATA'], $campos['IDFOLGUISTA']);

        if ($folguista) {
            return "folguista já possue registro para o dia";
        }

        #Seta de acordo com o atual caso não tenha valor.
        list($ano, $mes, $dia) = explode('-', $campos['DATA']);

        #Encontra semana do mes
        $semana_mes = strftime("%U", strtotime($ano . "-" . $mes . "-" . $dia));
        $semana_mes_inicial = strftime("%U", strtotime($ano . "-" . $mes . "-01"));
        $campos['FLSEMANAMES'] = ($semana_mes - $semana_mes_inicial) + 1;

        #Encontra o dia da semana
        $campos['FLDIASEMANA'] = date("N", strtotime($ano . "-" . $mes . "-" . $dia));

        $this->db->where('IDEMPRESA', $campos['IDEMPRESA']);
        $this->db->where('IDFOLGANTE', $campos['IDFOLGANTE']);
        $this->db->where('DATA', $campos['DATA']);
        if (!$this->db->update($this->table_name, $campos)) {
            #se é chave duplicada
            if ($this->db->error()['code'] == 1062) {
                return "Não foi possivel adicionar o registro.";
            }
            return $this->db->error();
        }

        #verifica se ja possui folga na semana
        if ($this->folga_semana($campos['IDEMPRESA'], $campos['IDFOLGANTE'], $campos['DATA'], $campos['FLSEMANAMES'])) {

            return "Folga modificada, o funcionario ja possui folga nessa semana.";
        }

        #verifica se ja possui folga no domingo do mes
        if ($this->folga_domingo($campos['IDEMPRESA'], $campos['IDFOLGANTE'], $campos['DATA'])) {
            return "Folga modificada, o funcionario ja possui folga no domigo do mês.";
        }

        return TRUE;
    }

    public function deletar($idempresa, $data, $idfolgante, $idfolguista) {

        $this->db->where("IDFOLGANTE", $idfolgante);
        $this->db->where("IDFOLGUISTA", $idfolguista);
        $this->db->where("DATA", $data);
        $this->db->where("IDEMPRESA", $idempresa);
        $this->db->delete($this->table_name);
    }

    public function imprimir($idempresa, $semana, $mes, $ano) {

        $folgas = [];
        $escala = $this->listar($idempresa, $semana, $mes, $ano);
        foreach (array_keys($escala) as $data_semana) {
            foreach ($escala as $dia => $value) {
                foreach ($value as $folga) {
                    $folgas[$folga['NMFOLGANTE']][$data_semana] = "";
                    if ($dia == $data_semana) {
                        $folgas[$folga['NMFOLGANTE']][$data_semana] = 'Folga';
                    }
                }
            }
        }

        $return = [
            'diassemana' => array_keys($escala),
            'folgas' => $folgas 
        ];
        return $return;
    }

}
