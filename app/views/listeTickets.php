<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des tickets</h1>
    <table>
        <tr>
            <th>Ref</th>
            <th>Sujet</th>
            <th>Client</th>
            <th>Email Client</th>
            <th>Message</th>
            <th>Status</th>
        </tr>
        <?php 
        if(!empty($tickets)){
            foreach ($tickets as $ticket) : ?>
                <tr>
                    <td><?php echo $ticket['ref']; ?></td>
                    <td><?php echo $ticket['subject']; ?></td>
                    <td><?php echo $ticket['client_name']; ?></td>
                    <td><?php echo $ticket['client_email']; ?></td>
                    <td><?php echo $ticket['message']; ?></td>
                    <td><?php echo $ticket['status_label']; ?></td>
                </tr>
            <?php endforeach;
        }
        ?>
    </table>
</body>
</html>