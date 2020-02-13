<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];



    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    public function question(){
        $this->belongsTo(Question::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }

}
