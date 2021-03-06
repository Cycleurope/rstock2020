<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\UserAssortment;

class UsersImport implements ToCollection, WithHeadingRow, WithStartRow, WithChunkReading, ShouldQueue
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
            $OCASCD = $row['ocascd'];
            $OCTDAT = $row['octdat'];
            $OKSTAT = intval($row['okstat']);
            $OPADID = $row["opadid"];
            $OKSMCD = trim($row['oksmcd']);

            if($OKEMAL != "" && ($OKSTAT == 20) && ($OPADID == "")) {
                $user = User::updateOrCreate([
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
                    'role'          => 'dealer',
                    'resp'          => $OKSMCD,
                    //'dep'           => $OKECAR,
                ]);

                $assortment = UserAssortment::updateOrCreate([
                    'ocascd' => htmlspecialchars_decode(str_replace('/', "_", $OCASCD)),
                    'user_id' => $user->id,
                ], [
                    'octdat' => $OCTDAT,
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
