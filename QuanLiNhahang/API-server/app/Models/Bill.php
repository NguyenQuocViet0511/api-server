<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Bill extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'bill';
    protected $primaryKey = 'id';
    protected $fillable = [
        'timein',
        'timeout',
        'discount',
        'sum',
        'status',
        'id_table',
        'id_user',

    ];

}
