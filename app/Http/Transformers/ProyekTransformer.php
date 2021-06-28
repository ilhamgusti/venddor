<?php

namespace App\Http\Transformers;

use App\Models\Proyek;

class ProyekTransformer
{

    public static function toInstance(array $input, $data = null)
    {
        if (empty($data)) {
            $data = new Proyek();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case 'nama_proyek':
                    $data['nama_proyek'] = $value;
                    break;
                case 'tanggal_pengerjaan':
                    $data['tanggal_pengerjaan'] = $value;
                    break;
                case 'estimasi':
                    $data['estimasi'] = $value;
                    break;
                case 'status':
                    $data['status'] = $value;
                    break;
                case 'vendor_id':
                    $data['vendor_id'] = $value;
                    break;
                case 'kontrak_id':
                    $data['kontrak_id'] = $value;
                    break;
            }
        }

        return $data;
    }
}
