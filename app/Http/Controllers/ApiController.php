<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\cart;
use App\Models\Custaddresss;
use App\Models\customer;
use App\Models\disease;
use App\Models\disease_category;
use App\Models\disgallary;
use App\Models\disvideo;
use App\Models\product;
use App\Models\product_category;
use App\Models\productdis;
use App\Models\unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class ApiController extends Controller
{
    public function CustomerRegister(Request $req)
    {
        $register = customer::create([
            'name' => $req->name,
            'mobile' => $req->mobile,
            'email' => $req->email,
            'password' => bcrypt($req->password)
        ]);
        if ($register) {
            return response()->json([
                'message' => ' successfully registered',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => ' something went wrong',
                'status_code' => '00'
            ], 400);
        }
    }

    public function CustomerEdit(Request $req)
    {

        $register = customer::find($req->id)->update([
            'name' => $req->name,
            'mobile' => $req->mobile,
            'email' => $req->email,
        ]);
        if ($register) {
            return response()->json([
                'message' => ' successfully Edited',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => ' something went wrong',
                'status_code' => '00'
            ], 400);
        }
    }

    public function CustomerLog()
    {
        $customer = customer::where('mobile', request('mobile'))->first();
        if ($customer) {
            if (Hash::check(request('password'), $customer->password)) {

                $token = $customer->createToken('mobile-app')->plainTextToken;

                return response()->json([
                    'token' => $token,
                    'message' => 'Credentials are valid, Login success',
                    'status' => '200'
                ]);
            } else {
                return response()->json([
                    'message' => 'Invalid Password, Login failed',
                    'status' => '400'
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Invalid mobile',
                'status' => '400'
            ]);
        }
    }

    public function GatAllDetails()
    {
        $discat = disease_category::where('status', 'active')->latest()->limit(4)->get();
        $dis = disease::where('status', 'active')->latest()->limit(4)->get();
        $prodcat = product_category::where('status', 'active')->latest()->limit(4)->get();
        $prod = product::where('status', 'active')->latest()->limit(4)->get();
        $banner = banner::where('status', 'active')->latest()->limit(4)->get();
        return response()->json([
            'disease_category' => $discat,
            'disease' => $dis,
            'product_category' => $prodcat,
            'product' => $prod,
            'banner' => $banner,
            'message' => 'success',
            'status_code' => '01'
        ], 200);
    }

    public function GatDiscatDetails()
    {
        $discat = disease_category::where('status', 'active')->get();
        return response()->json([
            'disease_category' => $discat,
            'message' => 'success',
            'status_code' => '01'
        ], 200);
    }

    public function GatDiseaseDet($dc_id)
    {
        $disease = disease::where('disease_category', $dc_id)->where('status', 'active')->get();
        $video = disvideo::where('dis_id', $dc_id)->where('status', 'active')->get();
        $gallary = disgallary::where('dis_id', $dc_id)->where('status', 'active')->get();
        $product = productdis::where('dis_id', $dc_id)->where('status', 'active')->get();
        if ($disease == '[]') {
            return response()->json([
                'message' => 'error',
                'status_code' => '00'
            ], 400);
        } else {
            return response()->json([
                'disease' => $disease,
                'video' => $video,
                'gallary' => $gallary,
                'product' => $product,
                'message' => 'success',
                'status_code' => '01'
            ], 200);
        }
    }
    public function GatProdcatDet()
    {
        $prodcat = product_category::where('status', 'active')->get();
        return response()->json([
            'product_category' => $prodcat,
            'message' => 'success',
            'status_code' => '01'
        ], 200);
    }

    public function GatProductDet($pc_id)
    {
        $product = product::where('product_category', $pc_id)->where('status', 'active')->get();
        $unit = unit::where('prod_id', $pc_id)->where('status', 'active')->get();
        if ($product == '[]') {
            return response()->json([
                'message' => 'error',
                'status_code' => '00'
            ], 400);
        } else {
            return response()->json([
                'product' => $product,
                'unit' => $unit,
                'message' => 'success',
                'status_code' => '01'
            ], 200);
        }
    }

    public function ChangeCustomerPW(Request $request)
    {

        $customer_id = auth()->user()->id;
        $Oldpassword = $request->old_password;
        $currentPassword = auth()->user()->password;

        $newPassword = $request->new_password;


        if (Hash::check($Oldpassword, $currentPassword)) {
            customer::where('id', $customer_id)->update([
                'password' => bcrypt($request->new_password),
            ]);
            return response()->json([
                'message' => 'password changed successfully',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => 'incorrect old password',
                'status_code' => '00'
            ], 400);
        }
    }

    public function ChangeDetails()
    {
        $customer_id = auth()->user()->id;
        $customer = customer::where('id', $customer_id)->first();
        return response()->json([
            'customer' => $customer,
            'status_code' => '01',
        ]);
    }

    public function CustAddress(Request $req)
    {

        if (Custaddresss::where('cust_id', auth()->user()->id)->exists()) {
            $default = 0;
        } else {
            $default = 1;
        }
        $address = Custaddresss::create([
            'cust_id' => auth()->user()->id,
            'name' => $req->name,
            'mobile' => $req->mobile,
            'address' => $req->address,
            'district' => $req->district,
            'state' => $req->state,
            'pincode' => $req->pincode,
            'landmark' => $req->landmark,
            'default' => $default,
        ]);
        if ($address) {
            return response()->json([
                'message' => ' successfully added address',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => ' something went wrong',
                'status_code' => '00'
            ], 400);
        }
    }

    public function CustAddressEdit(Request $req)
    {
        $addressedit = Custaddresss::find($req->id)->update([
            'name' => $req->name,
            'mobile' => $req->mobile,
            'address' => $req->address,
            'district' => $req->district,
            'state' => $req->state,
            'pincode' => $req->pincode,
            'landmark' => $req->landmark,
        ]);
        if ($addressedit) {
            return response()->json([
                'message' => ' successfully Edited',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => ' something went wrong',
                'status_code' => '00'
            ], 400);
        }
    }
    public function CustAddDel(Request $req)
    {
        $address = Custaddresss::find($req->id);
        if ($address->default == 1) {
            $addressdelete = Custaddresss::find($req->id)->update([
                'status' => 'inactive',
                'default' => '0',
            ]);
            $defaultaddress = Custaddresss::where('cust_id', auth()->user()->id)->where('id', '!=', $req->id)->where('status', 'active')->orderBy('id', 'ASC')->limit(1)->first();
            if ($defaultaddress) {
                Custaddresss::find($defaultaddress->id)->update([

                    'default' => '1',
                ]);
            }
        } else {
            $addressdelete = Custaddresss::find($req->id)->update([
                'status' => 'inactive',
            ]);
        }


        if ($addressdelete) {
            return response()->json([
                'message' => 'deleted successfully',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => ' something went wrong',
                'status_code' => '00'
            ], 400);
        }
    }

    public function CustAddDefault(Request $req)
    {
        $adressdefault = Custaddresss::where('id', $req->id)->update([
            'default' => '1',
        ]);
        $adressnotdefault = Custaddresss::where('id', '!=', $req->id)->update([
            'default' => '0'
        ]);
        if ($adressdefault) {
            return response()->json([
                'message' => 'changed successfully',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => ' something went wrong',
                'status_code' => '00'
            ], 400);
        }
    }

    public function CustAddrssDetails()
    {
        $addressdet = Custaddresss::where('status', 'active')->get();
        return response()->json([
            'address_details' => $addressdet,
            'message' => 'success',
            'status_code' => '01'
        ], 200);
    }


    public function AddCart(Request $req)
    {
        $addtocart = cart::create([
            'customer_id' => auth()->user()->id,
            'unit_id' => $req->unit_id,
            'quantity' => $req->quantity,
        ]);
        if ($addtocart) {
            return response()->json([
                'message' => ' successfully added to cart',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => ' something went wrong',
                'status_code' => '00'
            ], 400);
        }
    }

    public function CartList($cust_id)
    {
        $cart = cart::join('units', 'carts.unit_id', '=', 'units.id')
       ->join('products', 'units.prod_id', '=', 'products.id')
    ->select('carts.*', 'units.*', 'products.*')
    ->where('carts.customer_id',$cust_id)
    ->get();

        if ($cart == '[]') {
            return response()->json([
                'message' => 'error',
                'status_code' => '00'
            ], 400);
        } else {
            return response()->json([
                'cart_items' => $cart,
                'message' => 'success',
                'status_code' => '01'
            ], 200);
        }
    }
    // juyuyukki

    public function CartItemDel(Request $req){
        $cartitem=cart::find($req->id)->delete();

        if ($cartitem) {
            return response()->json([
                'message' => 'deleted successfully',
                'status_code' => '01'
            ], 200);
        } else {
            return response()->json([
                'message' => ' something went wrong',
                'status_code' => '00'
            ], 400);
        }
    }
}
