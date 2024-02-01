const countryThai = ["เลือกประเทศ" ,"ไทย", "เวียดนาม", "ลาว", "มาเลเซีย", "สิงคโปร์", "ฟิลิปปินส์", "เมียนมาร์", "กัมพูชา", "บรูไน"]
const countryEnglish = ["Choose Your Country","Thailand", "Vietnam", "Laos", "Malaysia", "Singapore", "Philippines", "Myanmar", "Cambodia", "Brunei"];
const box = document.getElementById("box")
const newselect = document.createElement("select")
const oldselect = document.createElement("select")
var count = 0
var click = true

//ตกแต่ง element ที่สร้างมาใน JS
newselect.style.padding = "5px"
oldselect.style.padding = "5px"
newselect.style.background = "lightblue"
oldselect.style.background = "lightblue"

for (ctry in countryThai) {
    let data = countryThai[ctry];
    let addIndex = document.createTextNode(data)
    var oldoption = document.createElement("option")
    //create node crateTextNode()
    oldoption.appendChild(addIndex)
    oldselect.appendChild(oldoption)
    box.appendChild(oldselect)
}

function changeCountry() {
    count++
    let fname = document.getElementById("fname")
    let lname = document.getElementById("lname")
    let button = document.getElementById("btn")
    let countries = document.getElementById("country")

    if (click === true) {
        changeClick(fname, "First name :")
        changeClick(lname, "Last name :")
        changeClick(button, "Change to Thai")
        changeClick(countries, "Country :")
        oldselect.remove()
        if(count === 1){
            //สร้าง select element
            selectEnglish()
        } else {
            //นำ select element กลับมา
            box.appendChild(newselect)
        }
        click = false
    }
    else {
        changeClick(fname, "ชื่อ :")
        changeClick(lname, "นามสกุล :")
        changeClick(button, "เปลี่ยนภาษา")
        changeClick(countries, "ประเทศ :")
        box.removeChild(newselect)
        box.appendChild(oldselect)
        click = true
    }
    console.log(count, click)
}

function changeClick(docu, value) {
    docu.innerHTML = value
}

function selectEnglish() {
    for (ctry in countryEnglish) {
        let newoption = document.createElement("option")
        var textnode = document.createTextNode(countryEnglish[ctry])
        newoption.appendChild(textnode)
        newselect.appendChild(newoption)
        box.appendChild(newselect)
    }
}
