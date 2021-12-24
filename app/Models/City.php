<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];
    // fillable 3shan lw geh ay param hack y3raf en ely gay mn el form e nfs el asamy de w he igrnore ay 7aga tania w y3mel insert kolo

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
