<?php

    session_start();

    require_once "../app/middleware/logged.php";
    
    $title = "Chatbox";
    require_once "../app/components/header.php";
    
    require_once "../app/includes/db.php";


    $messages = DB::fetch("SELECT * FROM chat", [], true);    
    $last = "";
?>
<script src="/assets/js/chat.js"></script>

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


