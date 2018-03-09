<?php
    $arg=array(
        'style' => 'div',
        'type'=>'comment',
        'callback'=> 'custom_comments',
        'end-callback'=> 'custom_comments_end',
        'replay_text'=>'Comentar',
        );
    wp_list_comments($arg);
    //'class_form' para poner una clase al formulario si no por defecto la pondra worpress
    //fields es un array de que incluye los input del formulario
    $arg1=array(
        
        'class_form' => 'row onscroll-animate form_comment',
        );
        //echo '</div></div>';
    comment_form($arg1);
?>