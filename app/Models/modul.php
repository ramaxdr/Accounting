<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modul extends Model
{
    use HasFactory;

    protected $table = 'group_modul';

    protected $fillable = ['id_group_modul', 'group_modul_name', 'group_modul_desc'];

    protected $guarded = ['id'];

    const UPDATED_AT = null;
}
