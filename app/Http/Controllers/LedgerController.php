<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductListResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LedgerController extends Controller
{
    public function productReport(): AnonymousResourceCollection
    {
       return ProductListResource::collection(Product::all());
    }

}
