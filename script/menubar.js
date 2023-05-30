const close = document.querySelector("#closemenu");
const checkBtn = document.querySelector("#checkbtn");
const navmenu = document.querySelector(".floatheader ul");

checkBtn.addEventListener('click', ()=>{    
    navmenu.style.transform = "translate3d(0, 0, 0)";
})

navmenu.addEventListener('click', ()=>{
    navmenu.style.transform = "translate3d(0, -100%, 0)";
})