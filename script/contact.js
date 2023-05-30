const sendmessagebtn = document.getElementById("sendmessagebtn");
const emailc = document.getElementById("emailc");
const messagec = document.getElementById("messagec");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const errormessagec = document.getElementById("errormessagec");

function fetchCall(resource, callBack, method = "GET") {
  const url = "logic/";
  fetch(url + resource, {
    method: method,
  })
    .then((res) => res.json())
    .then((data) => {
      callBack(data);
    })
    .catch((err) => console.log(err));
}

const successmessagec = document.getElementById("successmessagec");

sendmessagebtn.addEventListener("click", () => {
  const fname = firstname.value;
  const lname = lastname.value;
  const email = emailc.value;
  const message = messagec.value;
  let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (fname == "" || lname == "" || email == "" || message == "") {
    errormessagec.textContent = "Please fill in all fields";
    errormessagec.style.display = "block";
  } else if (email.match(regex)) {
    $.ajax({
      url: "logic/contact.inc.php",
      type: "GET",
      data: { email: email, message: message, fname: fname, lname: lname },
      success: function (data) {
        const dat = JSON.parse(data);
        if (dat.msg == "success") {
          sendmessagebtn.disabled = true;
          errormessagec.style.display = "none";
          successmessagec.textContent = "Your message has been shared with us.";
          successmessagec.style.display = "block";
          setTimeout(() => {
            successmessagec.style.display = "none";
          }, 2000);
        } else {
          errormessagec.textContent = "Something went wrong, Please try again";
          errormessagec.style.display = "block";
        }
      },
    });
  } else if (!email.match(regex)) {
    errormessagec.textContent = "Please enter a valid email";
    errormessagec.style.display = "block";
  }
});
