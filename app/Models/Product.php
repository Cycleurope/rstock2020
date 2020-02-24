<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductFamily;
use App\Models\ProductAssortment;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['mmitno', 'mmitds', 'mmitcl', 'mmitgr', 'mbaval', 'mbstat', 'mbstqt', 'mmspe1', 'mmspe2', 'mmspe3', 'size', 'family_id', 'type', 'label'];

    public function family()
    {
        return $this->belongsTo(ProductFamily::class);
    }

    public function statusBadge()
    {
        switch($this->mbstat):
            case 20:
                $badge = '<div class="badge badge-success">'.$this->mbstat.' - Ouvert</div/>';
            break;
            case 50:
                $badge = '<div class="badge badge-warning text-dark">'.$this->mbstat.' - Quantité Limitée</div/>';
            break;
            case 80:
                $badge = '<div class="badge badge-danger">'.$this->mbstat.' - Fermé</div/>';
            break;
            default:
                $badge = '<div class="badge">'.$this->mbstat.' -  ??? </div/>';

        endswitch;

        return $badge;
    }

    public function statusBadgeForDealers()
    {
        switch($this->mbstat):
            case 20:
                $badge = '<div class="badge badge-success">Disponible</div/>';
            break;
            case 50:
                $badge = '<div class="badge badge-warning text-dark">Quantité Limitée</div/>';
            break;
            case 80:
                $badge = '<div class="badge badge-danger">Indisponible</div/>';
            break;
            default:
                $badge = '<div class="badge">???</div/>';

        endswitch;

        return $badge;
    }

    public function assortments()
    {
        return $this->hasMany(ProductAssortment::class);
    }

    public function designation()
    {   
        $designation = $this->mmitds;
        if(($this->label != null) || ($this->label != '')) {
            $designation = '<span class="font-weight-bold">'.$this->label.'</span>';
        }
        return $designation;
    }


}
