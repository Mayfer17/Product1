// import { Link } from '@inertiajs/react';
// export default function Show({ product }) { return ( 
// //ตัวแปร product จะรับข้อมูลจากฟังก์ชัน show จากไฟล์ productcontroller
//         <div>
//             <h1>{product.name}</h1>
//             <p>{product.description}</p>
//             <p>Price: ${product.price}</p>
//             <Link href="/products">Back to All Products</Link>
//         </div>
//     );
// }

// โชว์หน้ารายละเอียดสินค้า

import { useState } from "react"; // นำเข้า useState hook จาก React เพื่อใช้ในการจัดการ state
import { Link } from "@inertiajs/react"; // นำเข้า Link จาก @inertiajs/react ใช้ในการเชื่อมโยงหน้าเว็บ

export default function Show({ product }) {  // นิยามฟังก์ชัน Show รับ prop ที่ชื่อ product
  const [currentImageIndex, setCurrentImageIndex] = useState(0); // สร้าง state ชื่อ currentImageIndex เพื่อเก็บ index ของภาพที่แสดง

  const handlePrevious = () => { // ฟังก์ชันที่ใช้ในการย้ายไปยังภาพก่อนหน้า
    setCurrentImageIndex(
      (prevIndex) => (prevIndex === 0 ? product.images.length - 1 : prevIndex - 1) // ถ้าอยู่ที่ภาพแรกจะไปที่ภาพสุดท้าย
    );
  };

  const handleNext = () => { // ฟังก์ชันที่ใช้ในการย้ายไปยังภาพถัดไป
    setCurrentImageIndex(
      (prevIndex) => (prevIndex === product.images.length - 1 ? 0 : prevIndex + 1) // ถ้าอยู่ที่ภาพสุดท้ายจะไปที่ภาพแรก
    );
  };

  return (
    <div className=" min-h-screen"> {/* กำหนดความสูงของหน้าจอให้เต็มที่ */}
      <div className="pt-6"> {/* กำหนด padding-top ให้กับบล็อก */}
        {/* Added Header */}
        <div className="text-center  sm:py-4"> {/* จัดตำแหน่งข้อความให้อยู่กลาง */}
        <h1 className="text-4xl font-extrabold text-brown-800 font-serif">Product Details</h1>{/* แสดงชื่อหัวข้อ */}
        </div>


        {/* Two-column layout */}
        <div className="mx-auto mt-6 max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-8 px-4 sm:px-6 lg:px-8"> {/* เลย์เอาต์เป็น 2 คอลัมน์ */}
          {/* Left column - Product images with carousel */}
          <div className="flex flex-col items-center"> {/* คอลัมน์ซ้ายจัดภาพให้แสดงในลำดับแนวตั้ง */}
            <div className="relative w-full max-w-md"> {/* กำหนดให้คอลัมน์มีความกว้างเต็มที่และมีขนาดสูงสุด */}
              {/* Main Image */}
              <img
                src={product.images[currentImageIndex]} // ใช้ currentImageIndex เพื่อแสดงภาพตามลำดับ
                className="rounded-lg object-cover max-h-[500px] w-full" // กำหนดสไตล์ของภาพ
                alt={`${product.name} - image ${currentImageIndex + 1}`} // แสดงคำบรรยายภาพ
              />

              {/* Navigation Buttons */}
              <button
                onClick={handlePrevious} // เมื่อคลิกจะเรียกใช้ฟังก์ชัน handlePrevious
                className="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-100 p-2 rounded-full shadow-lg hover:bg-blue-200" // ปุ่มย้อนกลับ
              >
                ❮
              </button>
              <button
                onClick={handleNext} // เมื่อคลิกจะเรียกใช้ฟังก์ชัน handleNext
                className="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-100 p-2 rounded-full shadow-lg hover:bg-blue-200" // ปุ่มถัดไป
              >
                ❯
              </button>
            </div>

            {/* Thumbnail Images */}
            <div className="flex gap-2 mt-4"> {/* การแสดงภาพย่อยในแนวนอน */}
              {product.images.map((image, index) => ( // วนลูปเพื่อแสดงภาพย่อย
                <img
                  key={index} // ใช้ index เป็นคีย์สำหรับแต่ละภาพ
                  src={image} // ใช้ image จาก product.images
                  alt={`Thumbnail ${index + 1}`} // คำบรรยายภาพย่อย
                  onClick={() => setCurrentImageIndex(index)} // เมื่อคลิกจะเปลี่ยนภาพหลักเป็นภาพย่อยที่คลิก
                  className={`h-16 w-16 rounded-lg object-cover cursor-pointer ${
                    currentImageIndex === index
                      ? "ring-2 ring-blue-400" // ถ้าภาพย่อยที่คลิกตรงกับภาพหลักจะเพิ่มกรอบสีน้ำเงินเข้ม
                      : "ring-1 ring-blue-200" // ถ้าไม่ตรงจะมีกรอบสีน้ำเงินอ่อน
                  }`}
                />
              ))}
            </div>
          </div>

          {/* Right column - Product info */}
          <div className="flex flex-col justify-center"> {/* คอลัมน์ขวาจัดข้อความให้แสดงในแนวตั้ง */}
            <div>
              <h1 className="text-2xl font-bold tracking-tight text-gray-600 sm:text-3xl">
                {product.name} {/* แสดงชื่อผลิตภัณฑ์ */}
              </h1>
              <p className="mt-4 text-base text-gray-700">{product.description}</p> {/* แสดงคำอธิบายผลิตภัณฑ์ */}
            </div>

            <div className="mt-6">
              <p className="text-2xl font-bold tracking-tight text-blue-500">฿{product.price}</p> {/* แสดงราคา */}
              
              <div className="mt-6">
                <Link
                  href="/products" // ลิงค์กลับไปยังหน้าผลิตภัณฑ์ทั้งหมด
                  className="mt-4 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors"
                >
                  Back 
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
