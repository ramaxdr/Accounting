<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'customer_supplier_group';

    protected $fillable =  ['group_code', 'coa_code', 'coa_name', 'group_name', 'group_desc', 'group_status', 'id_modul'];

    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
}
