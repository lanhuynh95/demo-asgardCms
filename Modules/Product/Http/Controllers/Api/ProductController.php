<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $product;

    public function __construct(ProductRepository $product)
    {

        $this->product = $product;
    }

    public function list(Request $request) {
        $limit = $request->get('limit') ? $request->get('limit') : 10;
        $products = $this->product->paginate($limit);
        return $products->toJson();
    }
}