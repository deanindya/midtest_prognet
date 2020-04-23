<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function getStatus(){
        if($this->status == 2){
            return "Done";
        }else if($this->status == 1){
            return "Progress";
        }else{
            return "Pending";
        }
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
