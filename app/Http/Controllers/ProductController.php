<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{

    
    private $products = [
        // รายละเอียดของสินค้า 
        ['id' => 1, 'name' => 'Aroma Happy Scented Candle',
        
        // คำอธิบายสินค้า
        'description' => "The encounter between a watery and sunny composition and the stimulating virtues of candle of clove: it's going to be a fine day! ",
        
        // ราคาของสินค้า
        'price' => '1,736',
        
        
        // รายการภาพของสินค้า (มีหลายภาพ)
        'images' => [
            'https://www.maisonbergerthailand.com/cdn/shop/files/006362-2.jpg?crop=center&height=1139&v=1721898280&width=900',
            'https://www.maisonbergerthailand.com/cdn/shop/files/006362-6.jpg?crop=center&height=1139&v=1721898281&width=900',
            'https://www.maisonbergerthailand.com/cdn/shop/files/006362-1.jpg?crop=center&height=1139&v=1721898268&width=900'
        ],
        
        // ลิงก์ภาพหลักที่แสดงสินค้า
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/006362-2.jpg?crop=center&height=1139&v=1721898280&width=900'
    ],
    
        ['id' => 2, 'name' => 'château de versailles - boudoir de la reine',

        'description' => "Queen Marie-Antoinette adored flowers, including rose and jasmine, inspiring the creation of this feminine scented candle with true floral spiced femininity.", 

         'price' => '1,970',

        'images' => [

         'https://www.maisonbergerthailand.com/cdn/shop/files/006709-4.jpg?crop=center&height=1139&v=1721832712&width=900',
         'https://www.maisonbergerthailand.com/cdn/shop/files/006709-2.jpg?crop=center&height=1139&v=1721832713&width=900',
         'https://www.maisonbergerthailand.com/cdn/shop/files/006709-3.jpg?crop=center&height=1139&v=1721832713&width=900'

        ],'image' =>'https://www.maisonbergerthailand.com/cdn/shop/files/006709-1.jpg?crop=center&height=1139&v=1721832713&width=900'],

        ['id' => 3, 
        'name' => 'MSF Scented Candle 180g - Ocean Breeze',

        'description' => 'Maison Berger Paris is pursuing its commitment with Médecins Sans Frontières with the release of a new collection. You can support the association’s actions too: 1 Ocean Breeze scented candle for MSF purchased = €1 donated to the NGO!', 
        'price' => '1,344',

        'images' => [

         'https://www.maisonbergerthailand.com/cdn/shop/files/007414_Bougie-parfumee-Vent-d-Ocean-pour-MSF_P_2_ad2f2086-7e99-49bf-b1fc-b9c53fbc73a3.jpg?crop=center&height=1139&v=1721898101&width=900',
         'https://www.maisonbergerthailand.com/cdn/shop/files/007414_Bougie-parfumee-Vent-d-Ocean-pour-MSF_P_3_8bd840ef-1ba6-4097-9202-8ef831f243af.jpg?crop=center&height=1139&v=1721898105&width=900',
         'https://www.maisonbergerthailand.com/cdn/shop/files/007414_Bougie-parfumee-Vent-d-Ocean-pour-MSF_P_5_778204b1-da6c-46e0-993d-edc4d09028b2.jpg?crop=center&height=1139&v=1721898111&width=900'
        ],
        //
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/007414_Bougie-parfumee-Vent-d-Ocean-pour-MSF_P_1_255a16a6-b548-402f-bdec-9c847bbbf4ec.jpg?crop=center&height=1139&v=1721898098&width=900'],

        ['id' => 4,
        'name' => 'Lolita Lempicka Scented Candle',

        'description' => '
The memory and emotion of the fragrances of our first times linger in our hearts, evoking a sense of nostalgia and timeless beauty that connects us to the moments we cherish most.', 
        'price' => '2,616',

        'images' => [

         'https://www.maisonbergerthailand.com/cdn/shop/files/006337-2.jpg?crop=center&height=1139&v=1721786611&width=900',
         'https://www.maisonbergerthailand.com/cdn/shop/files/006337-4.jpg?crop=center&height=1600&v=1721786611&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/006337-5.jpg?crop=center&height=1139&v=1721786611&width=900'
        ],
        
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/006337-1.jpg?crop=center&height=1139&v=1721786611&width=900'],

        ['id' => 5, 
        'name' => 'Lolita Lempicka Scented Candle ',

        'description' => "The memory and emotion of the fragrances of our first times linger like whispers in the air, evoking cherished moments and painting vivid pictures of our most treasured beginnings.", 
        
        'price' => '2,616',

        'images' => [

         'https://www.maisonbergerthailand.com/cdn/shop/files/006338-2.jpg?crop=center&height=1600&v=1721786612&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/006338-4.jpg?crop=center&height=1600&v=1721786612&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/006338-5.jpg?crop=center&height=1600&v=1721786612&width=1600'
        ],
        //
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/006338-1.jpg?crop=center&height=1600&v=1721786612&width=1600'],

        ['id' => 6, 
        'name' => 'Lolita Lempicka Scented Candle',

        'description' => 'The memory and emotion of the fragrances of our first times transport us back to moments of pure joy and discovery, where every scent tells a story, every aroma sparks a feeling, and every breath becomes a journey through time.', 
        
        'price' => '2,616',
        
        'images' => [

         'https://www.maisonbergerthailand.com/cdn/shop/files/006372-2.jpg?crop=center&height=1600&v=1721786594&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/006372-5.jpg?crop=center&height=1600&v=1721786594&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/006372-6.jpg?crop=center&height=1600&v=1721786594&width=1600'
        ],
        //
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/006372-1.jpg?crop=center&height=1139&v=1721786594&width=900'],

        ['id' => 7, 
        'name' => 'Evanescence Fauve Scented Candle',

        'description' => "Close out the evening with a nightcap or two with this mysterious and alluring candle featuring Mystic Leather. Available in 2 colors, fauve and gris.", 
         
         'price' => '1,344',
        
         'images' => [

         'https://www.maisonbergerthailand.com/cdn/shop/files/007493_EVANESCENCE-BOUGIE-FAUVE_A_1_f9b65096-08b6-475e-bc85-dcbab9810eb7.jpg?crop=center&height=1600&v=1721896811&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/007493_EVANESCENCE-BOUGIE-FAUVE_P_2_61910e8a-f507-4a4d-ab03-47ad1a04d389.jpg?crop=center&height=1600&v=1721896790&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/007493_EVANESCENCE-BOUGIE-FAUVE_P_4_f4c2013a-84cc-4c64-aba1-baaa5d63dd54.jpg?crop=center&height=1600&v=1721896799&width=1600'
        ],
        //
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/007493_EVANESCENCE-BOUGIE-FAUVE_P_1_32f12f06-5945-4795-b834-02281e73335c.jpg?crop=center&height=1139&v=1721896786&width=900'],

        ['id' => 8, 
        'name' => 'Evanescence Gris Scented Candle',

        'description' => 'Close out the evening with a nightcap or two with this mysterious and alluring candle featuring Mystic Leather. Available in 2 colors, fauve and gris.', 
        
        'price' => '1,344',

        'images' => [

         'https://www.maisonbergerthailand.com/cdn/shop/files/007494_EVENESCENCE-BOUGIE-GRISE_P_2_e771520c-581b-4b57-8344-fbfc04defdbe.jpg?crop=center&height=1600&v=1721896834&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/007494_EVENESCENCE-BOUGIE-GRISE_P_4_6e395f45-9eda-4c96-896a-6ef757caf222.jpg?crop=center&height=1600&v=1721896849&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/007494_EVENESCENCE-BOUGIE-GRISE_P_5_1636480f-fa83-41b8-8dbb-f4945b0225a8.jpg?crop=center&height=1600&v=1721896855&width=1600'
        ],
        //
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/007494_EVENESCENCE-BOUGIE-GRISE_P_1_828b70c2-c702-4d87-8e81-d40cf60e1273.jpg?crop=center&height=1600&v=1721896830&width=1600'],

        ['id' => 9, 
        'name' => 'Joy Scented Candle[Agaves Garden]',

        'description' => "Light the flame of romance with a luminous candle in a dreamy dusty rose shade and an alluring floral aroma.", 
        
        'price' => '1,344',
        
        'images' => [
         'https://www.maisonbergerthailand.com/cdn/shop/files/007413-JOY-BOUGIE-180G-ROSE-2500x3100-P-5.jpg?crop=center&height=1600&v=1721897830&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/007413-JOY-BOUGIE-180G-ROSE-2500x3100-P-4.jpg?crop=center&height=1600&v=1721897830&width=1600'
        ],
        //
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/007413-JOY-BOUGIE-180G-ROSE-2500x3100-P-1.jpg?crop=center&height=1600&v=1721897830&width=1600'],

        ['id' => 10, 
        'name' => 'Geode Paprika Scented Candle [ Land of Spices]',

        'description' => 'Opt for the bright red color of this scented candle and its spicy fragrance to warm up your interior. 
        The rich, bold aroma will envelop your space, creating an inviting atmosphere. Ideal for cozy evenings, it adds a touch 
        of elegance and warmth, making any room feel more comfortable and welcoming. Let the candle’s vibrant hue and alluring scent 
        transform your environment, perfect for moments of relaxation or intimate gatherings.', 
        'price' => '1,344',

        'images' => [
         'https://www.maisonbergerthailand.com/cdn/shop/files/7409-GEODE-BOUGIE-PAPRIKA-2500x3100-P-4.jpg?crop=center&height=1600&v=1721897192&width=1600',
         'https://www.maisonbergerthailand.com/cdn/shop/files/7409-GEODE-BOUGIE-PAPRIKA-2500x3100-P-3.jpg?crop=center&height=1600&v=1721897193&width=1600'
        ],
        
        'image' => 'https://www.maisonbergerthailand.com/cdn/shop/files/7409-GEODE-BOUGIE-PAPRIKA-2500x3100-P-1.jpg?crop=center&height=1139&v=1721897192&width=900'],

        
        ];

    /**
     * Display a listing of the resource.
     */
    public function index() // ฟังก์ชัน index ที่จะถูกเรียกเมื่อผู้ใช้เข้าไปที่หน้าแสดงรายการสินค้า
    {
        return Inertia::render('Products/Index', ['products' => $this->products]); // ใช้ Inertia เพื่อ render view 'Products/Index' พร้อมส่งข้อมูลสินค้าไปยังไฟล์ Index.jsx
        // ส่งข้อมูลไปที่ตัวแปร products ในไฟล์ Index.jsx
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // ฟังก์ชัน create ที่ใช้ในการแสดงฟอร์มสำหรับการสร้างสินค้ารายการใหม่
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // ฟังก์ชัน store ที่ใช้สำหรับรับข้อมูลจากฟอร์มสร้างสินค้าและบันทึกลงฐานข้อมูล
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id) // ฟังก์ชัน show ที่แสดงรายละเอียดของสินค้าแต่ละชิ้น
    {   
        $product = collect($this->products)->firstWhere('id', $id); // ค้นหาสินค้าที่มี id ตรงกับที่ได้รับจากพารามิเตอร์

        if (!$product) { // หากไม่พบสินค้า
            abort(404, 'Product not found'); // แสดงข้อผิดพลาด 404
        }
        return Inertia::render('Products/Show', ['product' => $product]); // ใช้ Inertia ในการ render หน้าแสดงรายละเอียดสินค้า
        // ส่งข้อมูลไปที่ตัวแปร product ในไฟล์ Show.jsx
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) // ฟังก์ชัน edit ที่ใช้ในการแสดงฟอร์มแก้ไขข้อมูลสินค้า
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // ฟังก์ชัน update ที่ใช้ในการอัพเดตข้อมูลสินค้าตามที่ผู้ใช้ระบุ
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) // ฟังก์ชัน destroy ที่ใช้ในการลบสินค้าจากฐานข้อมูล
    {
        //
    }
} 