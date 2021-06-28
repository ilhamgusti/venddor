<?php

namespace App\Http\Transformers;

use App\Models\Tahapan;

class TahapanTransformer
{

    public static function toInstance(array $input, $data = null)
    {
        if (empty($data)) {
            $data = new Tahapan();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case "kode_invoice":
                    $data["kode_invoice"] = $value;
                    break;
                case "total_tagihan":
                    $data["total_tagihan"] = $value;
                    break;
                case "file_url":
                    $data["file_url"] = $value;
                    break;
                case "status":
                    $data["status"] = $value;
                    break;
                case "proyek_id":
                    $data["proyek_id"] = $value;
                    break;
            }
        }

        return $data;
    }
}
