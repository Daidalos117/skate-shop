<?php
session_start();
include_once "db.inc";
if(isset($_SESSION["logged"]) and $_SESSION["logged"] != true){
    header("Location: index.html?error=spatneudaje");
    die();
}
if(isset($_GET["id"])){
    $id = mysqli_escape_string($connect,strip_tags($_GET["id"]));
}else{
    header("Location: items.php");
    die();
}

$message = "";
if(isset($_POST["submit"])){

    $sql = "UPDATE `tbl_items` SET ";
    foreach ($_POST as $key => $post){
        if($key == "submit" or $key == "tags") continue;
        $post = strip_tags(mysqli_escape_string($connect,$post));
        $sql .= " ".$key."='".$post."', ";
    }
    $sql = substr($sql,0,strlen($sql) - 2);
    $sql .= " WHERE id=".$id;

    mysqli_query($connect,$sql);

    //tagy
    $sql = "DELETE FROM `tbl_tags` WHERE `item_id`=".$id;
    mysqli_query($connect,$sql);
    $explodedTags = explode(" ",$_POST["tags"]);
    foreach ($explodedTags as $tag){
        $query = "INSERT INTO `tbl_tags`( `item_id`, `tag`) VALUES ({$id},'{$tag}'); ";
        mysqli_query($connect,$query);
    }

    $message = "<div class='message'>Příspěvek byl úspešně editován</div>";
}

$sql = "SELECT * FROM `tbl_items` WHERE id=".$id." LIMIT 1";
$query = mysqli_query($connect, $sql);
$item = mysqli_fetch_array($query);

$sqlT = "SELECT * FROM `tbl_tags` WHERE `item_id` ='".$id."'";
$queryT = mysqli_query($connect, $sqlT);
$tags = "";
$c = 0;
while($t = mysqli_fetch_array($queryT)) {
    $space = ($c == 0) ? "" : " ";
    $tags .= $space. $t["tag"];
    $c++;
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
        <h2>Editace zboží</h2>
        <form action="#" method="post" class="new-item">
            <div>
                <label for="">Název</label>
                <input type="text" name="name" value="<?= $item["name"] ?>">
            </div>
            <div>
                <label for="detail" >Popis</label>
                <textarea name="detail" cols="50" rows="15"><?= $item["detail"] ?></textarea>
            </div>
            <div>
                <label for="">Cena</label>
                <input type="text" name="price" value="<?= $item["price"] ?>"> Kč
            </div>
            <div>
                <label for="">Kategorie</label>
                <input type="text" name="category" value="<?= $item["category"] ?>">
            </div>
            <div>
                <label for="tags">Tagy</label>
                <input type="text" name="tags" value="<?= $tags ?>">
                <span class="help">Tagy oddělujte mezerou</span>
            </div>
            <div>
                <label for="">Odkaz na obrázek</label>
                <input type="text" name="picture" value="<?= $item["picture"] ?>">
            </div>
            <div>
                <input type="submit" name="submit" value="Editovat">
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