<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GuruImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                $date = $row[6];
                Guru::create([
                    'kelas_id' => $row[1],
                    'nama_guru' => $row[2],
                    'nip' => $row[3],
                    'mapel' => $row[4],
                    'tmp_lahir' => $row[5],
                    'tgl_lahir' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)),
                    'alamat' => $row[7],
                    'telp' => $row[8],
                    'jenkel' => $row[9],
                    'fb' => $row[10],
                    'ig' => $row[11],
                    'twitter' => $row[12],
                ]);
            }
        }
    }
}