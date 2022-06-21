<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends BaseModel
{
    protected $table = 'terms';
    protected static $table_static = 'terms';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    public function userUpdated()
    {
        return $this->hasOne('App\User', 'id', 'updated_user');
    }

    public function userCreated()
    {
        return $this->hasOne('App\User', 'id', 'created_user');
    }

    public function getFullTextTermAttribute(){
        $name_f = trim(explode("(", $this->name)[0]);
        $q = [  
                'group' => explode(".", $this->name)[0],
                'num'   => $name_f,
                'name' => $name_f,
                'content' => '<li><span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">Điều '.$name_f  .": ". preg_replace('/(<p>)/', "", $this->description.'</span>' ). '</li>'
            ];
        return $q;
    }
}
