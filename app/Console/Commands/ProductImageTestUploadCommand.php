<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductImageTestUploadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:product-image-test-upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload test product images';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get all product images from the original image folder
        $originalImageFolder = public_path('product-img');
        $originalImageFiles = scandir($originalImageFolder);
        $originalImageFiles = array_diff($originalImageFiles, array('.', '..'));

        // Create the uploads directory if it doesn't exist
        $uploadsPath = public_path('uploads/2023/05/');
        if (!is_dir($uploadsPath)) {
            mkdir($uploadsPath, 0755, true);
        }

        $productDetails = Storage::disk('public')->get('product-img/products-details.txt');

        $productDetails = explode("\n\n", $productDetails);

        foreach ($originalImageFiles as $index => $filename) {
            $productId = $index + 1;

            // Check if the file is an image
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (!in_array($extension, $imageExtensions)) {
                $this->error("Unsupported image type: $filename");
                continue; // Skip to the next iteration
            }

            // Create image file paths
            $originalImagePath = public_path('product-img/' . $filename);
            $smallImagePath = public_path('uploads/2023/05/small_' . $filename);
            $mediumImagePath = public_path('uploads/2023/05/medium_' . $filename);
            $largeImagePath = public_path('uploads/2023/05/large_' . $filename);
            $originalUploadPath = 'uploads/2023/05/' . $filename;

            // Resize images while maintaining aspect ratio
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

            // Copy original uploaded image to new location
            copy($originalImagePath, public_path($originalUploadPath));

            // Get the last inserted ID
            $lastId = DB::table('media')->orderBy('id', 'desc')->value('id');

            // Increase the last inserted ID by 1
            $nextId = $lastId + 1;

            // Insert media record
            $mediaId = DB::table('media')->insertGetId([
                'id' => $nextId,
                'file_name' => $filename,
                'year' => '2023',
                'month' => '05',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Get the product details for the current index
            $productDetailIndex = $index % count($productDetails);
            $productDetail = explode("\n", $productDetails[$productDetailIndex]);

            // Extract product details
            $productName = $productDetail[0];
            $ceiling = trim(str_replace('Ceiling:', '', $productDetail[1]));
            $cabinWall = trim(str_replace('Cabin Wall:', '', $productDetail[2]));
            $handrail = trim(str_replace('Handrail:', '', $productDetail[3]));
            $floor = trim(str_replace('Floor:', '', $productDetail[4]));
            $tag = trim(str_replace('Tag:', '', $productDetail[5]));

            // Insert product record
            $productRecord = [
                'name' => pathinfo($filename, PATHINFO_FILENAME),
                'feature_type' => '0',
                'freature_image' => $filename,
                'image_path' => '2023/05',
                'media_id' => $mediaId,
                'position' => '2000',
                'status' => '1',
                'created_at' => now(),
                'ceiling' => $ceiling,
                'cabin_wall' => $cabinWall,
                'handrail' => $handrail,
                'floor' => $floor,
                'tag' => $tag
            ];

            DB::table('products')->insert($productRecord);

            // Insert category_product record
            $categoryId = 1; // Replace with the actual category ID
            DB::table('category_product')->insert([
                'category_id' => $categoryId,
                'product_id' => $productId
            ]);

            $this->info("Product image uploaded and inserted into the database: $filename");
        }

        return 0;
    }
}
