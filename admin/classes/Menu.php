<?php
class Menu
{
    public $props;
    public $array_menu;
    public $menu = array();



    public function getMenu()
    {
        $arr =  $this->props;
        foreach ($arr as $key => $value) {
            $this->menu[$value['parent_id']][$value['menu_id']] = $value;
        }
        $treeElem = $this->menu[0];
        $this->genElement($treeElem, $this->menu);
        return $treeElem;
    }
    public function genElement(&$treeElem, $menu)
    {
        foreach ($treeElem as $key => $value) {
            if (!isset($value['cild'])) {
                $treeElem[$key]['cild'] = array();
            }
            if (array_key_exists($key, $menu)) {
                $treeElem[$key]['cild'] = $menu[$key];
                $this->genElement($treeElem[$key]['cild'], $this->menu);
            }
        }
    }
    public function child($x, $u)
    {
        foreach ($x as $key => $value) {
                echo  '<li class="pod nav"><a href="'. $value['alias'] .'" class="nav-link pb-0 pl-0 ml-0">' . $value['names'] . '</a>';
            if ($value['cild']) :
                echo '<ul>';
                $this->child($value['cild'], $u);
                echo '</ul>';
                echo '</li>';
            endif;
        }
    }
    public function menu_recursions($props = [],$u)
    {

        foreach ($props as $key => $value) {
            echo '<li class="nav-item"><a class="nav-link" href="'. $value['alias'].'">' . $value['names'] . '</a>';
            if ($value['cild']) :
                echo '<ul>';
                $this->child($value['cild'], $value['alias']);
                echo '</ul>';
                echo '</li>';
            endif;
        }
    }



}
