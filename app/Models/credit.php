<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credit extends Model
{

    public $timestamps = false;

    use HasFactory;

    protected $table = 'credit_term';

    protected $fillable = ['credit_term_code', 'credit_term_name', 'credit_term_value', 'credit_term_status', 'id_modul'];

    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
}
