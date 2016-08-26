<?php


class Conexao{
    private $host;
    private $user;
    private $pass;
    private $banco;
    /**
     * @param mixed $banco
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }
    /**
     * @return mixed
     */
    public function getBanco()
    {
        return $this->banco;
    }
    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }
    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }
    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }
    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
    /**@param public Conexao*/
    /**@param public getInstance*/
    public function getInstance($host, $user, $pass, $banco) {
        try {
                $cnq= new PDO("mysql:host=$host;dbname=$banco", "$user", "$pass");
            } catch ( Exception $e ) {
                echo 'Erro ao conectar: '.'</br>' .'<p><h4><b>'. $e.'</b></h4>,</p>';
                exit ();
            }

        return $cnq;
    }
    public function Desconectar($link){
        $link = null;
    }
}