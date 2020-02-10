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
        foreach ($collection as $row)
        {
            $OPCUNO = $row['opcuno'];
            $OPCUNM = $row['opcunm'];
            $OPCUA1 = $row['opcua1'];
            $OPCUA2 = $row['opcua2'];
            $OPPONO = $row['oppono'];
            $OPTOWN = $row['optown'];
            $OPECAR = $row['opecar'];
            $OPPHNO = $row['opphno'];
            $OKEMAL = $row['okemal'];

            if($OKEMAL != "") {
                $user = User::firstOrCreate([
                    'email'      => $OKEMAL,
                ], [
                    'username'      => $OPCUNO,
                    'name'          => $OPCUNM,
                    'address1'      => $OPCUA1,
                    'address2'      => $OPCUA2,
                    'postalcode'    => $OPPONO,
                    'city'          => $OPTOWN,
                    'phone'         => $OPPHNO,
                    'email'         => $OKEMAL,
                    'password'      => bcrypt('password'),
                    'role'          => 'dealer',
                    //'dep'           => $OKECAR,
                ]);
            }
            
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
