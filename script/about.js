const aboutbtnemail = document.getElementById("aboutbtnemail");
const aboutnewsletter = document.getElementById("aboutnewsletter");
const erroraboutnews = document.getElementById("erroraboutnews");
const successaboutnews = document.getElementById("successaboutnews");

function fetchCall(resource, callBack, method='GET'){
    const url = "logic/"
    fetch(url + resource, {
        method: method,
    })
    .then(res => res.json())
    .then(data =>{
        callBack(data);
    })
    .catch((err)=>console.log(err));
}

aboutbtnemail.addEventListener('click', () => {
    const email = aboutnewsletter.value;
    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email == ''){
        erroraboutnews.textContent = "Please fill in your email";
        erroraboutnews.style.display = "block";
    }else if(email.match(regex)){
        fetchCall(`newsletter.inc.php?email=${email}`, responseMsg);
        function responseMsg(data){
            if(data.msg == "success"){
                erroraboutnews.style.display = "none";
                successaboutnews.textContent = "You have been subscribed!";
                successaboutnews.style.display = "block";
                setTimeout(()=>{
                    successaboutnews.style.display = "none";
                }, 2000)
            }else{
                erroraboutnews.textContent = "Something went wrong, Please try again";
                erroraboutnews.style.display = "block";
            }
        }
    }else if(!email.match(regex)){
        erroraboutnews.textContent = "Please add a valid email";
        erroraboutnews.style.display = "block";
    }
})