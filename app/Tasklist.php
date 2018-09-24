<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
     //fillable で一括取り込み用設定
     protected $fillable = ['content', 'title','status','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
