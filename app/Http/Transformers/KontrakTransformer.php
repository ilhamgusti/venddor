<?php

namespace App\Http\Transformers;

use App\Models\Kontrak;

class KontrakTransformer
{

    public static function toInstance(array $input, $data = null)
    {
        if (empty($data)) {
            $data = new Kontrak();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case 'tanggal_kontrak':
                    $data->tanggal_kontrak = $value;
                    break;
                case 'file_url':
                    $data->file_url = $value;
                    break;
                case 'status':
                    $data->status = $value;
                    break;
                case 'proyek_id':
                    $data->proyek_id = $value;
                    break;
            }
        }

        return $data;
    }
}
