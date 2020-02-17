<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductFamily;
use App\Models\ProductAssortment;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['mmitno', 'mmitds', 'mmitcl', 'mmitgr', 'mbaval', 'mbstat', 'mbstqt', 'mmspe1', 'mmspe2', 'mmspe3', 'size', 'family_id', 'type'];

    public function family()
    {
        return $this->belongsTo(ProductFamily::class);
    }

    public function statusBadge()
    {
        switch($this->mbstat):
            case 20:
                $badge = '<div class="flatbadge flatbadge-green">'.$this->mbstat.' - Ouvert</div/>';
            break;
            case 50:
                $badge = '<div class="flatbadge bg-warning">'.$this->mbstat.' - Bientôt épuisé</div/>';
            break;
            case 80:
                $badge = '<div class="flatbadge bg-danger text-light">'.$this->mbstat.' - Fermé</div/>';
            break;
            default:
                $badge = '<div class="flatbadge">'.$this->mbstat.' -  ??? </div/>';

        endswitch;

        return $badge;
    }

    public function statusBadgeForDealers()
    {
        switch($this->mbstat):
            case 20:
                $badge = '<div class="flatbadge flatbadge-green">Disponible</div/>';
            break;
            case 50:
                $badge = '<div class="flatbadge bg-warning">Bientôt épuisé</div/>';
            break;
            case 80:
                $badge = '<div class="flatbadge bg-danger text-light">Indisponible</div/>';
            break;
            default:
                $badge = '<div class="flatbadge">???</div/>';

        endswitch;

        return $badge;
    }

    public function assortments()
    {
        return $this->hasMany(ProductAssortment::class);
    }


}
