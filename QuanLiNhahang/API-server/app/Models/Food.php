<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class Food extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'food';
    protected $keyType = 'string';  //type key
    public $incrementing = false; // incrementing not
    protected $fillable = [
        'id',
        'name',
        'price',
        'discount',
        'count',
        'status',
        'id_category',
        'created_by'


    ];

}
