<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Bike;

class BikesImport implements ToCollection, WithHeadingRow, WithStartRow
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

            // Doit etre un vélo
            // La longueur de MMITNO doit etre supérieure à 6 (ne pas être un master seul)
            // Le statut ne doit pas être en 80
            if($MBSTAT != 80) {
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
                ]);
            }

        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
