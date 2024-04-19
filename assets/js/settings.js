// Delete a user account
document.getElementById("delete").addEventListener('click', () => {
    // Get the password in the form
    let val = document.getElementById("pass").value;

    // Send it to the API
    fetch("/app/api/users.php", {
        method: "DELETE",
        body: JSON.stringify({ password: val })
    }).then((resp) => {
        // Validate the response
        if(resp.status === 401) {
            alert("Invalid password");
        }
        else if(resp.status === 200) {
            window.location.href = "/user/logout.php";
        }
    })
});