<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\OrderItem\OrderItemResource;
use App\Models\Discount;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Order
 */
class OrderDiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'discounts' => $this->whenLoaded('discounts', function () {
                return $this->discounts->map(function (Discount $discount) {
                    return [
                        'discount_reason' => $discount->discount_reason,
                        'discount_amount' => $discount->discount_amount,
                    ];
                });
            }),
            'total' => $this->total,
        ];
    }
}
