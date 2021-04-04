<?php

namespace App\Imports;

use App\Helpers\DATE;
use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    /**
     * @param Collection $collection
     */

    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                $date = $row[7];
                Siswa::create([
                    'kelas_id' => $row[1],
                    'nama' => $row[2],
                    'nis' => $row[3],
                    'alamat' => $row[4],
                    'telp' => $row[5],
                    'jenkel' => $row[6],
                    'tgl_lahir' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date))
                ]);
            }
        }
    }
}