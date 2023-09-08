<?php

namespace VarenykyECom\Services;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use VarenykyECom\Models\Customer;
use VarenykyECom\Models\Order;
use VarenykyECom\Models\Order2Products;

class OrderService
{
    private static function remove_tax(float $price): float
    {
        return $price / 1.10;
    }

    private static function get_tax_value(float $price): float
    {
        return $price - self::remove_tax($price);
    }

    public static function make(Request $request): Order
    {
        $customer = new Customer;
        $customer->company_name = $request->input('company_name');
        $customer->name = $request->input('name');
        // $customer->email = $request->input('email');
        $customer->phone_number = $request->input('telephone');
        $customer->street = $request->input('street_addr');
        $customer->house_number = "";
        $customer->postalcode = $request->input('postalcode');
        $customer->city = $request->input('city');
        $customer->country_id = $request->input('country_id');
        $customer->user_id = 1;
        $customer->save();

        $order = new Order;
        $order->uuid = Str::uuid();
        $order->billing_customer_id = $customer->id;
        $order->delivery_customer_id = $customer->id;
        $order->subtotal = Cart::getSubTotal();
        $order->shipping = 0;
        $order->coupon = 0;
        $order->coupons = 0;
        $order->tax = self::get_tax_value(Cart::getTotal());
        $order->total = Cart::getTotal();
        $order->tax_rate_id = 1;
        $order->save();

        foreach (Cart::getContent() as $item) {
            $row = new Order2Products;
            $row->order_id = $order->id;
            $row->product_id = $item->id;
            $row->quantity = $item->quantity;
            $row->price = $item->getPriceSum();
            $row->total = $item->getPriceSum();
            $row->tax_rate_id = 1;
            $row->save();
        }

        return $order;
    }

    public static function paid($orderId)
    {
        Order::where('id', $orderId)->update(['status' => 'paid']);
    }
}
