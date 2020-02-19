<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\Label;
use App\Models\Product;

class LabelsImport implements ToCollection, WithHeadingRow, WithStartRow, WithChunkReading, ShouldQueue
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row) {

            $reference = $row['reference'];
            $designation = $row['designation'];
    
            $label = Label::updateOrCreate([
                'reference' => $reference
            ], [
                'designation' => $designation
            ]);
    
            Product::where('mmitno', 'LIKE', $label->reference.'%')->update(['label' => $designation]);

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
