<?php 
class Metrika 
{
    //счетчик
    private $sNameCount = 'pageCount';
    private $sCount = 0;
    //пользователь
    private $user = 'user';
    private $day = 'day';
    private $month = "month";
    private $year = 'year';
    private $pagesName = [];
    private $names = 'names';

    private function start()
    {
        session_start();
    }

    private function createSessioin($n,$p)
    {
        if(!isset($_SESSION[$n])){
            $_SESSION[$n] = $p;
        }
    }

    private function countHost()
    {
        if(isset($_SESSION[$this->sNameCount])){
            $_SESSION[$this->sNameCount] = $_SESSION[$this->sNameCount] + 1;
        }
    }

    private function updateSessiion($n,$p)
    {
        if(isset($_SESSION[$n])){
            $_SESSION[$n] = $p;
        }
    }

    private function pages($array = [])
    {
        
        foreach ($array as $key => $value) {
            if(!isset($_SESSION[$value['art_names']])){
                $_SESSION[$value['art_names']] = 0;
            }
            if($_REQUEST['alias'] == $value['art_alias']){
                array_push($this->pagesName,[$value['art_names'], $_SESSION[$value['art_names']] = $_SESSION[$value['art_names']] + 1]);
                
            }  
        }

    }

    public function display($pages = [])
    {
        $this->start();
        $this->createSessioin($this->sNameCount,$this->sCount);
        $this->createSessioin($this->user,$_SERVER['HTTP_USER_AGENT']);
        $this->createSessioin($this->date,date('d', $_SERVER['REQUEST_TIME']));
        $this->createSessioin($this->month,date('m', $_SERVER['REQUEST_TIME']));
        $this->createSessioin($this->year,date('y', $_SERVER['REQUEST_TIME']));
        $this->countHost();
        $this->pages($pages);
        $this->createSessioin($this->names,$this->pagesName);
        $this->updateSessiion($this->user,$_SERVER['HTTP_USER_AGENT']);
        $this->updateSessiion($this->date,date('d', $_SERVER['REQUEST_TIME']));
        $this->updateSessiion($this->month,date('m', $_SERVER['REQUEST_TIME']));
        $this->updateSessiion($this->year,date('y', $_SERVER['REQUEST_TIME']));
       print_r($_SESSION);
    }
   
}