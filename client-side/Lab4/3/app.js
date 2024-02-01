const fname = document.getElementById("fname")
const lname = document.getElementById("lname")
const id = document.getElementById("id")
const table = document.getElementById("table")
let num = 1

function addInput() {
    var tr = document.createElement("tr")
    tr.id = "iwannaremoveyou"
    if (id.value === "" || fname.value === "" || lname.value === "") {
        alert("กรอกข้อมูลให้ครบด้วยครับ")
    }
    else {
        let personalInfo = [num, id.value, fname.value, lname.value]
        num++
        for (i in personalInfo) {
            let td = document.createElement("td")
            let text = document.createTextNode(personalInfo[i])
            td.appendChild(text)
            tr.appendChild(td)
            table.appendChild(tr)
        }
        // personalInfo.map((i) => {
        //     let td = document.createElement("td")
        //     let text = document.createTextNode(i)
        //     td.appendChild(text)
        //     tr.appendChild(td)
        //     table.appendChild(tr)
        // }) 
    }
}

function removeInput() {
    // let removetr = document.getElementById("iwannaremoveyou")
    let lastRow = table.rows[table.rows.length - 1]; // Get the last row
    if (lastRow > 1) {
        lastRow.remove(); // Remove the last row
    } else {
        console.warn("No rows to remove.");
    }
    // table.removeChild(removetr)
    // removetr.remove()
}