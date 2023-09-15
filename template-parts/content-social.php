<?php
    $redes = redesSocialesDisponibles(2);
    $redes_prnt = array();
    foreach($redes as $key => $red):
        $campo = get_option($key);
        if($campo != ""):
            $redes_prnt[] = '
                <li><a href="'.$campo.'" target="_blank"><i class="'.$red.'"></i></a></li>
            ';
        endif;
    endforeach;
    if(count($redes_prnt) > 0):
        echo "
        <ul>";
        foreach($redes_prnt as $red):
            echo $red;
        endforeach;
        echo "
        </ul>
        ";
    endif;
?>