<?php

function dependancyDelete($item,$image_col=false){

    if(($image_col)){
        try {
            File::delete(public_path($item->{$image_col}));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    if(!is_null($item->getRelations())){
        collect($item->getRelations())->map(function($i, $k) use ($item){
            $item->$k()->delete();
        });
    }

}
