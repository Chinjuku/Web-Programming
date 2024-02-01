const   nav = document.querySelector(".nav"),
        toggle = document.querySelector(".toggle")
        imggg = document.querySelector(".imggg")
        clicktoshow = document.querySelector(".clicktoshow")
        askbox = document.querySelector(".askbox")

toggle.onclick = (e) => { nav.classList.toggle("close") };
clicktoshow.onclick = (e) => { askbox.classList.toggle("open") }

