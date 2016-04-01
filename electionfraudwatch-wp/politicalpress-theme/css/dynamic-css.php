<?php

function generate_quick_css(){
    global $data;

    if($data['quick_css']){
        // Quick CSS from Theme Options
        $quick_css = stripslashes($data['quick_css']);

        if(!empty($quick_css)){
            echo "<style type='text/css' id='quick-css'>\n\n";
            echo $quick_css . "\n\n";
            echo "</style>";
        }
    }
}


add_action('wp_head', 'generate_quick_css');