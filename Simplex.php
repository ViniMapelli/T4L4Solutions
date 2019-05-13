<?php

class Simplex
{
    public $tabela = array();
    public $lista_tabela = array();
    public $qtdeRestricao = 0;
    public $nDecisoes = 0;
    public $nRestricoes = 0;
    public $qtdeColunasTabela = 0;
    public $nInteracoes = 20;
    public $opcaoRestricoes;
    public $solucao = array();
    public $base = array();
    private $tipo_funcao;

    function __construct($decisoes, $restricoes, $função, $restricao, $opcaoRestricao, $base, $interacoes)
    {
        $this->qtdeColunasTabela = ($restricoes + $decisoes) + 1;
        $this->qtdeRestricao = $restricoes + 1;
        $this->nDecisoes = $decisoes;
        $this->nRestricoes = $restricoes;
        $this->nInteracoes = $interacoes;
        $this->opcaoRestricoes = $opcaoRestricao;
        $this->base = $base;

        //Alimentar a primeira linha da tabela com valores de string
        //Estruturando a tabela como no exercicio do simples
        $this->tabela[0][0] = 'Base';
        for($i = 1;$i <= $decisoes;$i++)
        {
            $xx = 'x'.$i;
            $this->tabela[0][$i] = $xx;
        }

        for($i = 1;$i <= $restricoes;$i++)
        {
            $fx = 'f'.$i;
            $this->tabela[0][$i + $decisoes] = $fx;
        }

        $this->tabela[0][($decisoes + $restricoes + 1)] = 'b';

        ///////////////////////////////////////////////

        //Inserir dados de cada linha.
        for($i = 1; $i <= $restricoes; $i++)
        {
            $fx = 'f'.$i;
            $this->tabela[$i][0] = $fx;

            for($j = 1; $j <= $decisoes; $j++)
            {
                $this->tabela[$i][$j] = floatval($restricao[$i - 1][$j - 1]);
            }

            for($w = 1; $w <= $restricoes; $w++)
            {
                if ($i == $w)
                {
                    if ( intval($this->opcaoRestricoes[$w - 1]) == 1 ) $this->tabela[$i][$w + $decisoes] = 1;
                    elseif ( intval($this->opcaoRestricoes[$w - 1]) == 2 ) $this->tabela[$i][$w + $decisoes] = -1;
                }
                else $this->tabela[$i][$w + $decisoes] = 0;
            }

            //Alimentao com valor de b
            $this->tabela[$i][($decisoes + $restricoes + 1)] = floatval($base[$i - 1]);
        }

        //Gerar linha de Z
        $this->tabela[1 + $restricoes][0] = 'Z';
        for($i = 1; $i <= $decisoes; $i++) $this->tabela[1 + $restricoes][$i] = floatval($função[$i - 1]) * -1;
        for($i = 1; $i <= $restricoes + 1;$i++) $this->tabela[1 + $restricoes][$i + $decisoes] = 0;

        array_push($this->lista_tabela, $this->tabela);
        //print_r($this->tabela);
    }

    function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function maximizar()
    {
        $this->tipo_funcao = 1;
        for($i = 1; $i <= $this->nInteracoes; $i++)
        {
            if ($this->validarFuncao() !=  True)
            {
                $this->linhasNulas();
            }
        }
    }

    public function minimizar()
    {
        $this->tipo_funcao = 2;
        for($i = 1; $i <= $this->nInteracoes; $i++)
        {
            if ($this->validarFuncao() !=  True)
            {
                $this->linhasNulas();
            }
        }
    }

    public function validarFuncao()
    {
        $validar = True;
        for($i = 1; $i <= $this->nDecisoes; $i++)
        {
            if ( $this->tabela[$this->nRestricoes + 1][$i] < 0 )
            {
         
                $validar = False;
                break;
         
            }
        }
        return $validar;
    }

    public function quemSaiDaBse()
    {
        $menorCoficiente = $this->procurarMenorCoficienteFuncao();
        $posicao = -1;
        $valor = 999999999;

        for($i = 1; $i <= $this->nRestricoes;$i++)
        {
            $x = floatval($this->tabela[$i][$menorCoficiente]);
            $y = floatval($this->tabela[$i][$this->qtdeColunasTabela]);

            if( !$x == 0 )
            {
                if ( ($y / $x) < $valor && ($y / $x) > 0 )
                {
                    $valor = ($y / $x);
                    $posicao = $i;
                }
            }
        }
        if($posicao == -1){
            return False;
        }
        $this->tabela[$posicao][0] = $this->tabela[0][$menorCoficiente];

        //Posicao e valor do Pivo.
        return array($posicao, $menorCoficiente, $this->tabela[$posicao][$menorCoficiente]);
    }

