<?php

namespace  App\Http\trait;

use Carbon\Carbon;

/**
 *
 */
trait ImageTrait
{
    public function insertImage($title,$image,$dir){
        $new_image  = $title.'_'.date('Y-m-d').'.'.$image->getClientOriginalExtension();
        $image->move(public_path($dir), $new_image);
        return $new_image;
    }
}
