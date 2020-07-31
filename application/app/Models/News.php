<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class News extends Model
{
    use SoftDeletes;

    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';



    protected $fillable = [
        'id',
        'title',
        'content',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at'
        ];
}
