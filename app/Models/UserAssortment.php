<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAssortment extends Model
{
    protected $table = "user_assortments";

    protected $fillable = ['ocascd', 'user_id', 'octdat'];

    public function assortmentBadge()
    {
        $end = $this->octdat;
        $now = date('Ymd');
        if($this->ocascd == "NULL") {
            $badge = '<span class="flatbadge bg-warning">'.$this->ocascd.'</span>';
        } elseif($end > $now) {
            $badge = '<span class="flatbadge bg-success text-light">'.$this->ocascd.'</span>';
        } else {
            $badge = '<span class="flatbadge bg-warning text-light">'.$this->ocascd.' ('.$this->octdat.')</span>';
        }

        return $badge;
    }   

}
