<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\User;
use App\Models\UserAssortment;

class DealersByAssortmentExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::whereHas('assortments', function($q) {
            $q->where('ocascd', 'F/BIA');
        })->get();  

        $users = User::where('role', 'dealer')->get();
        return $users;
    }

    public function map($user): array
    {
        return [
            $user->username,
            $user->name,
        ];
    }

    public function headings(): array {
        return [
            'Code Client',
            'Nom Client',
        ];
    }
}
