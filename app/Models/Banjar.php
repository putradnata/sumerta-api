<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banjar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'keterangan',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getDefaultValues()
    {
        return [
            'nama' => '',
            'alamat' => '',
            'keterangan' => '',
        ];
    }
}
