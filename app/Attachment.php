<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    //
    use  SoftDeletes;

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function link()
    {
        return $this->hasOne(Link::class,'attachment_id');
    }

    public function file()
    {
        return $this->hasOne(File::class,'attachment_id');
    }

    public function page()
    {
        return $this->hasOne(Page::class,'attachment_id');
    }
}
