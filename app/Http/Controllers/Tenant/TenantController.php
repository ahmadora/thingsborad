<?php

namespace App\Http\Controllers\Tenant;

use App\Classes\HelperClass;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Tenant;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function service(){
        return view('admin.customer.service');
    }
    public function createCustomer(Request $request){
        $email = Auth::user()->email;
        $token = Auth::user()->token;
        $password = Auth::user()->getAuthPassword();
        $URL = "http://localhost:8080/api/customer";
        $help = new HelperClass($email, $password, $token);
        if ($help->isTenant()){
            $client = new Client([
                'headers' => [
                    'Accept' => 'application/json',
                    'X-Authorization'=>$token,
                ]
            ]);
        $request = $client->post($URL, ['json' => [
            "additionalInfo" => "null",
            "address" => $request->input('address'),///reqired
            "address2" => "string",
            "city" => $request->input('city'),///reqired
            "country" => "string",
            "createdTime" => 0,
            "email" => $request->input('email'),//////reqired
            "name" => $request->input('name'),////reqired
            "phone" => $request->input('phone'),///reqired
            "region" => "string",
            "state" => "string",
            "title" => $request->input('title'),///reqired
            'zip' => "string"]]);
            $data = $request->getBody()->getContents();
            $response = json_decode($data, true);
$response = new Customer();

            dd($response);
         }
        dd($email);
    }
    public function index()
    {
    return view('admin.index');
    }
    public function create()
    {    $email = Auth::user()->email;
        $token = Auth::user()->token;
        $password = Auth::user()->getAuthPassword();
        $help = new HelperClass($email, $password, $token);
        if ($help->isTenant()){
            return view('admin.customer.create');
        }else{
            return view('404');
        }
    }
    public function store(Request $request)
    {

    }
    public function show()
    {
        $email = Auth::user()->email;
        $token = Auth::user()->token;
        $password = Auth::user()->getAuthPassword();
        $help = new HelperClass($email, $password, $token);
        if ($help->isTenant()){
            $user = User::where('email',$email)->get();
            $arr['users']=$user;
            dd( $arr);
        }
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
