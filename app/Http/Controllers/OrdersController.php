<?php

namespace App\Http\Controllers;;

use App\Category;
use App\FoodType;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\PaymentType;
use App\SubCategory;
use App\Table;
use App\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\File;

class OrdersController extends Controller
{
    public function sendError($message) {
        $response['message'] = $message;
        return response()->json($response, 200);
    }
    public function sendSuccessMessage($message,$response) {
        return response()->json([
            'result' => $response,
            'message' => $message,
        ]);
    }
    public function getActivePaymentModes(Request $request){
        $paymentTypes = PaymentType::where('status',1)->get();
        return $this->sendSuccessMessage('Payment types listed Successfully',$paymentTypes);
    }
    public function getActiveTaxes(Request $request){
        $paymentTypes = Tax::where('status',1)->get();
        return $this->sendSuccessMessage('Taxes listed Successfully',$paymentTypes);
    }
    public function getAllListForOrder(){
        $category = Category::where('status',1)->get();
        foreach($category as $key => $val){
            $category[$key]->types = FoodType::where('status',1)->get();
            foreach($category[$key]->types as $key1 => $value){
                $category[$key]->types[$key1]->sub_category = SubCategory::where('sub_category_type',$value->type_code)->get();
            }
        }
        $tables = Table::where('status',1)->get();
        $response['category'] = $category;
        $response['tables'] = $tables;
        return $this->sendSuccessMessage('AllList listed Successfully',$response);
    }
    public function addOrder(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'bill_no' => 'required',
            'order_type' => 'required',
            'payment_type' => 'required',
            'taxes' => 'required',
            'sub_total' => 'required',
            'discount' => 'required',
            'order_items' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Invalid Params');
        }
        setlocale(LC_ALL,"hu_HU.UTF8");
        $orders = new Order();
        $orders->bill_no            = $input['bill_no'];
        $orders->date               = date("Y-m-d");
        $orders->time               = strftime("%X");
        $orders->order_type         = $input['order_type'];
        $orders->payment_type       = $input['payment_type'];
        $orders->taxes              = $input['taxes'];
        $orders->sub_total          = $input['sub_total'];
        $orders->discount           = $input['discount'];
        $orders->total_amount       = $input['total_amount'];
        $orders->save();
        foreach($input['order_items'] as $key => $val){
            $orderItems = new OrderItem();
            $orderItems->order_id   = $orders->id;
            $orderItems->food_name  = $val['food_name'];
            $orderItems->food_id    = $val['food_id'];
            $orderItems->price      = $val['price'];
            $orderItems->qty        = $val['qty'];
            $orderItems->total_price = $val['total_price'];
            $orderItems->save();
        }
        return $this->sendSuccessMessage('Order Placed Successfully',$orders);
    }
}