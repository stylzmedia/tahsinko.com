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
        Session::flash('success', 'Cache Clear successfully!');
        return redirect()->route('homepage');
    }

    public function productsImport() {
        Artisan::call('command:product-image-test-upload');
        Session::flash('success', 'Product images uploaded successfully!');
        return redirect()->route('homepage');
    }

    // Config
    public function config(){
        $admin = User::where('email', 'admin@me.com')->first();
        if(!$admin){
            $admin = new User;
            $admin->type = 'admin';
            $admin->last_name = 'Admin';
            $admin->email = 'admin@me.com';
            $admin->mobile_number = '123456789';
            $admin->password = Hash::make(123456789);
        }else{
            $admin->password = Hash::make(123456789);
        }

        $admin->save();

        // Some Settings
        $where = array();
        $where['group'] = 'general';

        $where['name'] = 'title';
        $insert['value'] = env('APP_NAME');
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'mobile_number';
        $insert['value'] = '123456789';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'email';
        $insert['value'] = 'admin@me.com';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'copyright';
        $insert['value'] = 'Copyright ' . date('Y');
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'slogan';
        $insert['value'] = env('APP_NAME');
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'city';
        $insert['value'] = 'city';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'state';
        $insert['value'] = 'state';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'country';
        $insert['value'] = 'country';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'zip';
        $insert['value'] = 'zip';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'street';
        $insert['value'] = 'street';
        DB::table('settings')->updateOrInsert($where, $insert);

        dd('success');
    }
}
