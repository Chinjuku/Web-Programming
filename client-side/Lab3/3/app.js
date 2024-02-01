var box1 = document.getElementById("1")
var box2 = document.getElementById("2")
var box3 = document.getElementById("3")
var box4 = document.getElementById("4")
var box5 = document.getElementById("5")

var isOpen = false
function toggleView() {
    if (isOpen === false) {
        show()
        isOpen = true
    }else {
        closing()
        isOpen = false
    }
    console.log(isOpen)
}


function show() {
    style(box1, "2s", "90%", "lightgreen")
    style(box2, "3s", "50%", "lightblue")
    style(box3, "1s", "41%", "lightpink")
    style(box4, "5s", "29%", "yellow")
    style(box5, "4s", "77%", "lightgray")
}

function closing(){
    style(box1, "3s", "10%", "green")
    style(box2, "2s", "10%", "blue")
    style(box3, "5s", "10%", "pink")
    style(box4, "1s", "10%", "orange")
    style(box5, "2s", "10%", "gray")
}

function style(box, time, width, bg) {
    box.style.transition = time
    box.style.width = `${width}`
    box.style.background = `${bg}`
}
function pureIncrement(count){
    if(count != 4) return count + 1
    else return count + 2
}
console.log(pureIncrement(0))