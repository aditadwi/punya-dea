<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class produk extends Model
{
    use HasFactory;
    protected $fillable=['nama','description','stock','price'];

    public function detiltransaksi():BelongsTo
    {
       
            return $this->belongsTo(Detiltransaksi::class);    
    }
}
