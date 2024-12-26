// import { Link } from '@inertiajs/react'; 
// export default function Index({ products }) {
//     return (
//         <>
//             <h1>Product Index</h1>
//             <div>
//                 <ul>
//                     {products.map((product) => (
//                         <li key={product.id}>
//                             <Link href={`/products/${product.id}`}>
//                                 {product.name} - ${product.price}
//                             </Link>
//                         </li>
//                     ))}
//                 </ul>
//             </div>

//         </>

//     );
// }

//โชว์หน้าแรกของสินค้า 

export default function Index({ products }) { // นิยามฟังก์ชัน Index ที่รับ prop ชื่อ products
    return (
        <div className="bg-gradient-to-b from-[#E4DBBE]  min-h-screen"> {/* กำหนดพื้นหลังและความสูงเต็มหน้าจอ */}
            <div className="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-15 lg:max-w-7xl lg:px-8"> {/* กำหนดขนาดของคอนเทนต์ภายในให้เหมาะสมกับขนาดหน้าจอ */}
            <h2 className="text-6xl font-extrabold tracking-tight text-brown-800 text-center mb-10 font-serif">
                Products
            </h2>

  {/* หัวข้อชื่อ "Products" ตั้งอยู่กลางหน้าและมีการตั้งค่าฟอนต์ */}
                <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8"> {/* กำหนดการจัดเรียงสินค้าด้วยกริด */}
                    {products.map((product) => ( // วนลูปผ่าน products เพื่อแสดงสินค้าทุกตัว
                        <a
                            key={product.id} // ใช้ id ของผลิตภัณฑ์เป็นคีย์
                            href={`/products/${product.id}`} // ลิงค์ไปยังหน้ารายละเอียดของสินค้าตาม id
                            className="group shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-lg bg-white" // ตั้งค่ารูปลักษณ์ของลิงค์ รวมถึงเงาเมื่อ hover
                        >
                            <img
                                src={product.image} // ใช้ภาพจากข้อมูลของผลิตภัณฑ์
                                alt={product.name} // กำหนดคำอธิบายภาพ
                                className="aspect-square w-full rounded-t-lg bg-gray-200 object-cover group-hover:opacity-90 xl:aspect-[7/8]" // กำหนดขนาดและสไตล์ของภาพ
                            />
                            <div className="p-4"> {/* บล็อกสำหรับข้อมูลภายในที่ใช้ padding รอบๆ */}
                                <h3 className="text-sm font-medium text-gray-700 group-hover:text-gray-900"> {/* ชื่อของสินค้า */}
                                    {product.name}
                                </h3>
                                <p className="mt-2 text-lg font-semibold text-blue-800"> {/* ราคาสินค้า */}
                                    ฿{product.price}
                                </p>
                            </div>
                        </a>
                    ))}
                </div>
            </div>
        </div>
    );
  }
  