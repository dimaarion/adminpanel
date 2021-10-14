<?php
class Files
{
    public function getImg($d)
    {
        $img = scandir($d);
        $s = [];
        for ($i = 2; $i < count($img); $i++) {
            $s[$i] = $img[$i];
        }
        return   $s;
    }

    public function deleteFiles()
    {
        $sansize = new Sansize();
        $idfiles = $sansize->getrequest('idfiles');
        if (is_file($idfiles)) {
            if ($idfiles) {
                if (@unlink($idfiles)) {
                    return 'Файл ' . $idfiles . ' успешно удален.';
                } else {
                    return 'Ошибка удаления файла.';
                }
            }
        }else{
            
        }
    }

    public function createDir($url)
    {
        if($_REQUEST[$url] != ""){
            if(!is_dir("../img/upload/".$_REQUEST[$url])){
                mkdir("../img/upload/".$_REQUEST[$url], 0600);
            }
        }
        
    }

    public function deleteDir()
    {
        $sansize = new Sansize();
        $idfiles = $sansize->getrequest('idfiles');
      
        if (is_dir($idfiles)) { 
            // $idfiles =  preg_replace("/[\.]+/","",$idfiles);
            if ($idfiles) {

               
               try {
                    @rmdir($idfiles);
               } catch (\Throwable $th) {
                   echo "Удалите все файлы из папки";
               }
           
           
            }
        }else{
            
        }
    }
}
