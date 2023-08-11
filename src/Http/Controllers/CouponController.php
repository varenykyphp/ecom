<?php

namespace VarenykyECom\Http\Controllers;

use VarenykyECom\Models\Coupon;
use Illuminate\Http\Request;
use VarenykyECom\Models\Customer;
use VarenykyECom\Repositories\CouponRepository;
use Varenyky\Http\Controllers\BaseController;

class CouponController extends BaseController
{
    public function __construct(CouponRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = $this->repository->getAll();
        return view('VarenykyECom::coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $resellers = Customer::all();
        return view('VarenykyECom::coupons.create',compact('resellers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = $request->except(['_token']);
        $create['customer_id'] = auth()->user()->id;
        $coupons = $this->repository->create($create);
        return redirect()->route('admin.coupons.edit',$coupons);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        $resellers = Customer::all();
        return view('VarenykyECom::coupons.edit',compact('coupon','resellers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $update = $request->except(['_token','_method']);
         $this->repository->update($coupon->id,$update);

        return redirect()->route('admin.coupons.edit', $coupon->id)->with('success', __('labels.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('admin.coupons.index')->with('error', __('labels.deleted'));
    }
}