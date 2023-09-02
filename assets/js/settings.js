document.getElementById("delete").addEventListener('click', () => {
    let val = document.getElementById("pass").value;

    fetch("/app/api/users.php", {
        method: "DELETE",
        body: JSON.stringify({
            password: val
        })
    }).then((resp) => {
        if(resp.status === 401) {
            alert("Invalid password");
        }
        else if(resp.status === 200) {
            window.location.href = "/user/logout.php";
        }
    })
});