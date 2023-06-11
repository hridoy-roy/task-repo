<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'purchase_rate' => $this->purchase_rate,
            'sale_rate' => $this->sale_rate,
            'totalPurchase' => $this->purchaseDetails()->sum('quantity'),
            'totalPurchaseAmount' => $this->purchaseDetails()->sum('total'),
            'totalSale' => $this->saleDetails()->sum('quantity'),
            'totalSaleAmount' => $this->saleDetails()->sum('total'),
            'profitLoss' => ($this->saleDetails()->sum('quantity') * $this->sale_rate) - ($this->saleDetails()->sum('quantity') * $this->purchase_rate),
            'totalStock' => $this->purchaseDetails()->sum('quantity') - $this->saleDetails()->sum('quantity'),
        ];
    }
}
