<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\Product;
use App\Models\ProductFamily;
use App\Models\ProductAssortment;
use App\Models\Label;

class ProductsImport implements ToCollection, WithHeadingRow, WithStartRow, WithChunkReading, ShouldQueue
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
            $MBAVAL = $row['mbaval'];
            if($MBAVAL == 'NULL') $MBAVAL = 0;
            $MBSTQT = intval($row['mbstqt']);
            $OIASCD = $row['oiascd'];
            $family_id = null;
            $size = null;

            // Doit etre un vélo
            // La longueur de MMITNO doit etre supérieure à 6 (ne pas être un master seul)
            // Le statut ne doit pas être en 80
            if(ProductFamily::where('mmitgr', $MMITGR)->exists()) {
                $family = ProductFamily::where('mmitgr', $MMITGR)->first();
                $family_id = $family->id;
                $size = substr($MMITNO, 6, 2);
            }

            if((strlen($MMITNO) > 6)) {
                
                $label = "";

                if(substr($MMITGR, 0, 1) == "C") {
                    $product_type = "part";
                } elseif((substr($MMITGR, 0, 1) == "B") && (substr($MMITNO, 0, 1) == "Y")) {
                    if(Label::where('refeence', substr($MMITNO, 0, 6))->exists()) {
                        $label = Label::where('reference', substr($MMITNO, 0, 6))->first()->designation;
                    } else $label = "";
                    $product_type = "bike";
                } elseif((substr($MMITGR, 0, 1) == "X")) {
                    $product_type = "frame";
                } else {
                    $product_type = "other";
                }

                $product = Product::updateOrCreate([
                    'mmitno' => $MMITNO,
                ], [
                    'mmitds' => $MMITDS,
                    'mmitcl' => $MMITCL,
                    'mmitgr' => $MMITGR,
                    'mmspe1' => $MMSPE1,
                    'mmspe2' => $MMSPE2,
                    'mmspe3' => $MMSPE3,
                    'mbstat' => $MBSTAT,
                    'mbaval' => $MBAVAL,
                    'label' => $label,
                    'size' => $size,
                    'family_id' => $family_id,
                    'type' => $product_type
                ]);

                $product_assortment = ProductAssortment::firstOrCreate([
                    'oiascd' => htmlspecialchars_decode(str_replace('/', "_", $OIASCD)),
                    'product_id' => $product->id
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
        return 200;
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
