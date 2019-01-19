<?php


    function sliderbar_tree($menu_id,$data){
        $newData = [];
        if(!is_array($data)){return false;}
        foreach ( $data as $value ) {
            if( $value['parent_id'] == $menu_id ) {
                $value['sons'] = [];
                $value['sons'] = sliderbar_tree($value['id'],$data);
                $newData[] = $value;
            }
        }
        return $newData;
    }

   
    

?>