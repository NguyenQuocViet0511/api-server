<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class Table extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'tablefood'; //name table
    protected $keyType = 'string';  //type key
    public $incrementing = false; // incrementing not
    protected $fillable = [
        'id',
        'name',
        'status',
        'id_bill',
        'created_by',
        'updated_by'
    ];

}
