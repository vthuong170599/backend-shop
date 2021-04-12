<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection($this->productRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('thumb')) {
            $file = $request->thumb;
            $name = time() . $file->getClientOriginalName();
            $file_path = $request->file('thumb')->move('uploads/', $name);
            $path_name = $file_path->getPathname();
        }
        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'discount' => $request->discount,
            'qty' => $request->qty,
            'cate_id' => $request->cate_id,
            'sale_price' => $request->price - ($request->price * ($request->discount / 100)),
            'thumb' => $path_name ?? ''
        ];
        return $this->productRepository->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource($this->productRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Product $product, Request $request)
    {
        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'discount' => $request->discount,
            'qty' => $request->qty,
            'cate_id' => $request->cate_id,
            'sale_price' => $request->price - ($request->price * ($request->discount / 100)),
        ];
        if ($request->hasFile('thumb')) {
            $file = $request->thumb;
            $name = time() . $file->getClientOriginalName();
            $file_path = $request->file('thumb')->move('uploads/', $name);
            $path_name = $file_path->getPathname();
        }else{
            $path_name = $this->productRepository->find($product->id)->thumb;
        }
        $data['thumb'] = $path_name;
        return $product->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->productRepository->delete($id);
    }

    /**
     * search product
     * @param  int  $id
     * @return App\Resource\ProductReource
     */
    public function search(Request $request)
    {
        return ProductResource::collection($this->productRepository->search('name', $request->name));
    }

     /**
     * get product by category
     * @param  \Illuminate\Http\Request  $request
     * @return App\Resource\ProductReource
     */
    public function getProductByCategory($id){
        return ProductResource::collection($this->productRepository->getProductByCategory($id));
    }
}
