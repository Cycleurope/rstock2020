<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\Bike;
use App\Models\BikeFamily;

class BikesImport implements ToCollection, WithHeadingRow, WithStartRow, WithChunkReading, ShouldQueue
{
    private $assortments = ['BIA', 'PGT', 'GIT'];
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dd(count($collection));
        foreach($collection as $row) {

            $MMITNO = $row['mmitno'];
            $MMITDS = $row['mmitds'];
            $MMITCL = $row['mmitcl'];
            $MMITGR = $row['mmitgr'];
            $MMSPE1 = $row['mmspe1'];
            $MMSPE2 = $row['mmspe2'];
            $MMSPE3 = $row['mmspe3'];
            $MBSTAT = intval($row['mbstat']);
            $MBAVAL = intval($row['mbaval']);
            $MBSTQT = intval($row['mbstqt']);
            $OIASCD = $row['oiascd'];
            $family_id = null;
            $size = null;

            // Doit etre un vélo
            // La longueur de MMITNO doit etre supérieure à 6 (ne pas être un master seul)
            // Le statut ne doit pas être en 80
            if(BikeFamily::where('mmitgr', $MMITGR)->exists()) {
                $family = BikeFamily::where('mmitgr', $MMITGR)->first();
                $family_id = $family->id;
                $size = substr($MMITNO, 6, 2);
            }

            if(($MBSTAT != 80) && (strlen($MMITNO) > 6)) {
                $bike = Bike::updateOrCreate([
                    'mmitno' => $MMITNO,
                ], [
                    'mmitno' => $MMITNO,
                    'mmitds' => $MMITDS,
                    'mmitcl' => $MMITCL,
                    'mmitgr' => $MMITGR,
                    'mmspe1' => $MMSPE1,
                    'mmspe2' => $MMSPE2,
                    'mmspe3' => $MMSPE3,
                    'mbstat' => $MBSTAT,
                    'mbaval' => $MBAVAL,
                    'size' => $size,
                    'family_id' => $family_id,
                ]);

            }

        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 50;
    }

    public function chunkSize(): int
    {
        return 50;
    }
}
