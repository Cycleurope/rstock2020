<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToCollection, WithHeadingRow, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($rows as $row)
        {
            $OPCUNO = $row['OPCUNO'];
            $OPCUNM = $row['OPCUNM'];
            $OPCUA1 = $row['OPCUA1'];
            $OPCUA2 = $row['OPCUA2'];
            $OPPONO = $row['OPPONO'];
            $OPTOWN = $row['OPTOWN'];
            $OPECAR = $row['OPECAR'];
            $OPPHNO = $row['OPPHNO'];
            $OKEMAL = $row['OKEMAL'];
            

            if( User::where('username', $OPCUNO)->exists() ) {
                break;
            };

            $user = User::create([
                'username'      => $OPCUNO,
                'name'          => $OPCUNM,
                'address1'      => $OPCUA1,
                'address2'      => $OPCUA2,
                'postalcode'    => $OPPONO,
                'city'          => $OPTOWN,
                'phone'         => $OPPHNO,
                'email'         => $OKEMAL,
                'dep'           => $OKECAR,
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
