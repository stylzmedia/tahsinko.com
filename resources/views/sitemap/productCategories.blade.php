<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($categories as $data)
        <url>
            <loc>{{$data->route}}</loc>
            <lastmod>{{$data->created_at->tz('UTC')->toAtomString()}}</lastmod>
            @if($data->image)
            <image:image>
                <image:loc>{{$data->img_paths['original']}}</image:loc>
                <image:title>{{$data->title}}</image:title>
            </image:image>
            @endif
            <changefreq>always</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
</urlset>
