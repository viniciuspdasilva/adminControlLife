<?php

/**
 * Created by PhpStorm.
 * User: b-boy
 * Date: 16/08/2016
 * Time: 18:46
 */
class Validator
{
    /*Atributos*/
    private $valid;
    private $msg;

    /*get e set*/
    /**
     * @return mixed
     */
    public function getValid()
    {
        return $this->valid;
    }
    /**
     * @param mixed $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }
    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }
    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /*Metodos*/
    public function validaInput($input){
        $valid = $this->valid;
        if(!empty($input)):
            $valid = true;
        elseif (empty($input)):
        $valid = false;
        endif;
        return $valid;
    }
    /*
     * @param $valid boll
     * @param $campo string
     * @param opcional $padrão string
     *
     */
    public function mensagem( $valid,$campo ,$padrão='')
    {
        $msg = $this->msg;
        if ($valid == true):
            $msg = null;
        elseif ($valid == false):
            $msg = "<b>Por gentileza preencha o $campo corretamente $padrão</b>";
        endif;
        return $msg;
    }

    public function mostraMensagem($mensagem){
        if ($mensagem == null):
            echo $mensagem;
       else:
           echo '
            <div class="container">
                <div class="row">
                    <span class="label label-danger">'.$mensagem.'</span>
                </div>
            </div>
            ';
       endif;
    }
}
?>



