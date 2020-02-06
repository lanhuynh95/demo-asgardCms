<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\CreateProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Repositories\ProductRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Product\Events\RecipeWasCreated;
use File;

class ProductController extends AdminBaseController
{
    /**
     * @var ProductRepository
     */
    private $product;

    public function __construct(ProductRepository $product)
    {
        parent::__construct();

        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->product->all();

        return view('product::admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('product::admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductRequest $request
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $image = $request->file('image');
        $nameImage = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/media/');
        $image->move($destinationPath, $name);
        
        $product = $this->product->create([
            'name'  => $request->name,
            'price' => $request->price,
            'image' => $nameImage,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.product.product.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('product::products.title.products')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        return view('product::admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Product $product
     * @param  UpdateProductRequest $request
     * @return Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $nameImage = $product->image;
        if(isset($request->image)) {
            File::delete(public_path('/assets/media/'). $product->image);
            $image = $request->file('image');
            $nameImage = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/media/');
            $image->move($destinationPath, $product->name);
        };
        $this->product->update($product, [
            'name'  => $request->name,
            'price' => $request->price,
            'image' => $nameImage,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.product.product.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('product::products.title.products')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        $this->product->destroy($product);

        return redirect()->route('admin.product.product.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('product::products.title.products')]));
    }
}
