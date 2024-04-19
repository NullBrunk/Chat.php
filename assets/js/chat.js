/**
 * Toggle the edit button and delete button by clicking on the 3 dots
 * 
 * @param {number} id    The id of the element to toggle
 */
function toggle(id) {
    document.getElementById("control-" + id).classList.toggle("d-none");
}

/**
 * Delete a message using an AJAX request
 * 
 * @param {number} id       The id of the message to delete
 */
function delete_message(id) {
    fetch("/app/api/chat.php?id=" + id, {
        method: "DELETE"
    }).then((r) => {
        if(r.ok)
            document.getElementById(id).remove();
    })
}



/**
 * Edit a message using an AJAX request
 * 
 * @param {number} id       The id of the message to delete
 */
function edit_message(id) {
    let elem = document.getElementById("msg-" + id)

    // Create a temporary form and display it instead of the base message
    elem.innerHTML = `
        <input id="update-${id}" style="width: 50vw; display: inline !important;" type="text" class="form form-control rounded" value="${elem.innerHTML.trim()}">
        <button id="button-${id}" type="submit" class="btn btn-primary rounded"><i class="bi bi-send text-white"></i></button>
    `

    // If the user clicked on the "edit" button
    document.getElementById("button-" + id).addEventListener("click", () => {
        // Get the new message from the temporary form
        val = document.getElementById("update-" + id).value;
        
        // Send it to the API
        fetch("/app/api/chat.php", {
            method: "PUT",
            body: JSON.stringify({ id: id, value: val })
        }).then((r) => {
            if(r.ok)
                elem.innerHTML = val;
        });
    });
}
