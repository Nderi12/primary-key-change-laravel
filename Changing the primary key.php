<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class YourModel extends Model
{

    protected $connection = 'your_database_conection';

    protected $table = 'your_table_name'; 

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        "uuid",
    ];

    /**
     * let us generate our uuid!!
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    /**
     * let us now define our new route binder,
     * in this case wich is the uuid column in our database.
     * 
     * You can pass which ever column you opt for from your database
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}