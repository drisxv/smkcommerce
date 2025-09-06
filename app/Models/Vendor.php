<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'title',
        'description',
        'visit_website_url',
        'image_link_id',
    ];

    public function imageLink()
    {
        return $this->belongsTo(ImageLink::class);
    }
}
