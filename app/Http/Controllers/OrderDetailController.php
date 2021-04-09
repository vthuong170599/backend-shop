<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderDetailResource;
use App\Repositories\OrderDetailRepository;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    protected $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(OrderDetailResource::collection($this->orderDetailRepository->getAll()));
        return OrderDetailResource::collection($this->orderDetailRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * show by order id
     * @param Integer id order
     * @return Array order detail
     */
    public function showByOrderId($order_id){
        return $this->orderDetailRepository->showByOrderId($order_id);
    }
}
