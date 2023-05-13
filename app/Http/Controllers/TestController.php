<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function cacheClear(){
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:cache');
        Artisan::call('route:cache');

        Session::flash('success', 'Cache, Config, View, Route Clear successfully!');
        return redirect()->route('homepage');
    }

    public function productsImport() {
        Artisan::call('command:product-image-test-upload');
        Session::flash('success', 'Product images uploaded successfully!');
        return redirect()->route('homepage');
    }

    // Config
    public function config(){
        // $admin = User::where('email', 'admin@me.com')->first();
        // if(!$admin){
        //     $admin = new User;
        //     $admin->type = 'admin';
        //     $admin->last_name = 'Admin';
        //     $admin->email = 'admin@me.com';
        //     $admin->mobile_number = '123456789';
        //     $admin->password = Hash::make(123456789);
        // }else{
        //     $admin->password = Hash::make(123456789);
        // }

        // $admin->save();

        // Some Settings
        $where = array();
        $where['group'] = 'general';

        $where['name'] = 'title';
        $insert['value'] = env('APP_NAME');
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'mobile_number';
        $insert['value'] = '+8801819 014568, +88 01713 588470';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'tel';
        $insert['value'] = '+88 02 222242057';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'email';
        $insert['value'] = 'tahsinkolift@gmail.com';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'copyright';
        $insert['value'] = '©' . date('Y');
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'slogan';
        $insert['value'] = env('APP_NAME');
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'city';
        $insert['value'] = 'Dhaka';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'state';
        $insert['value'] = 'Dhaka';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'country';
        $insert['value'] = 'Bangladesh';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'zip';
        $insert['value'] = '1207';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'street';
        $insert['value'] = '102/1, Sute # 6B, West Agargaon, Sher-E-Bngla Nagar';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'gmap';
        $insert['value'] = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3651.10264234258!2d90.368883!3d23.779359!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x76ab8f3f8298600f!2sTAHSINKO%20Limited%20-%20One%20of%20The%20Best%20Lift%20Company%20In%20Bangladesh!5e0!3m2!1sen!2sus!4v1662369883060!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        DB::table('settings')->updateOrInsert($where, $insert);

        // SEO
        $where['name'] = 'meta_description';
        $insert['value'] = 'TAHSINKO® is a Trade Mark™ Registered® organization, who is professional in operating all kinds of elevator, escalator, moving walk and complete accessories.';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'keywords';
        $insert['value'] = 'lift company in bangladesh, lift in bangladesh, elevator company in bangladesh,  lift in dhaka, lift price in bangladesh, elevator price in bangladesh, escalator company in bangladesh';
        DB::table('settings')->updateOrInsert($where, $insert);

        //Logo & Fabicons

        dd('success');
    }
}
