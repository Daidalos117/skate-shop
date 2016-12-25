<?php
session_start();
include_once "db.inc";
if(!isset($_SESSION["logged"]) and $_SESSION["logged"] != true){
    header("Location: index.html?error=spatneudaje");
    die();
}
$message = "";
if(isset($_POST["submit"])){

    foreach ($_POST as $key=> $post){
        $_POST[$key] = mysqli_escape_string($connect,$post);
        $_POST[$key] = strip_tags($post);
    }

    $query = "INSERT INTO `tbl_items`(`name`, `detail`, `price`, `category`, `picture`, `added`) 
VALUES ('{$_POST['name']}','{$_POST['detail']}', '{$_POST['price']}', '{$_POST['category']}','{$_POST['picture']}', NOW() ) ";
    mysqli_query($connect,$query);

    $itemId = mysqli_insert_id($connect);

    $explodedTags = explode(" ",$_POST["tags"]);
    foreach ($explodedTags as $tag){
        $query = "INSERT INTO `tbl_tags`( `item_id`, `tag`) VALUES ({$itemId},'{$tag}'); ";
        mysqli_query($connect,$query);
    }


    $message = "<div class='message'>Příspěvek byl úspešně přidán</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Obchod</title>
    <link href="../css.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <header>
        <a href="../index.php">
            <img src="../skateboard.svg" class="logo">
            <h1>Štěpáns shop</h1>
        </a>
    </header>
    <div class="left-menu">
        <ul>
            <li><a href="new.php" >Přidat nové zboží</a></li>
            <li><a href="items.php" >Editovat stávající</a></li>
            <li><a href="logout.php" >Odhlásit</a></li>
        </ul>
    </div>
    <div class="container">
        <?= $message ?>
        <h2>Nové zboží</h2>
        <form action="#" method="post" class="new-item">
        <div>
            <label for="">Název</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="detail" >Popis</label>
            <textarea name="detail" cols="50" rows="15"></textarea>
        </div>
        <div>
            <label for="price">Cena</label>
            <input type="text" name="price"> Kč
        </div>
        <div>
            <label for="category">Kategorie</label>
            <input type="text" name="category">
        </div>
        <div>
            <label for="tags">Tagy</label>
            <input type="text" name="tags">
            <span class="help">Tagy oddělujte mezerou</span>
        </div>
        <div>
            <label for="picture">Odkaz na obrázek</label>
            <input type="text" name="picture">
        </div>

        <div>
            <input type="submit" name="submit" value="Uložit">
        </div>
        </form>
    </div>
    <footer>
        <p>
            Vytvořeno Štěpánem Faměrou
        </p>
    </footer>
</div>
</body>
</html>