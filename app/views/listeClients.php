<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des clients</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        
            <?php if(!empty($clients)){
                foreach($clients as $Client){ ?>
                <tr>
                    <td><?=$Client['id']?></td>
                    <td><?=$Client['name']?></td>
                    <td><?=$Client['phone']?></td>
                    <td><?=$Client['email']?></td>
                    <td>
                        <a href="<?=BASE_URL?>/supprimerClient/<?=$Client['id']?>">
                        <button>supp</button>
                        </a>
                        <a href="<?=BASE_URL?>/formModif/<?=$Client['id']?>">
                        <button>Modifier</button>
                        </a>
                    </td>
                </tr>
            <?php }
            }
            ?>
        
        
    </table>

    <a href="formClient">Ajouter un client</a>
</body>
</html>