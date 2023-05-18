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

        foreach ($originalImageFiles as $filename) {
            $productId = (int) substr($filename, 6, -4);

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
                'year' => 2023,
                'month' => 05,
                'created_at' => now()
            ]);

            // Get the filename without the extension
            $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);

            // Insert product record
            DB::table('products')->insert([
                'name' => $filenameWithoutExtension,
                'feature_type' => '0',
                'freature_image' => $filename,
                'image_path' => '2023/05',
                'media_id' => $mediaId,
                'position' => '2000',
                'status' => '1',
                'created_at' => now(),
            ]);

            // Update product record with media ID
            DB::table('products')
                ->where('id', $productId)
                ->update(['media_id' => $mediaId]);
        }

        // Insert category_product records
        $categoryId = 15;
        DB::table('category_product')->insertUsing(['category_id', 'product_id'], function ($query) use ($categoryId) {
            $query->select([DB::raw("$categoryId as category_id"), 'id as product_id'])
            ->from('products')
            ->where('status', 1);
            });
            $this->info('Product images uploaded successfully!');
            return 0;
        }
}

