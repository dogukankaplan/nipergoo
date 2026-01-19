<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Feature;
use App\Models\Faq;
use App\Models\BlogPost;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@nipergo.com.tr',
            'password' => Hash::make('admin123'),
        ]);

        // Site Settings
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'NiPergo', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_logo', 'value' => null, 'group' => 'general', 'type' => 'image'],
            ['key' => 'site_favicon', 'value' => null, 'group' => 'general', 'type' => 'image'],

            // Contact
            ['key' => 'contact_phone', 'value' => '+90 532 134 30 16', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'info@nipergo.com.tr', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => 'Barbaros Mahallesi 5301 Sokak No:6 Bornova-İzmir', 'group' => 'contact', 'type' => 'textarea'],
            ['key' => 'contact_whatsapp', 'value' => '+905321343016', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'working_hours', 'value' => 'Pazartesi - Cumartesi: 09:00 - 18:00', 'group' => 'contact', 'type' => 'text'],

            // Social Media
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/nipergo', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/nipergo', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/nipergo', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/nipergo', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/nipergo', 'group' => 'social', 'type' => 'text'],

            // SEO
            ['key' => 'seo_title', 'value' => 'İzmir Otomatik Pergola | Bioklimatik Pergola Sistemleri | NiPergo', 'group' => 'seo', 'type' => 'text'],
            ['key' => 'seo_description', 'value' => 'İzmir otomatik pergola ve bioklimatik pergola sistemlerinde uzman çözümler! Estetik ve dayanıklı tasarımlar ile açık alanlarınızı konforlu hale getiriyoruz.', 'group' => 'seo', 'type' => 'textarea'],
            ['key' => 'seo_keywords', 'value' => 'izmir otomatik pergola, izmir pergola, izmir tente, bioklimatik pergola, motorlu pergola, pergola sistemleri', 'group' => 'seo', 'type' => 'textarea'],

            // About
            ['key' => 'about_short', 'value' => 'Alüminyum doğrama dış cephe ve gölgelendirme sistemlerinde uzun yıllardır sektörün içerisinde olan firmamız piyasada 10.000 adet hareketli sistem montajı yapmıştır.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_experience', 'value' => '10+', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_projects', 'value' => '10000+', 'group' => 'about', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }

        // Sliders
        Slider::create([
            'title' => 'İzmir Pergola Sistemleri',
            'subtitle' => 'Yaşam Alanlarınızı Güzelleştiriyoruz',
            'description' => 'Bioklimatik pergola, motorlu pergola ve LED aydınlatmalı pergola çözümlerimizle mekanlarınıza değer katıyoruz.',
            'button_text' => 'İletişime Geç',
            'button_url' => '/iletisim',
            'is_active' => true,
            'order' => 1,
        ]);

        Slider::create([
            'title' => 'Otomatik Tente Sistemleri',
            'subtitle' => 'Güneşten Korunmanın En Şık Yolu',
            'description' => 'Modern tente sistemlerimizle dış mekanlarınızı her mevsim kullanılabilir hale getirin.',
            'button_text' => 'Ürünleri İncele',
            'button_url' => '/golgelendirme',
            'is_active' => true,
            'order' => 2,
        ]);

        // Features
        $features = [
            ['title' => 'Kaliteli Malzeme', 'description' => 'Modern pergola sistemlerimizde kullandığımız yüksek kaliteli malzemeler sayesinde uzun ömürlü ve dayanıklı çözümler sunuyoruz.', 'icon' => 'shield-check', 'order' => 1],
            ['title' => 'Motorlu Sistem', 'description' => 'Pergola sistemlerimizde kullanılan motorlu mekanizma sayesinde kolay kullanım ve maksimum konfor sağlıyoruz.', 'icon' => 'cog', 'order' => 2],
            ['title' => 'LED Aydınlatma', 'description' => 'Bioklimatik pergola sistemlerimizde bulunan LED aydınlatma özelliği ile geceleri de kullanışlı ve şık bir ortam yaratıyoruz.', 'icon' => 'light-bulb', 'order' => 3],
            ['title' => 'Hızlı Montaj', 'description' => 'Pergola sistemlerimizin montajını deneyimli ekibimizle hızlı ve profesyonel bir şekilde gerçekleştiriyoruz.', 'icon' => 'clock', 'order' => 4],
            ['title' => '7/24 Destek', 'description' => 'Pergola sistemlerimizle ilgili her türlü sorunuz için teknik ekibimiz 7/24 hizmetinizde.', 'icon' => 'phone', 'order' => 5],
            ['title' => 'Garantili Ürün', 'description' => 'Tüm pergola sistemlerimiz 2 yıl garanti kapsamındadır. Kaliteli malzeme ve işçilik garantisi veriyoruz.', 'icon' => 'badge-check', 'order' => 6],
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }

        // FAQs
        $faqs = [
            ['question' => 'Pergola sistemleri hangi malzemelerden üretilir?', 'answer' => 'Modern pergola sistemlerimiz alüminyum, çelik ve özel kaplamalı malzemelerden üretilmektedir. Bu malzemeler sayesinde uzun ömürlü ve dayanıklı pergola sistemleri elde ediyoruz.', 'order' => 1],
            ['question' => 'Pergola montajı ne kadar sürer?', 'answer' => 'Pergola montaj süresi, seçilen sisteme ve mekanın büyüklüğüne göre değişmektedir. Ortalama montaj süresi 1-3 gün arasındadır.', 'order' => 2],
            ['question' => 'Pergola sistemleri bakım gerektirir mi?', 'answer' => 'Pergola sistemlerimiz minimum bakım gerektirir. Yıllık bir kez genel kontrol ve temizlik yeterlidir. Motorlu sistemler için periyodik bakım önerilir.', 'order' => 3],
            ['question' => 'Pergola sistemleri rüzgara dayanıklı mıdır?', 'answer' => 'Modern pergola sistemlerimiz rüzgara karşı dayanıklıdır. Özel tasarım ve malzeme seçimleri sayesinde fırtınalı havalarda bile güvenle kullanılabilir.', 'order' => 4],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // Categories
        $aluminyumDograma = Category::create([
            'name' => 'Alüminyum Doğrama',
            'slug' => 'aluminyum-dograma',
            'description' => 'Modern alüminyum doğrama sistemleri',
            'is_active' => true,
            'order' => 1,
        ]);

        $kisBahcesi = Category::create([
            'name' => 'Kış Bahçesi',
            'slug' => 'kis-bahcesi',
            'description' => 'Kış bahçesi ve pergola sistemleri',
            'is_active' => true,
            'order' => 2,
        ]);

        $golgelendirme = Category::create([
            'name' => 'Gölgelendirme',
            'slug' => 'golgelendirme',
            'description' => 'Tente ve gölgelendirme sistemleri',
            'is_active' => true,
            'order' => 3,
        ]);

        // Products - Alüminyum Doğrama
        $aluminyumProducts = [
            ['title' => 'Çift Kanat Fotoselli Kapı', 'slug' => 'cift-kanat-fotoselli-kapi', 'short_description' => 'Modern çift kanat fotoselli kapı sistemleri'],
            ['title' => 'Isı Yalıtımlı Alüminyum Doğrama', 'slug' => 'isi-yalitimli-aluminyum-dograma', 'short_description' => 'Enerji tasarruflu ısı yalıtımlı sistemler'],
            ['title' => 'Katlanır Cam', 'slug' => 'katlanir-cam', 'short_description' => 'Şık ve pratik katlanır cam sistemleri'],
            ['title' => 'Sürme Cam Sistemleri', 'slug' => 'surme-cam-sistemleri', 'short_description' => 'Modern sürme cam sistemleri'],
        ];

        foreach ($aluminyumProducts as $i => $product) {
            Product::create(array_merge($product, ['category_id' => $aluminyumDograma->id, 'order' => $i + 1]));
        }

        // Products - Kış Bahçesi
        $kisBahcesiProducts = [
            ['title' => 'Bioklimatik Pergola', 'slug' => 'bioklimatik-pergola', 'short_description' => 'Hava koşullarına uyumlu bioklimatik pergola sistemleri', 'is_featured' => true],
            ['title' => 'Giyotin Cam Sistemleri', 'slug' => 'giyotin-cam', 'short_description' => 'Dikey açılır giyotin cam sistemleri'],
            ['title' => 'Kamelya Tente', 'slug' => 'kamelya-tente', 'short_description' => 'Şık kamelya tente sistemleri'],
            ['title' => 'Otomatik Tente', 'slug' => 'otomatik-tente', 'short_description' => 'Motorlu otomatik tente sistemleri'],
            ['title' => 'Rolling Roof', 'slug' => 'rolling-roof', 'short_description' => 'Açılır kapanır rolling roof sistemleri'],
            ['title' => 'Rüzgar Kırıcı', 'slug' => 'ruzgar-kirici', 'short_description' => 'Cam rüzgar kırıcı sistemleri'],
            ['title' => 'Şeffaf Branda', 'slug' => 'seffaf-branda', 'short_description' => 'Şeffaf PVC branda sistemleri'],
            ['title' => 'Zip Perde', 'slug' => 'zip-perde', 'short_description' => 'Zip perde sistemleri'],
        ];

        foreach ($kisBahcesiProducts as $i => $product) {
            Product::create(array_merge($product, ['category_id' => $kisBahcesi->id, 'order' => $i + 1]));
        }

        // Products - Gölgelendirme
        $golgeProducts = [
            ['title' => 'Karpuz Tente', 'slug' => 'karpuz-tente', 'short_description' => 'Dekoratif karpuz tente sistemleri'],
            ['title' => 'Kasetli Tente', 'slug' => 'kasetli-tente', 'short_description' => 'Kasetli motorlu tente sistemleri'],
            ['title' => 'Körüklü Tente', 'slug' => 'koruklu-tente', 'short_description' => 'Körüklü tente sistemleri'],
            ['title' => 'Mafsallı Tente', 'slug' => 'mafsalli-tente', 'short_description' => 'Mafsallı tente sistemleri', 'is_featured' => true],
            ['title' => 'Wintent Tente', 'slug' => 'wintent-tente', 'short_description' => 'Wintent marka tente sistemleri'],
        ];

        foreach ($golgeProducts as $i => $product) {
            Product::create(array_merge($product, ['category_id' => $golgelendirme->id, 'order' => $i + 1]));
        }

        // Blog Posts
        BlogPost::create([
            'title' => 'Bioklimatik Pergola: 4 Mevsim Kullanım Konforu',
            'slug' => 'bioklimatik-pergola-4-mevsim-kullanim-konforu',
            'excerpt' => 'Bioklimatik pergola sistemleri, modern yaşam alanlarının vazgeçilmez bir parçası haline gelmiştir.',
            'content' => '<p>Bioklimatik pergola sistemleri, modern yaşam alanlarının vazgeçilmez bir parçası haline gelmiştir. Bu sistemler, hava koşullarına uyum sağlayan lamel yapısı sayesinde 4 mevsim kullanım konforu sağlar.</p><p>Yaz aylarında güneş ışınlarını engellerken, kış aylarında güneşin içeri girmesine izin verir. Yağmurlu havalarda ise tamamen kapanarak su geçirmez bir ortam oluşturur.</p>',
            'is_published' => true,
            'published_at' => now(),
        ]);

        BlogPost::create([
            'title' => 'Modern Pergola Sistemleri ile Yaşam Alanlarınızı Yeniden Keşfedin',
            'slug' => 'modern-pergola-sistemleri-ile-yasam-alanlarinizi-yeniden-kesfedin',
            'excerpt' => 'Pergola sistemleri, yaşam alanlarınızı dönüştürmenin en etkili yollarından biridir.',
            'content' => '<p>Pergola sistemleri, yaşam alanlarınızı dönüştürmenin en etkili yollarından biridir. Modern tasarımları ve fonksiyonel özellikleri ile hem estetik hem de pratik çözümler sunar.</p><p>Motorlu sistemler sayesinde tek tuşla açılıp kapanabilen pergolalar, LED aydınlatma seçenekleri ile gece kullanımında da konfor sağlar.</p>',
            'is_published' => true,
            'published_at' => now()->subDays(7),
        ]);

        // Pages
        Page::create([
            'title' => 'Hakkımızda',
            'slug' => 'hakkimizda',
            'content' => '<h2>Biz Kimiz?</h2><p>2010 yılından bu yana, modern pergola sistemleri konusunda uzmanlaşmış firmamız, yaşam alanlarınızı güzelleştirmek ve konforlu hale getirmek için çalışıyoruz.</p><h2>Misyonumuz</h2><p>Müşterilerimize en kaliteli pergola sistemlerini sunarak, yaşam alanlarını daha konforlu ve estetik hale getirmek.</p><h2>Vizyonumuz</h2><p>Türkiye\'nin önde gelen pergola sistemleri sağlayıcısı olmak ve sektörde standartları belirleyen bir marka haline gelmek.</p>',
            'meta_title' => 'Hakkımızda | İzmir\'in Lider Pergola Firması - NiPergo',
            'meta_description' => '10+ yıllık tecrübeyle İzmir\'de pergola sistemleri, tente ve alüminyum doğrama çözümleri sunuyoruz.',
            'is_active' => true,
        ]);
    }
}
