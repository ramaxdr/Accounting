<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class format extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'document_format';

    protected $fillable = ['doc_num_code', 'modul_code', 'modul_name', 'doc_num_name', 'start_number', 'format'];

    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
}
