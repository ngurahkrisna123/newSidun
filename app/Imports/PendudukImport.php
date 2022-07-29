<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;

class PendudukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    // /**
    //  * Tweak the data slightly before sending it to the validator
    //  * @param $data
    //  * @param $index
    //  * @return mixed
    //  */
    // public function prepareForValidation($data, $index)
    // {
    //     //Fix that Excel's numeric date (counting in days since 1900-01-01)
    //     $date = intval($row[7]);
    //     Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('d/m/Y'));

        
    // }

    // /**
    //  * List the validation rules
    //  * @return array
    //  */
    // public function rules(): array
    // {
    //     return [
    //         $row[7]=>'required|date_format:Y-m-d',
    //         //..
    //     ];
    // }
    
    public function model(array $row)
    {
        return new Penduduk([
            //
            
            'nik' => $row[0],
            'noKK' => $row[1],
            'namaPenduduk' => $row[2],
            'jk' => $row[3],
            'tempatLahir' => $row[4],
            'tglLahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]),
            'golDarah' => $row[6],
            'alamat' => $row[7],
            'agama' => $row[8],
            'pendidikan' => $row[9],
            'pekerjaan' => $row[10],
            'status' => $row[11],
            'kewarganegaraan' => $row[12],
            'dusun' => $row[13],
            'tglBergabung' => $row[14],
        ]);
    }
}
 