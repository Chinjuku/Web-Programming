const pic1 = "1.png";
const pic2 = "2.png";
const pic3 = "3.png";
const pic4 = "4.png";

var count = 1
function swap() {
    let box = document.querySelector("p")
    let one = document.getElementById("1");
    let two = document.getElementById("2");
    let three = document.getElementById("3");
    let four = document.getElementById("4");
    box.style.opacity = 1
    if(count == 1) {
    // if (one.src.endsWith("1.png")) {
        one.src = pic3;
        two.src = pic1;
        three.src = pic4;
        four.src = pic2;
        box.style.color = "red"
        box.innerHTML = "Move 1"
        box.style.background = "white"
        count = 2
    }else if(count == 2) {
    // }else if (one.src.endsWith("3.png")) {
        one.src = pic4;
        two.src = pic3;
        three.src = pic2;
        four.src = pic1;
        box.style.color = "blue"
        box.innerHTML = "Move 2"
        box.style.background = "lightgreen"
        count = 3
    }else if(count == 3) {
    // }else if(one.src.endsWith("4.png")){
        one.src = pic2;
        two.src = pic4;
        three.src = pic1;
        four.src = pic3;
        box.style.color = "green"
        box.innerHTML = "Move 3"
        box.style.background = "lightblue"
        count = 4
    }else if (count == 4){
        one.src = pic1
        two.src = pic2
        three.src = pic3
        four.src = pic4
        box.style.opacity = 0
        count = 1
    }
    // document.getElementById("p1").innerHTML = count
}
