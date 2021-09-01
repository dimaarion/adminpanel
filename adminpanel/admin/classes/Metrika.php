<?php 
class Metrika extends Controller
{
    //счетчик    
    public $fUrl = './adminpanel/host/host.json';
    private $fUrlPage = './adminpanel/host/hostPage.json';
    public $vizCount = 0;
    

    private function objInArray($obj)
    {
        $a = [];
        if(isset($obj)){
            foreach ($obj as $key => $value) {
           $a[$key] = $value;            
            }
        }
        return $a;
    }

    private function intZeroDate($d1,$d2,$p)
    {
        if($d1 > $d2){
            return 0;
        }else{
            return $p + 1;
        }
    }

    private function countHost()
    {
        if($this->get_json($this->fUrl)){
         $jsonArray = $this->objInArray($this->get_json($this->fUrl));
           $this->set_json($this->fUrl,[
               "count"=>$jsonArray['count'] + 1,
               "user"=>$_SERVER['HTTP_USER_AGENT'], 
               "hostUn"=>$jsonArray['hostUn'], 
               "day"=>date('y',$_SERVER['REQUEST_TIME']),
               "hostDay"=>$this->intZeroDate(date('y',$_SERVER['REQUEST_TIME']),$jsonArray['day'],$jsonArray['hostDay']),
               "hostDayUn"=>$jsonArray['hostDayUn'] 
            ]);
           if($jsonArray['user'] != $_SERVER['HTTP_USER_AGENT']){
            $this->set_json($this->fUrl,[
                "count"=>$jsonArray['count'] + 1,
                "user"=>$_SERVER['HTTP_USER_AGENT'], 
                "hostUn"=>$jsonArray['hostUn'] + 1, 
                "day"=>date('y',$_SERVER['REQUEST_TIME']),
                "hostDay"=>$this->intZeroDate(date('y',$_SERVER['REQUEST_TIME']),$jsonArray['day'],$jsonArray['hostDay']),
                "hostDayUn"=>$this->intZeroDate(date('y',$_SERVER['REQUEST_TIME']),$jsonArray['day'],$jsonArray['hostDayUn']) 
            ]);
           }
        }else{
             $this->set_json($this->fUrl,[
                 "count"=>1,
                 "user"=>$_SERVER['HTTP_USER_AGENT'], 
                 "hostUn"=>1, 
                 'day'=>date('y',$_SERVER['REQUEST_TIME']),
                 "hostDay"=>1,
                 "hostDayUn"=>1  
                ]);
        }
    }
    
    private function pages($array = []){ 
        $a = [];
        if($this->get_json($this->fUrlPage)){
            $i = -1;
            $jsonArray = $this->objInArray($this->get_json($this->fUrlPage));
            $jsonArrayPage = $this->objInArray($jsonArray['page']);
            foreach ($array as $key => $value) { 
                $i++;
                if($this->objInArray($jsonArrayPage[$i])['alias'] == $_REQUEST['alias']){ 
                     array_push($a,['name'=>$value['art_names'],'alias'=>$value['art_alias'],'hostViz'=>$this->objInArray($jsonArrayPage[$i])['hostViz'] + 1]);
                     $this->set_json($this->fUrlPage,["page"=>$a]);
                }else{
                    if($this->objInArray($jsonArrayPage[$i])['hostViz'] == null){
                        array_push($a,['name'=>$value['art_names'],'alias'=>$value['art_alias'],'hostViz'=>1]);
                        $this->set_json($this->fUrlPage,["page"=>$a]);
                    }else{
                        array_push($a,['name'=>$value['art_names'],'alias'=>$value['art_alias'],'hostViz'=>$this->objInArray($jsonArrayPage[$i])['hostViz']]);
                        $this->set_json($this->fUrlPage,["page"=>$a]);
                    }
                    
                }
               
                
               
            }

        }else{
            foreach ($array as $key => $value) { 
                array_push($a,['name'=>$value['art_names'],'alias'=>$value['art_alias'],'hostViz'=>1]);
                $this->set_json($this->fUrlPage,["page"=>$a]);
            }
        }
        
    }
    
        
            
     public function viewCount()
     {
        if($this->get_json($this->fUrl)){
           $jsonArray = $this->objInArray($this->get_json($this->fUrl));
        }else{
            $jsonArray = [];
        }
        return $jsonArray;
     }           
            

    



    public function display($pages = [])
    { 
        $this->countHost(); 
        $this->pages($pages);
      
    }
   
}