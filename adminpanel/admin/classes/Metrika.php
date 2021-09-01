<?php 
class Metrika extends Controller
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
        foreach ($this->get_json('./adminpanel/host/host.json') as $key => $value) {
            switch ($key) {
                case 'count':
                    $this->set_json('./adminpanel/host/host.json',["count"=>$value + 1]);
                default:
                    break;
            }
            echo($value);   
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
        $this->countHost();
        /*$this->start();
        $this->createSessioin($this->sNameCount,$this->sCount);
        $this->createSessioin($this->user,$_SERVER['HTTP_USER_AGENT']);
        $this->createSessioin($this->date,date('d', $_SERVER['REQUEST_TIME']));
        $this->createSessioin($this->month,date('m', $_SERVER['REQUEST_TIME']));
        $this->createSessioin($this->year,date('y', $_SERVER['REQUEST_TIME']));
       
        $this->pages($pages);
        $this->createSessioin($this->names,$this->pagesName);
        $this->updateSessiion($this->user,$_SERVER['HTTP_USER_AGENT']);
        $this->updateSessiion($this->date,date('d', $_SERVER['REQUEST_TIME']));
        $this->updateSessiion($this->month,date('m', $_SERVER['REQUEST_TIME']));
        $this->updateSessiion($this->year,date('y', $_SERVER['REQUEST_TIME']));
       print_r($_SESSION);*/
    }
   
}