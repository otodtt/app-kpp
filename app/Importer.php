<?php

namespace odbh;

use Illuminate\Database\Eloquent\Model;

class Importer extends Model
{
    public $timestamps = false;
    /**
     * Защитена таблица
     *
     * @var string
     */
    protected $table = 'importers';

    /**
     * Защитени колони в таблицата
     * @var array
     */
    protected $fillable = ['name_bg', 'address_bg', 'name_en', 'address_en', 'vin', 'is_active', 'is_bulgarian', 
                            'created_by', 'updated_by', 'date_create', 'date_update'];

}
