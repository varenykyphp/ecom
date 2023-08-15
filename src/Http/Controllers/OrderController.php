<?php

namespace VarenykyECom\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use VarenykyECom\Models\Order;
use VarenykyECom\Repositories\OrderRepository;

class OrderController extends Controller
{
    
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $orders = $this->repository->getAllPaginated();

        return view('VarenykyECom::orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order):View
    {
        return view('VarenykyECom::orders.show',compact('order'));
    }
}
