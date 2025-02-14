<?php

namespace Modules\Mall\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = true;
    
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'uid',
        'order_no',
        'thirdparty_order_no',
        'title',
        'amount',
        'refund_amount',
        'pay_type',
        'paid_at',
        'type',
        'status'
    ];

    public function goodsOrder() {
        return $this->hasOne(GoodsOrder::class, 'order_id');
    }

    public function goodsOrderDetail() {
        return $this->hasMany(GoodsOrderDetail::class, 'order_id');
    }

    public function user() {
        return $this->belongsTo('App\User','uid');
    }
}