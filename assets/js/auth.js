/**
 * Connects a user with an AJAX request to /app/api/users.php
 * 
 * @returns {undefined}
 */
function do_login(){
    document.getElementById("login").addEventListener('click', () => {
        
        // Get name and password from the form
        let name = document.getElementById("name").value;
        let pass = document.getElementById("pass").value;
  
        // Send them into a POST request to the API
        fetch("/app/api/users.php", {
            method: 'POST',
            body: JSON.stringify({ user: name, pass: pass })	
        })
        .then((resp) => {
            // Check the response
            resp.json().then((data) => {
                if(!data.resp) 
                    document.getElementById("invalid").classList.remove("d-none");
                else 
                    window.location.href = "/user/";
            })
        })
    })
}
  

/**
 * Register a user with an AJAX request to /app/api/users.php
 * 
 * @returns {undefined}
 */
function do_signup(){
    document.getElementById("signup-button").addEventListener('click', () => {
        // Get name, password and confirm password from the form
        let name = document.getElementById("name").value;
        let pass = document.getElementById("pass").value;
        let repass = document.getElementById("repass").value;
    
        // Send them into a PUT request to the API
        fetch("/app/api/users.php", {
            method: 'PUT',
            body: JSON.stringify({ user: name, pass: pass, repass: repass })	
        })
        // Check the response
        .then((resp) => {
            resp.json().then((data) => {
                if(data.resp === true) {
                    document.getElementById("signup").classList.remove("d-none");
                }
                else {

                    // Validation part were we define what is the error
                    // and display it to the user in an alert box
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