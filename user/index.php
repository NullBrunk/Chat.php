<?php

    session_start();

    require_once "../app/middleware/logged.php";
    
    $title = "Chatbox";
    require_once "../app/components/header.php";
    
    require_once "../app/includes/db.php";


    $messages = DB::fetch("SELECT * FROM chat", [], true);    
    $last = "";
?>

<script>
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
            val = document.getElementById("button-" + id).value;
            
            elem.innerHTML = val;
            
            fetch("/app/api/chat.php", {
                method: PUT,
                body: JSON.stringify({
                        id: id,
                        value: val
                    })
                });
        });


    }
</script>

<main class="chat">
    <fieldset id="chat" class="thechat"> 

        <?php foreach($messages as $msg): ?>

            <?php $id = $msg["id"]; ?>

            <?php if($last !== $msg["author"]): ?>
                <div class="header fw-600">
                    <img src="https://ui-avatars.com/api/?rounded=true&bold=true&background=random&name=<?= $msg["author"] ?>" height="32"/>
                    <span class="px-2"><?= ucfirst($msg["author"]) ?></span> 
                </div>
            <?php endif; ?>

            <div id="<?= $id ?>">
                <div class="msgs bulle <?php if($_SESSION['username'] === $msg['author']): ?> me <?php endif; ?>" id="msg-<?= $id ?>">
                    <?= $msg["msg"] ?>
                </div> 
                <?php if($_SESSION["username"] === $msg["author"]): ?>
                    <div class="d-inline-block">
                        <button class="control" onclick="toggle(<?= $id ?>)">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>

                    </div>
                    <div id="control-<?= $id ?>" class="d-inline-block d-none">
                        <i class="bi bi-pencil-square btn btn-purple text-white" onclick="edit_message(<?= $id ?>)"></i>
                        <i class="bi bi-trash btn btn-danger text-white" onclick="delete_message(<?= $id ?>)"></i>
                    </div>
                <?php endif; ?>
            </div>
                
            <?php $last = $msg["author"]; ?>     
        <?php endforeach; ?>
              
              
    </fieldset>

    <form method="post" action="/app/api/chat.php">
        <p  class="chat-content d-flex justify-content-between">
            <input type="text" name="text" class="chatmenu" placeholder="Send a message" autofocus>
            <button style="margin-right: 6px" class="send-msg btn-purple" type="submit"><i class="bi bi-send-fill"></i></button>
        </p> 
    </form>

</main>


<script>
    var chat = document.getElementById("chat");
    chat.scrollTop = chat.scrollHeight; // Défilement vers le bas
</script>

<?php require_once "../app/components/footer.php"; ?>


