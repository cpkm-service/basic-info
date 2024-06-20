<?php

namespace Cpkm\Basic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;
    
    use \Cpkm\Admin\Traits\ObserverTrait, \Cpkm\Admin\Traits\QueryTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'remark',
        'exchange',
        'unit_price_float',
        'price_float',
    ];

    public static $audit = [
        //要紀錄欄位
        'only' => [
            'name',
            'code',
            'remark',
            'exchange',
            'unit_price_float',
            'price_float',
        ],      
    ];

    public $detail = [
        'id',
        'name',
        'code',
        'remark',
        'exchange',
        'unit_price_float',
        'price_float',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
