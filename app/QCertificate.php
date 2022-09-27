<?php

namespace odbh;

use Illuminate\Database\Eloquent\Model;

class QCertificate extends Model
{
    public $timestamps = false;

    /**
     * Таблицата която се използва от модела
     * @var string
     */
    protected $table = 'qcertificates';

    /**
     * Защитени колони в таблицата
     * @var array
     */
    protected $fillable = [
        'import', 'export', 'internal','what_7', 'type_crops', 'importer_id', 'importer', 'importer_name', 'importer_address',
        'importer_vin', 'packer_name', 'packer_address', 'stamp_number', 'number_certificate', 'authority_bg', 'authority_en',
        'for_country', 'id_country', 'for_country_more', 'transport', 'from_country', 'customs_bg', 'customs_en', 'place_bg',
        'place_en', 'date_issue', 'valid_until', 'inspector_bg', 'inspector_en', 'date_update', 'updated_by', 'invoice', 'date_invoice'
    ];
}
