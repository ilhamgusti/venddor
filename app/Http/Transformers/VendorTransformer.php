<?php

namespace App\Http\Transformers;

use App\Models\Vendor;

class VendorTransformer
{

    public static function toInstance(array $input, $data = null)
    {
        if (empty($data)) {
            $data = new Vendor();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case "nama":
                    $data["nama"] = $value;
                    break;
                case "kode_vendor":
                    $data["kode_vendor"] = $value;
                    break;
                case "alamat":
                    $data["alamat"] = $value;
                    break;
                case "user_id":
                    $data["user_id"] = $value;
                    break;
            }
        }

        return $data;
    }
}
