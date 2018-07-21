<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [ 'code', 'name', 'url', 'image_url'];
    
    // 多対多
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    
    //Want のみの User 一覧
    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
}
