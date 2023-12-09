<?php

namespace App\Http\Controllers;;

use App\Category;
use App\FoodType;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\File;

class Categorycontroller extends Controller
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
    public function addCategory(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Invalid Params');
        }  
        $category = new Category();
        $category->category_name    =  $input['category_name'];
        $category->save();
        return $this->sendSuccessMessage('Category create Successfully',$category);
    }
    public function updateCategory(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'required',
            'category_name' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Invalid Params');
        }  
        $category = Category::where('id',$input['id'])->first();
        $category->category_name    =  (isset($input['category_name'])) ? $input['category_name'] : $category->category_name;
        $category->save();
        return $this->sendSuccessMessage('Category updated Successfully',$category);
    }
    public function listAllCategory(){
        $category = Category::get();
        return $this->sendSuccessMessage('Category listed Successfully',$category);
    }
    public function addProduct(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'phone_number' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Invalid Params');
        }  
        $imagePath = "";
        if(isset($input['image'])){
            ob_start();
            $path = "uploads/images/".str::random(10).".png"; 
            $fileData = base64_decode($input['image']);
            File::put($_SERVER['DOCUMENT_ROOT'].'/'.$path, $fileData);
            $imagePath = $path;
            ob_end_flush();
        }
        $category = new Product();
        $category->title                =  $input['title'];
        $category->description          =  $input['description'];
        $category->price                =  $input['price'];
        $category->category_id          =  $input['category_id'];
        $category->phone_number         =  $input['phone_number'];
        $category->image                =  $imagePath;
        $category->save();
        return $this->sendSuccessMessage('Product create Successfully',$category);
    }
    public function ListProduct(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Invalid Params');
        }
        if($input['category_id'] == "0"){
            $List = Product::get();
        }else{
            $List = Product::Where('category_id',$input['category_id'])->get();
        }
        return $this->sendSuccessMessage('Product listed Successfully',$List);
    }
}