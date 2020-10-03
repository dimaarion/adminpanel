<?php
class Controller
{

    public $saveurls;
    public $savenames;
    public function inputs($inputs)
    {
        echo '<div class="form-group ' . $inputs['divclass'] . '">';
        echo '<label class="col-sm col-form-label ' . $inputs['labelclass'] . '" for="' . $inputs['name'] . '">' . $inputs['names'] . '</label>';
        echo '<input value = "' . $inputs['value'] . '" class="form-control form-control-lg ' . $inputs['inputclass'] . '" type="' . $inputs['type'] . '" name="' . $inputs['name'] . '" id="' . $inputs['name'] . '">';
        echo '</div>';
    }

    public function inputsCheckbox($inputs)
    {
        echo '<div class="form-group ' . $inputs['divclass'] . '">'; 
        echo '<input value = "' . $inputs['value'] . '" class="form-control form-control-lg ' . $inputs['inputclass'] . '" type="' . $inputs['type'] . '" name="' . $inputs['name'] . '" id="' . $inputs['name'] . '">';
        echo '<label class="col-sm col-form-label ' . $inputs['labelclass'] . '" for="' . $inputs['name'] . '">' . $inputs['names'] . '</label>';
        echo '</div>';
    }

    public function saves($inputs)
    {
        echo  '<div class="row">';
        echo '<div class="col-3">';
        $this->inputs($inputs);
        echo '</div>';
        echo '<a href = "' . $inputs['saveurls'] . '" class="col-3">';
        echo '<div class="form-control form-control-lg mt-4 text-center">' . $inputs['savenames'] . '</div>';
        echo  '</a>';
        echo '</div>';
    }

    public function dirExt($u)
    {
        $newdir = [];
        $css = scandir($u);
        foreach ($css as $key => $value) {
           if( $value == '.' || $value == '..'){

          }else{
                $newdir[$key] = $value;
          }
      }
        return $newdir;
    }
}
