<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;


class TestController extends Controller
{
    public function cacheClear(){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');

        Session::flash('success', 'Cache, Config, View, Route Clear successfully!');
        return redirect()->route('homepage');
    }

    public function productsImport() {
        Artisan::call('command:product-image-test-upload');
        Session::flash('success', 'Product images uploaded successfully!');
        return redirect()->route('homepage');
    }


    public function productImports()
    {
        $excelFilePath = public_path('RLC1-104.xlsx');
        $imageFolder = public_path('product-images');
        $uploadsPath = public_path('uploads/2023/05');

        set_time_limit(30000);
        ini_set('memory_limit','-1');

        $products = Excel::toArray([], $excelFilePath);
        foreach ($products[0] as $index => $product) {
            $productName = $product[0];
            $productDescription = $product[1];
            $rearWall = $product[2];
            $sideWall = $product[3];
            $note = $product[4];
            $centerPlate = $product[5];
            $auxPlates = $product[6];
            $centerBack = $product[7];
            $centerSide = $product[8];
            $featureImage = $product[9];

            $productName = !empty($productName) ? $productName : null;
            $productDescription = !empty($productDescription) ? $productDescription : null;
            $rearWall = !empty($rearWall) ? $rearWall : null;
            $sideWall = !empty($sideWall) ? $sideWall : null;
            $note = !empty($note) ? $note : null;
            $centerPlate = !empty($centerPlate) ? $centerPlate : null;
            $auxPlates = !empty($auxPlates) ? $auxPlates : null;
            $centerBack = !empty($centerBack) ? $centerBack : null;
            $centerSide = !empty($centerSide) ? $centerSide : null;
            $featureImage = !empty($featureImage) ? $featureImage : null;


            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
            $extension = strtolower(pathinfo($featureImage, PATHINFO_EXTENSION));

            if (!in_array($extension, $imageExtensions)) {
                Log::error("Unsupported image type for product $productName: $extension");
                continue;
            }
            $meta = 'tahsinko-lift-cabin-';
            // $featureImage = 'tahsinko-lift-cabin-'.$featureImage;
            $originalImagePath = $imageFolder . '/' . $featureImage;
            // dd($featureImage);
            $smallImagePath = $uploadsPath .  '/small_'.$meta. $featureImage;
            $mediumImagePath = $uploadsPath . '/medium_'.$meta. $featureImage;
            $largeImagePath = $uploadsPath . '/large_'. $meta. $featureImage;
            $originalUploadPath = 'uploads/2023/05/'.$meta . $featureImage;
            // dd($originalUploadPath);
            $image = Image::make($originalImagePath);
            $image->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($smallImagePath);

            $image->resize(410, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($mediumImagePath);

            $image->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($largeImagePath);

            copy($originalImagePath, public_path($originalUploadPath));

            $mediaId = DB::table('media')->insertGetId([
                'file_name' => $featureImage,
                'year' => '2023',
                'month' => '05',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $productRecord = [
                'name' => $productName,
                'description' => $productDescription,
                'rear_wall' => $rearWall,
                'side_wall' => $sideWall,
                'note' => $note,
                'center_plate' => $centerPlate,
                'aux_plates' => $auxPlates,
                'center_back' => $centerBack,
                'center_side' => $centerSide,
                'freature_image' => $meta.$featureImage,
                'image_path' => '2023/05',
                'media_id' => $mediaId,
                'position' => '2000',
                'status' => '1',
                'created_at' => now(),
            ];
            // dd($productRecord);

            Product::create($productRecord);

            $categoryId = 1;
            $productId = Product::orderBy('id', 'desc')->value('id');
            DB::table('category_product')->insert([
                'category_id' => $categoryId,
                'product_id' => $productId,
            ]);
        }

        Session::flash('success', 'Product images uploaded successfully!');
        return redirect()->route('homepage');
    }


    // Config
    public function config(){
        $where = array();
        $where['group'] = 'general';

        // Web Info
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

        $where['group'] = 'social';

        // Social
        $where['name'] = 'facebook';
        $insert['value'] = 'https://www.facebook.com/tahsinkolift/';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'twitter';
        $insert['value'] = 'https://twitter.com/tahsinkolift/';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'youtube';
        $insert['value'] = 'https://www.youtube.com/@tahsinkolift7692/';
        DB::table('settings')->updateOrInsert($where, $insert);

        $where['name'] = 'linkedin';
        $insert['value'] = 'https://www.linkedin.com/company/tahsinko-limited/';
        DB::table('settings')->updateOrInsert($where, $insert);

        //Logo & Fabicons

        dd('success');
    }
}
