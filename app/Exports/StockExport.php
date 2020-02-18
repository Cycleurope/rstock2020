<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Product;

class StockExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::whereIn('type', ['bike', 'frame'])->get();
    }

    public function map($product): array
    {
        return [
            $product->mmitno,
            $product->mmitds,
            $product->mmspe1,
            $product->mmspe2,
            $product->mmspe3,
            $product->size,
            $product->mbaval,
        ];
    }

    public function headings(): array {
        return [
            'Code Article',
            'Désignation',
            'Spec 1',
            'Spec 2',
            'Spec 3',
            'Hauteur',
            'Net'
        ];
    }
}
