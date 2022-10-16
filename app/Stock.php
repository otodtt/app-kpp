<?php

namespace odbh;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $timestamps = false;

    /**
     * Таблицата която се използва от модела
     * @var string
     */
    protected $table = 'stocks';

    /**
     * Защитени колони в таблицата
     * @var array
     */
    protected $fillable = [
        'certificate_id', 'import', 'export', 'internal', 'type_pack', 'number_packages', 'different', 'crop_id', 'crops_name', 
        'crop_en', 'variety', 'quality_class', 'weight', 'date_issue', 'date_update', 'updated_by', 'date_add', 'added_by'
    ];
}
