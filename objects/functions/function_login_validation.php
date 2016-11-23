<?php
    function has_presence($value){
        return isset($value) && $value !== "";
    }

    function form_errors($errors=array()){
        $output = "";
        if(!empty($errors)){
            $output .= "<div class=\"error\">";
            $output .= "Please fix the following errors:";
            $output .= "<ul>";

            foreach ($errors as $error){
                $output .= "<li style=color:red;>{$error}</li>";
            }

            $output .= "</ul>";
            $output .= "</div>";
        }

        return $output;
    }
?>