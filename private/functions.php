<?php
function url_for($string){
    if ($string[0] != '/'){
        $string = '/'. $string;
    }
    return WWW_ROOT. $string;
}

function subjects_to_url($array){
    $url='';
    $i=0;
    foreach($array as $subject){
        $url = $url . '&subject'. $subject;
    }
    return $url;
}


?>