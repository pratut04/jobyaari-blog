<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'site_name',
        'logo',
        'favicon',
        'footer_text',
        'seo_title',
        'seo_description',
        'contact_email',
        'facebook',
        'instagram',
        'twitter',
    ];
}