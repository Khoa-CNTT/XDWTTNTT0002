<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'ketquas';


    protected $fillable = [
        'maThanhVien',
        'maDeThi',
        'soCauDung', 'diemThi', 'thoiGianVaoThi', 'thoiGianLamBai'
    ];
}

