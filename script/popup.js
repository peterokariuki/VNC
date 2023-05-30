const popupnewslettersub = document.getElementById("popupnewslettersub");
const popupemailinput = document.getElementById("popupemailinput");
const errorpopup = document.getElementById('errorpopup')
const successpopup = document.getElementById('successpopup')
const newsletterpopup = document.getElementById("newsletter-popup");


popupnewslettersub.addEventListener('click', ()=>{
    const email = popupemailinput.value;
    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email == ''){
        errorpopup.textContent = "Please add your email"
        errorpopup.style.display = "block"
    }else if(email.match(regex)){
        fetchCall(`newsletter.inc.php?email=${email}`, respondData);
        function respondData(data){
            if(data.msg == 'success'){
                popupnewslettersub.disabled = true;
                errorpopup.style.display = "none";
                successpopup.textContent = "You are Subscribed!";
                successpopup.style.display = "block";
                setTimeout(() => {
                    successpopup.style.display = "none";
                    newsletterpopup.style.display = "none";

                }, 1500);      
            }else if(data.msg == 'error'){
                errorpopup.textContent = "Something went wrong, try again";
                errorpopup.style.display = "block";
            }
        }
    }else if(!email.match(regex)){
        errorpopup.textContent = "Please enter a valid email";
        errorpopup.style.display = "block";
    }
})