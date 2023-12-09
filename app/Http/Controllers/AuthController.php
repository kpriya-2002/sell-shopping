<?php

namespace App\Http\Controllers;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
        public function login(Request $request){
            $input = $request->all();
            $validator = Validator::make($input, [
                'email' => 'required',
                'password' => 'required'
    
            ]);
            if ($validator->fails()) {
                return $this->sendError('Invalid Params');
            }  
            $user = User::where('email', $input['email'])->first();
            if (!($user)) {
                return $this->sendError('email or password not valid');
            }else{
                $hashed = Hash::check($request->password,$user->password);
                if($hashed == 1){
                    return $this->sendSuccessMessage('Login Successfully',$user);
                }else{
                    return $this->sendError('email or password not valid');
                }
            }
        }
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

        public function checkUser($request) {
            $data['email']      = isset($request['email']) ? $request['email'] : '';
            $validation =Validator::make($data,[
                'email' => 'unique:users,email|',
            ]);
            if ($validation->fails()) {
                $response['message'] = 'exist';
                $response['result'] = $validation->errors()->all()[0];
                return $response;
            }else{
                $response['message'] = '';
                $response['result'] = '';
                return $response;
            }
	    }

        public function register(Request $request){
            $input = $request->all();
            $validator = Validator::make($input, [
                'user_name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Invalid Params');
            }  
            $validations = $this->checkUser($input);
            if($validations['message'] == "exist") {
                return $this->sendError($validations['result']);
            }    
            $admin = new User();
            $admin->user_name       =  $input['user_name'];
            $admin->email           =  $input['email']; 
            $admin->password        =  Hash::make($input['password']); 
            $admin->save();
            return $this->sendSuccessMessage('user register Successfully',$admin);
        }

        
        
}
