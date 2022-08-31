<?php

namespace  App\Http\trait;


/**
 *
 */
trait ImageTrait
{
    public function insertImage($title,$image,$dir){
        $new_image  = $title . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('User_image/'), $new_image);
        return $new_image;
    }
}

