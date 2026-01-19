<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{ route('about') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    
    <url>
        <loc>{{ route('contact') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    
    <url>
        <loc>{{ route('blog') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    
    <url>
        <loc>{{ route('projects') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    
    @foreach($categories as $category)
    <url>
        <loc>{{ route('category', $category->slug) }}</loc>
        <lastmod>{{ $category->updated_at->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
    
    @foreach($products as $product)
    <url>
        <loc>{{ route('product', [$product->category->slug ?? 'urunler', $product->slug]) }}</loc>
        <lastmod>{{ $product->updated_at->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
    
    @foreach($blogPosts as $post)
    <url>
        <loc>{{ route('blog.show', $post->slug) }}</loc>
        <lastmod>{{ $post->updated_at->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
    
    @foreach($projects as $project)
    <url>
        <loc>{{ route('project.show', $project->slug) }}</loc>
        <lastmod>{{ $project->updated_at->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
</urlset>
