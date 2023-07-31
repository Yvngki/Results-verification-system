<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>


    <table class="table">
        <tr><h4>Verifications</h4></tr>
        
        <tr>
            <th>StudentID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Verification Date</th>
            <th>Status</th>
        </tr>
        <tr>
            <?php
                echo '
                <td>'.$row['StudentID'].'</td>
                ';
            ?>
        </tr>
</table>
</body>
</html>