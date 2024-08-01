<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])){
    if($_FILES['image']['error'] == UPLOAD_ERR_OK){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //vERIFICA SE O ARQUIVO É UMA IMAGEM REAL

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (moveuploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "O arquivo ". basename($_FILES["image"]["name"]). " foi enviado com sucesso";
            }
            else {
                echo "Desculpe, houve um erro ao enviar o seu arquivo";
            }
        }
        else {
            echo "O arquivo não é uma imagem";
        }

    }
    else {
        //Mostra a mensagem de erro especifica
        echo "Erro no upload" . $_FILES['image']['error'];
    }
}
else{
    echo "Nenhuma arquivo enviado.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2" url="index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
</head>
<body>
    Redirecionando para a galeria
</body>
</html>