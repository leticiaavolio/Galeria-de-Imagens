<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])){
    if($_FILES['image']['error'] == UPLOAD_ERR_OK){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //vERIFICA SE O ARQUIVO É UMA IMAGEM REAL

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "<h2>O arquivo ". basename($_FILES["image"]["name"]). " foi enviado com sucesso</h2>";
            }
            else {
                echo "<h2>Desculpe, houve um erro ao enviar o seu arquivo</h2>";
            }
        }
        else {
            echo "<h2>O arquivo não é uma imagem</h2>";
        }

    }
    else {
        //Mostra a mensagem de erro especifica
        echo "<h2>Erro no upload" . $_FILES['image']['error'] . "</h2>";
    }
}//eu retire o else do exemplo porque pra mim não fazia sentido, já que quando ele mandava a foto aparecia a mensagem dela não ter sido selecionada, agora quando o processo de mandar a imagem acaba aparece apenas o que está escrito no body da página.
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2" url="index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Upload de Imagem</title>
</head>
<body>
    <h2>Redirecionando para a galeria</h2>
</body>
</html>