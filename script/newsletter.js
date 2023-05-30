const newletterfemail = document.getElementById('newletterfemail');
const sendemailbtn = document.getElementById("send-email-btn");
const errornewsletter = document.getElementById("errornewsletter");
const successnewsletter = document.getElementById("successnewsletter");

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

sendemailbtn.addEventListener('click', ()=>{
    const email = newletterfemail.value;
    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email == ''){
        errornewsletter.textContent = "Please add your email"
        errornewsletter.style.display = "block"
    }else if(email.match(regex)){
        fetchCall(`newsletter.inc.php?email=${email}`, respondData);
        function respondData(data){
            if(data.msg == 'success'){
                sendemailbtn.setAttribute('disabled' , true);                
                errornewsletter.style.display = "none";
                successnewsletter.textContent = "You are Subscribed!";
                successnewsletter.style.display = "block";
                setTimeout(() => {
                    successnewsletter.style.display = "none"
                }, 2500);      
            }else if(data.msg == 'error'){
                errornewsletter.textContent = "Something went wrong, try again";
                errornewsletter.style.display = "block";
            }
        }
    }else if(!email.match(regex)){
        errornewsletter.textContent = "Please enter a valid email";
        errornewsletter.style.display = "block";
    }
})