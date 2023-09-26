<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\customer;
use App\Models\disease;
use App\Models\disease_category;
use App\Models\product;
use App\Models\product_category;
use App\Models\productdis;
use App\Models\unit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function signin(){
        return view('homeweb.signin');
    }


    public function signUp(){
        return view('homeweb.signup');
    }

    public function register(Request $request){

        $request->validate([
            'name'=>'required',
            'mobile'=> 'required|numeric|max_digits:10|min_digits:10',
            'email'=> 'nullable|unique:customers,email',
            'password'=>'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);

        $user=customer::create([
        'name' => $request->name,
        'mobile' => $request->mobile,
        'email' => $request->email,
        'password' =>bcrypt($request->password),
        ]);


        if ($user) {
            return redirect()->route('signin');
        }else {
            return back()->with('fail','something went wrong');
        }
    }

    public function check(Request $req){
        $req->validate([
            'mobile'=> 'required|required|numeric|max_digits:10|min_digits:10',
            'password'=>'required|min:8'
        ]);
        if (auth()->attempt([
            'mobile' => $req->mobile,
            'password'=> $req->password,
        ])) {
            return redirect()->route('index');
        }else {
            return back()->with('fail','You have to Signup');
        }
    }

    public function UserLogout(){
        auth()->logout();
        return redirect()->route('signin');
    }






    public function index(){
        $banners=banner::where('status','active')->get();
        $diseasecat=disease_category::where('status','active')->get();

        $trendproducts=product_category::where('trending','1')->where('status','active')->latest()->paginate(8);
        $featuredproducts=product_category::where('featured','1')->where('status','active')->latest()->paginate(8);

        return view('homeweb.index',compact('banners', 'diseasecat','trendproducts','featuredproducts'));
    }





    public function disease(){
        $diseases=disease::where('status','active')->get();
        return view('homeweb.disease',compact('diseases',));
    }

    public function disSingle($id){
        $dis=disease::find($id);
        $productdis=productdis::where('dis_id',$id)->where('status','active')->get();
        return view('homeweb.diseasesingle',compact('dis','productdis'));
    }





    public function diseasecat($id){
        $discat=disease_category::find($id);
        $diseases=disease::where('disease_category',$id)->where('status','active')->get();
        return view('homeweb.discatsingle',compact('discat','diseases'));

    }






    public function product(){
        $products=product::where('status', 'active')->get();
        return view('homeweb.products',compact('products'));
    }

    public function trndproduct(){
        $trendingprods=product_category::where('trending','1')->where('status','active')->get();
        return view('homeweb.trndproduct',compact('trendingprods'));
    }
    public function featrdproduct(){
        $featrdprods=product_category::where('featured','1')->where('status','active')->get();
        return view('homeweb.featrdproduct',compact('featrdprods'));
    }

    public function prodSingle($id){
        $prod=product::find($id);
        $productdis=productdis::where('prod_id',$id)->where('status','active')->get();
        $defaultunit=unit::where('default','1')->first();

        $relatedprod=product::where('product_category', $prod->product_category)->where('id', '!=', $id)
        ->where('status','active')->get();

        $units=unit::where('prod_id',$id)->where('status','active')->get();


        return view('homeweb.productsingle',compact('prod','productdis','relatedprod','units','defaultunit'));
    }

    public function prodCatSingle($id){
        $pcsingle=product_category::find($id);
        $pc_products=product::where('product_category',$id)->get();
        return view('homeweb.prodcatsingle',compact('pcsingle','pc_products'));
    }


    public function profile(){
        $profile=customer::all();
        return view('homeweb.profile',compact('profile'));
    }
    public function UpdateProf(Request $request){
        $request->validate([
            'name'=>'required',
            'mobile'=> 'required|numeric|max_digits:10|min_digits:10',
            // 'email'=> 'nullable|unique:customers,email',
            // 'password'=>'required|confirmed|min:8',
            // 'password_confirmation' => 'required'
        ]);

        $user=customer::find(auth())->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            // 'email' => $request->email,
            // 'password' =>bcrypt($request->password),
            ]);

            if ($user) {
                return back()->with('success','profile successfully updated');
            }else {
                return back()->with('fail','something went wrong');
            }
    }



    public function about(){
        return view('homeweb.about');
    }
    public function contact(){
        return view('homeweb.contact');
    }

    public function getprice(Request $request){
        $uid = $request->unit_id;
        $output = '';

                $unit_det = unit::where('id', $uid)->first();

                    $output .= '
                    <h4 class="mb-0 single-orgnl-price">₹'.$unit_det->offer_price.'</h4>
						<h4 class="mb-0 single-dcnt-price">₹ '.$unit_det->price.'</h4>';


        echo $output;

    }




}
