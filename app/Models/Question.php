<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'cauHoi',
        'dapAnA',
        'dapAnB',
        'dapAnC',
        'dapAnD',
        'dapAn',
        'ghiChu',
        'maMonHoc',
        'maMucDo',



    ];

    public function mucDo()
    {
        return $this->belongsTo(Level::class, 'maMucDo', 'id');
    }

    public function monHoc()
    {
        return $this->belongsTo(Subject::class, 'maMonHoc', 'id');
    }

    public function dethis()
    {
        return $this->belongsToMany(Test::class, 'cauhoi_dethi', 'cauhoi_id', 'dethi_id');
    }

    protected $table = 'cauhois';
}