    private function linhasNulas()
    {
        $nulo = $this->zerarLinha();
        $posicao = $nulo[0];
        $coeficiente = $nulo[1];

        for($i = 1; $i <= $this->nRestricoes + 1; $i++)
        {
            if( !$this->tabela[$i][$coeficiente] == 0 && $i !== $posicao)
            {
                $valorNegativo = $this->tabela[$i][$coeficiente] * -1;

                for($j = 1; $j <= $this->qtdeColunasTabela;$j++)
                {
                    $this->tabela[$i][$j] = $this->tabela[$posicao][$j] * $valorNegativo + $this->tabela[$i][$j];
                }
            }
        }

        array_push($this->lista_tabela, $this->tabela);
        //print_r($this->tabela);
    }

    private function zerarLinha()
    {
        $regras = $this->quemSaiDaBse();
        if(!$regras)
            header("location:noSolution.php");

        for($i = 1; $i <= $this->qtdeColunasTabela;$i++)
            $this->tabela[$regras[0]][$i] = $this->tabela[$regras[0]][$i] / $regras[2];

        return array($regras[0],$regras[1]);
    }

    private function procurarMenorCoficienteFuncao()
    {
        $position = 0;
        $value = 0;
        for($i = 1; $i <= $this->nDecisoes; $i++)
        {
            if ( $this->tabela[count($this->tabela) - 1][$i] < $value )
            {
                $position = $i;
                $value = $this->tabela[count($this->tabela) - 1][$i];
            }
        }

        return $position;
    }

    public function melhorSolucao()
    {
        
        $i;
        for ($i = 1; $i <= $this->qtdeRestricao ;$i++){
            array_push($this->solucao,[ $this->tabela[$i][0] , $this->tabela[$i][$this->qtdeColunasTabela]]);
        }
        //for($j=0;j<$this->qtdeRestricao)
        //print_r($this->tabela);
        //$this->tabela[$this->qtdeRestricao][$this->qtdeColunasTabela] = $this->tabela[$this->qtdeRestricao][$this->qtdeColunasTabela] * -1;
        //echo $this->tabela[$this->qtdeRestricao][$this->qtdeColunasTabela];
        //print_r($this->solucao);
        if($this->tipo_funcao == 2)
            $this->solucao[$i-2][1] = $this->solucao[$i-2][1] * -1 ;

        return $this->solucao;
    }

    public function restoSolucao()
    {
        $solucao = array();
        $resto = array();

        for ($i = 0; $i < $this->qtdeRestricao - 1 ;$i++)
            array_push($solucao, $this->solucao[$i][0]);

        for($i = 1; $i <= $this->qtdeColunasTabela -1;$i++)
            array_push($resto, $this->tabela[0][$i]);

        $countResto = count($resto);

        for($i = 0; $i < count($solucao); $i++)
        {
            $posicao = array_search(strval($solucao[$i]), $resto);
            if ($posicao !== false)
                unset($resto[$posicao]);
        }

        for ($i = 0; $i < $countResto; $i++)
            if (isset($resto[$i]))
                echo '<p>'.$resto[$i].' = 0';
    }

    public function precoSombra()
    {
        $sombra = "";
        for($i = ($this->nDecisoes + 1); $i <= $this->qtdeColunasTabela -1;$i++)
            echo '<p>'.$sombra.$this->tabela[0][$i].' = '.$this->tabela[$this->nRestricoes + 1][$i].'</p>';

        return $sombra;
    }

    public function limiteRestricao()
    {
        $resultado = array();

        for($j= ($this->nDecisoes + 1), $w= 1; $j <= ( $this->qtdeColunasTabela - 1 ) && $w <= $this->nRestricoes ;$j++, $w++)
        {
            $conjunto = array();
            for($i = 1; $i <= $this->nRestricoes;$i++)
            {
                $valor = 0;
                if ( $this->tabela[$i][$j] != 0 )
                    $valor = $this->tabela[$i][$this->qtdeColunasTabela] / $this->tabela[$i][$j] * -1;

               array_push($conjunto, $valor);
            }

            sort($conjunto);
            //print_r($conjunto);
            //echo $this->base[$w - 1];
            $conjunto[0] = $conjunto[0] + $this->base[$w - 1];
            $conjunto[(count($conjunto) -1)] = $conjunto[(count($conjunto) -1)] + $this->base[$w - 1];

            array_push($resultado, [$this->tabela[0][$j], $conjunto[0], $conjunto[(count($conjunto) -1)]]);
        }
        //print_r($resultado);
        return $resultado;
    }
}