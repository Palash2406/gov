<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    //
    use SoftDeletes;

    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }
}
