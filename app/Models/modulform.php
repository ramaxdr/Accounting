<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modulform extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'modul_form';

    protected $fillable = ['id_modul', 'id_group_modul', 'group_modul_name', 'modul_name', 'modul_desc', 'modul_status'];

    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
}
