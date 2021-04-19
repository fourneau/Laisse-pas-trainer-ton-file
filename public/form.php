<?php

if($_SERVER['REQUEST_METHOD'] === "POST")

    { 
    
    $uploadDir = 'public/uploads/';

    $uploadFile = $uploadDir . uniqid('profil') . "." .$extension;

    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

    $extensions_ok = ['jpg','jpeg','png'];

    $maxFileSize = 1000000;
    

     if( (!in_array($extension, $extensions_ok )))
        {
            $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
        }

    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
        {
            $errors[] = "Votre fichier doit faire moins de 1M !";
        }

    if (empty($errors))
        {
             move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);

        }

}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>profil d'homer</title>
    </head>

<body>
    <h1> Choisi ta photo de Profil </h1>

    <form method="post" enctype="multipart/form-data">

        <label for="imageUpload">Upload a profile image : </label></br>    
        <input type="file" name="avatar" id="imageUpload" /></br>
        <button name="send">Send</button>
    </form></br>
    
    <h2> Voici ta photo de Profil Homer. </h2>
    <img  src="<?php if(isset($uploadFile)){ echo $uploadFile;} ?>" alt="Homer">

</body>
</html> 

