<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $fillable = [
        'universidad',
        'logo',
        'url_mapa',
    ];
}
