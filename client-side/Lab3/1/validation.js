const id = document.getElementById("idPeople");
const prefix = document.getElementById("prefix");
const firstname = document.getElementById("firstName")
const lastname = document.getElementById("lastName")
const address = document.getElementById("address")
const distinct = document.getElementById("distinct")
const subdistinct = document.getElementById("subdistinct")
const province = document.getElementById("province")
const passcode = document.getElementById("passcode")

const idMessage = document.getElementById("idspan")
const fnMessage = document.getElementById("fnspan")
const lnMessage = document.getElementById("lnspan")
const adMessage = document.getElementById("adspan")
const dtMessage = document.getElementById("dtspan")
const sdtMessage = document.getElementById("sdtspan")
const prMessage = document.getElementById("prspan")
const pcMessage = document.getElementById("pcspan")
const pfMessage = document.getElementById("pfspan")
const success = document.getElementById("success")

function validateForm(){
    let isValid = true;
    innerHTML(idMessage)
    innerHTML(pfMessage)
    innerHTML(fnMessage)
    innerHTML(lnMessage)
    innerHTML(adMessage)
    innerHTML( dtMessage)
    innerHTML(sdtMessage)
    innerHTML( prMessage)
    innerHTML( pcMessage)
    let numberValue = parseInt(id, 13)
    if(id.value.length !== 13 || typeof numberValue !== "number") {
        idMessage.innerHTML = "กรอกเลขบัตรประชาชนไม่ถูกต้อง"
        isValid = false;
    }
    if (prefix.value === "") {
        pfMessage.innerHTML = "กรุณาเลือกจังหวัด";
        isValid = false;
    }
    if(firstname.value.length < 2 || firstname.value.length > 20){
        fnMessage.innerHTML = "กรอกชื่อจริงไม่ถูกต้อง"
        isValid = false;
    }
    if(lastname.value.length < 2 || lastname.value.length > 30){
        lnMessage.innerHTML = "กรอกนามสกุลไม่ถูกต้อง"
        isValid = false;
    }
    if (address.value.length < 15) {
        adMessage.innerHTML = "กรอกที่อยู่ไม่ถูกต้อง";
        isValid = false;
    }
    if (distinct.value.length < 2) {
        dtMessage.innerHTML = "กรอกตำบลไม่ถูกต้อง";
        isValid = false;
    }
    if (subdistinct.value.length < 2) {
        sdtMessage.innerHTML = "กรอกอำเภอไม่ถูกต้อง";
        isValid = false
    }
    if (province.value === "") {
        prMessage.innerHTML = "กรุณาเลือกจังหวัด";
        isValid = false;
    }
    if (passcode.value.length !== 5) {
        pcMessage.innerHTML = "กรอกรหัสไปรษณีย์ไม่ถูกต้อง";
        isValid = false;
    }
    if(isValid === true){
        success.style.color = "green"
        success.style.opacity = 1
        success.innerHTML = "ส่งแบบฟอร์มสำเร็จ!"
        isValid = false;
    }
    else{
        success.style.opacity = 0
    }
    
    return isValid;
    
}
function innerHTML(value) {
    value.innerHTML = ""
}
