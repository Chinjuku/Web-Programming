// setAttributeNode, appendChild, removeChild
// call parent element and add child!! -> parentElement.appendChild("ตัวที่ยากใส่")
// Or you can append in value.body.appendChild HTML
function addValue() {
    let v1 = document.querySelector(".v1")
    let v2 = document.querySelector(".v2")
    let result = document.querySelector("#answer")
    //get parent Element
    let allmethod = document.getElementById("method")
    let ans = ""
    
    //create Child element p
    let ptext = document.createElement("p")
    //set value in html
    let method = "";
    if (v1.value === "" || v2.value === ""){
        ans = "-"
        method = "Your input isn't correct"
        allmethod.style.background = "pink"
    }
    else {
        ans = parseInt(v1.value) + parseInt(v2.value)
        method = v1.value + " + " + v2.value + " = " + ans;
        allmethod.style.background = "lightgreen"
    }
    //add value to child
    let textnode = document.createTextNode(method)
    ptext.appendChild(textnode)
    // add child to parent
    allmethod.appendChild(ptext)

    result.innerHTML = "<p>" + "Result : " + ans + "</p>";
    
}