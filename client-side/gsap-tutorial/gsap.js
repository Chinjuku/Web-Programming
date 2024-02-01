// การทำ animation แนะนำให้ปิด page ที่ over-flow ก่อน
// overflow: hidden ใน css

gsap.registerPlugin(ScrollTrigger); // Register plugin
gsap.default({ease: 'linear'}) // สามารถตั้งเป็น default ได้
// gsap แบบ Timeline ต่อกัน .to({}).to({}) 1 จบ 2 ทำงาน
// สามารถใส่ {animate ใน .timelineก็ได้}
const timeline = gsap.timeline(); 
timeline.to("#title", { // .to "#title" (animate จาก title -> to function ข้างล่าง)
    // Properties ใน gsap scroll trigger
    scrollTrigger: {
        trigger: "#hero",
        pin: true,
        start: "top top",
        //start: "ตำแน่งของtrigger ตำแหน่งของจอ" สามารถใส่เป็น "px %"
        end: "+=1900 80%", //เพิ่มระยะ pixel (+=) จบ และ จะจบการทำงานเมื่อถึง 80% ของจอ
        scrub: 0.2, // scrub = ภาพย้อนกลับ true, false และ ย้อนเป็นวินาที 0-999
        pin: true, //ทำให้ trigger หยุดเคลื่อนตอนเรื่ม (start) , และ trigger ขยับต่อตาม scroll ตอนจบ (end) 
        pinSpacing: false, // ปิดส่วนถูกที่เว้นว่างตอน pin
        snap: 0, // มีค่าได้แค่ 0-1 or 0-100% ทำให้ scroll เป็นธรรมชาติมากขึ้น 
        //snap ex. เช่น scroll แล้วติดระหว่างกลาง snap จะทำให้ไปยังหน้าใดหน้าหนึ่งเเบบเต็มหน้า
        markers: true,
        //markers: true แสดงจุดเริ่มต้นและจุดสิ้นสุด
        toggleActions: 'none restart restart none'
        // toggleActions: 'เลื่อนลงมาเจอ เจอ->เลื่อนลงผ่าน เลื่อนขึ้นกลับมาเจอ เจอ->เลื่อนขึ้นผ่าน'
    },
    scale: 10,
    y: -100, // ระยะ y
    x: 100, // ระยะ x
    opacity: 0, // มองเห็น
  }).from("#subtitle", { // .from "#subtitle" (animate จาก function ข้างล่าง จาก -> #subtitle)
    scrollTrigger: {
        trigger: "#hero",
        start: "top top",
        end: "+=900",
        scrub: 1,
    },
    scale: 10,
    y: 100,
    opacity: 0,
    });
    gsap.fromTo('.hi', {/* (from ทำงาน) animation property */}, {/* (to ทำงาน) animation property */})

    // advance
    ScrollTrigger.create({ //สร้าง scrollTrigger เอง
        trigger: "#id",  // ตัวที่ต้องการ animate
        start: "top top",
        endTrigger: "#otherID", // จบ animate ที่ idนี้ (#otherID)
        end: "bottom 50%+=100px",
        onToggle: (self) => console.log("toggled, isActive:", self.isActive), // print Toggle ทำงานมั้ย T, F 
        onUpdate: (self) => {
          console.log(
            "progress:",
            self.progress.toFixed(3),
            "direction:",
            self.direction, // ตำแหน่ง
            "velocity",
            self.getVelocity()
          );
        },
      });