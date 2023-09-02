function toggle(id) {
    document.getElementById("control-" + id).classList.toggle("d-none");
}

function delete_message(id) {
    document.getElementById(id).remove();
    fetch("/app/api/chat.php?id=" + id, {
        method: "DELETE"
    });
}

function edit_message(id) {
    let elem = document.getElementById("msg-" + id)

    elem.innerHTML = `
        <form>
            <input id="update-${id}" style="width: 50vw; display: inline !important;" type="text" class="form form-control rounded" value="${elem.innerHTML.trim()}">
            <button id="button-${id}" class="btn btn-primary rounded"><i class="bi bi-send text-white"></i></button>
        </form>
    `

    document.getElementById("button-" + id).addEventListener("click", () => {
        val = document.getElementById("update-" + id).value;
        
        elem.innerHTML = val;
        
        fetch("/app/api/chat.php", {
            method: "PUT",
            body: JSON.stringify({
                    id: id,
                    value: val
                })
            });
    });
}
