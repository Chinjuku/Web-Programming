gsap.registerPlugin(ScrollTrigger);

const tl = gsap.timeline();

tl.to('.boxa', {opacity: 0, duration: 4})
  .from('.advantage', {
    x: 700,
    opacity: 0,
    duration: 5 })
  .from('.Box6', {
    x: -700,
    opacity: 0,
    duration: 5, })
  .from('.Start', {
    y: 200,
    duration: 1,
    opacity: 0 })
    
ScrollTrigger.create( {
    animation : tl,
    trigger: '.boxa',
    start: 'bottom 80%',
    // markers: true,
    scrub: 2,
    pin: true,
    pinSpacing: false,
})

gsap.to( '.logo' ,{
    scrollTrigger : {
        trigger: '.logo',
        start: 'top top',
        scrub : true,
    },
    scale: 5,
    opacity: 0,
    x: 200 
})
gsap.to( '.comment1' ,{
    scrollTrigger : {
        onEnter: () => {
            document.body.style.overflowX = 'hidden';
        },
        trigger: '.logo',
        start: 'top top',
        scrub : true,
    },
    scale: 5,
    opacity: 0,
    x: -200
})

gsap.to('.logo' , {
    rotate: 360, duration: 5, ease: 'linear', repeat: -1
});

// learning1.html
gsap.from('.Content1', {
    scrollTrigger : {
        trigger: '.Create1',
        start : 'top center',
        //start : 'จากboxที่เลือก จากหน้าจอ',
        //start : '20px 80%' สามารถใช้ pixel ของ box และ % จากหน้าจอได้
        //end : 'bottom center' จากboxที่เลือก จากหน้าจอ
        //end '+=500': สามารถใส่ += ต่า 100 px ได้
        // markers: true,
        //markers: true แสดงจุดเริ่มต้นและจุดสิ้นสุด
        // scrub: true, // scrub เพื่อย้อนภาพกลับเมื่อ scroll ถอยกลับ / สามารถใส่เป็นเลขเวลาเเทนได้ ex. scrub : 1
        // pin: true, // pin ปักหมุดตำแหน่งคาไว้ สามารถใส่ pin ที่ box ได้
        // pinSpacing: false, // ป้องกัน pin เว้น space ว่าง
        toggleActions: 'none restart restart none'
        // toggleActions: 'เลื่อนลงมาเจอ เจอ->เลื่อนลงผ่าน เลื่อนขึ้นกลับมาเจอ เจอ->เลื่อนขึ้นผ่าน'
    },
    opacity: 0,
    duration: -1,
})
gsap.to('.Content1', {
    scrollTrigger : {
        trigger: '.Create1',
        toggleActions: 'none play reverse play'
        // toggleActions: 'none restart restart restart'
        // toggleActions: 'เลื่อนลงมาเจอ เจอ->เลื่อนลงผ่าน เลื่อนขึ้นกลับมาเจอ เจอ->เลื่อนขึ้นผ่าน'
    },
    opacity: 0.25,
    duration: 0.2,
})
gsap.to('.Content2', {
    scrollTrigger : {
        trigger: '.Create2',
        toggleActions: 'play reverse play reverse'
    },
    opacity: 1,
    duration: 0.2,
})
gsap.to('.Content3', {
    scrollTrigger : {
        trigger: '.Create3',
        toggleActions: 'play reverse play reverse'
    },
    opacity: 1,
    duration: 0.2,
})
gsap.to('.Content4', {
    scrollTrigger : {
        trigger: '.Create4',
        toggleActions: 'play reverse play reverse'
    },
    opacity: 1,
    duration: 0.2,
})
gsap.to('.Content5', {
    scrollTrigger : {
        trigger: '.Create5',
        toggleActions: 'play none play reverse'
    },
    opacity: 1,
    duration: 0.2,
})

//ScrollingTo element
const scrollingTo = (event) => {
    const section = document.querySelector(`.${event}`);
    if (section) {
        window.scrollTo({
            top: section.offsetTop - 100,
            behavior: 'smooth'
        });
    }
};
//Opennav
var isOpen = false
const open = document.getElementById('itemees');
const navOpen = () => {
    if (isOpen === false) {
        show()
        isOpen = true
    }else {
        closing()
        isOpen = false
    }
};
const show = () => {
    open.style.opacity = 1
    open.style.transition = '300ms'
    open.style.height = '200px'
}
const closing = () => {
    open.style.opacity = 0
    open.style.transition = '300ms'
    open.style.height = '0px'
}