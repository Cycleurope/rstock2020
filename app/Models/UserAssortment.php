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
            $badge = '<span class="badge badge-danger">'.$this->ocascd.'</span>';
        } elseif($end > $now) {
            $badge = '<span class="badge badge-success">'.$this->ocascd.'</span>';
        } else {
            $badge = '<span class="badge badge-warning">'.$this->ocascd.' ('.$this->octdat.')</span>';
        }

        return $badge;
    }   

}
