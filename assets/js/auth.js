function do_login(){
    document.getElementById("login").addEventListener('click', (event) => {
      let name = document.getElementById("name").value;
      let pass = document.getElementById("pass").value;
  
      fetch("/app/api/users.php", {
        method: 'POST',
        body: JSON.stringify({
          user: name,
          pass: pass
        })	
      }).then((resp) => {
        resp.json().then((data) => {
          if(!data.resp) {
            document.getElementById("invalid").classList.remove("d-none");
          } else {
            window.location.href = "/user/";
          } 
        })
      })
    })
  }
  
  function do_signup(){
    document.getElementById("signup-button").addEventListener('click', (event) => {
      let name = document.getElementById("name").value;
      let pass = document.getElementById("pass").value;
      let repass = document.getElementById("repass").value;
  
      fetch("/app/api/users.php", {
        method: 'PUT',
        body: JSON.stringify({
          user: name,
          pass: pass,
          repass: repass
        })	
      }).then((resp) => {
        resp.json().then((data) => {
          if(data.resp === true) {
            document.getElementById("signup").classList.remove("d-none");
          }
          else {
  
            let err = document.getElementById("invalid");
            err.classList.remove("d-none");
  
            if(data.resp === "repass") {
              err.innerText = "Passwords are not same";
            }
            else if(data.resp === "already") {
              err.innerText = "The username has already been taken";
            }
            else if(data.resp === "strange") {
              err.innerText = "Error in entered values";
            }
  
          }
          
        })
      })
    })
  }