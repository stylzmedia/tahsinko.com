<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- @if($product)
        <sitemap>
            <loc>{{route('sitemap.products')}}</loc>
            <lastmod>{{$product->created_at->tz('UTC')->toAtomString()}}</lastmod>
        </sitemap>
    @endif
    @if($product_category)
    <sitemap>
        <loc>{{route('sitemap.product.categories')}}</loc>
        <lastmod>{{$product_category->created_at->tz('UTC')->toAtomString()}}</lastmod>
    </sitemap>
    @endif --}}
    @if($article)
    <sitemap>
        <loc>{{route('sitemap.articles')}}</loc>
        <lastmod>{{$article->created_at->tz('UTC')->toAtomString()}}</lastmod>
    </sitemap>
    @endif
    {{-- @if($article_category)
    <sitemap>
        <loc>{{route('sitemap.article.categories')}}</loc>
        <lastmod>{{$article_category->created_at->tz('UTC')->toAtomString()}}</lastmod>
    </sitemap>
    @endif --}}

    @if($project)
    <sitemap>
        <loc>{{route('sitemap.projects')}}</loc>
        <lastmod>{{$project->created_at->tz('UTC')->toAtomString()}}</lastmod>
    </sitemap>
    @endif

    <sitemap>
        <loc>{{route('sitemap.pages')}}</loc>
    </sitemap>
</sitemapindex>
