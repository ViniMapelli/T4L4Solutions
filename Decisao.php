<?php

class Decisao
{
    private $tipodecisao;
    private $numerodecisao;

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return mixed
     */
    public function getTipodecisao()
    {
        return $this->tipodecisao;
    }

    /**
     * @param mixed $tipodecisao
     */
    public function setTipodecisao($tipodecisao)
    {
        $this->tipodecisao = $tipodecisao;
    }

    /**
     * @return mixed
     */
    public function getNumerodecisao()
    {
        return $this->numerodecisao;
    }

    /**
     * @param mixed $numerodecisao
     */
    public function setNumerodecisao($numerodecisao)
    {
        $this->numerodecisao = $numerodecisao;
    }

    public function getFuncao()
    {
        for($j = 1; $j <= $this->getNumerodecisao(); $j++)
        {
            if ( $j == 1  ) $this->setFuncao($j);
            else $this->setFuncao($j);
        }
    }

    private function setFuncao($count)
    {
            $var='<label style="font-size:16px; position:relative; top:25px; left:10px; color:black; padding-right:20px;">+</label>';
            if($count==1)
                $var='';
        
            echo '<div class="col l1">';
                echo ''.$var.'<label class="simbolo" style="font-size:16px; position:relative; top:25px; left:10px; color:black;">X'.$count.'</label>'; 
            echo '</div>';
            echo '<div class="input-field col l1">';  
                echo '<input id="in'.$this->getTipodecisao().$count.'" type="number" class="validate black-text" name="'.$this->getTipodecisao().'[]'.'" value="0">';    
            echo '</div>';
    }


    public function getFuncaoRestricao($count)
    {
        for($j = 1; $j <= $this->getNumerodecisao(); $j++)
        {
            if ( $j == 1  ) $this->setFuncaoRestricao($count, $j);
            else $this->setFuncaoRestricao($count, $j);
        }
    }

    private function setFuncaoRestricao($restricaoCount, $count)
    {
        
        echo '<div class="col l1">';
               echo '<label style="font-size:16px; position:relative; top:25px; left:10px; color:black;">X'.$count.'</label>';
        echo '</div>';
        echo '<div class="input-field col l1">';
            echo '<input id="in'.$this->getTipodecisao().$count.'" type="number" class="validate black-text" name="'.$this->getTipodecisao().$restricaoCount.'[]'.'" value="0" step="0.01">';
        echo '</div>';
    }
}