<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductFamily;
use App\Models\ProductAssortment;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['mmitno', 'mmitds', 'mmitcl', 'mmitgr', 'mbaval', 'mbstat', 'mbstqt', 'mmspe1', 'mmspe2', 'mmspe3', 'size', 'family_id'];

    public function family()
    {
        return $this->belongsTo(ProductFamily::class);
    }

    public function statusBadge()
    {
        switch($this->mbstat):
            case 20:
                $badge = '<div class="flatbadge flatbadge-green">'.$this->mbstat.' - Disponible</div/>';
            break;
            case 50:
                $badge = '<div class="flatbadge bg-warning">'.$this->mbstat.' - Bientôt épuisé</div/>';
            break;
            case 90:
                $badge = '<div class="flatbadge bg-danger">'.$this->mbstat.' - Non disponible</div/>';
            break;
            default:
                $badge = '<div class="flatbadge">'.$this->mbstat.' -  ??? </div/>';

        endswitch;

        return $badge;
    }

    public function assortments()
    {
        return $this->belongsToMany(ProductAssortment::class);
    }


}
