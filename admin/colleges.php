<div class="container">
    <?php $q = mysqli_query($db, "SELECT * FROM collegeuniversity"); 
    
    // echo $row['Name'];
    
    ?>

    <div class="container">
        <div class="container h1">
            Registered Institutions
        </div>
        <table class="table">
            <tr>
                <th>NO#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        <?php while($row =mysqli_fetch_array($q)){ ?>
            <tr class="tr">
                <td><?php echo $row['CollegeUniversityID'] ?></td>
                <td><?php echo $row['Name'] ?></td>
                <td>
                    <a href="super.php?op=editCollege&id=<?= $row['CollegeUniversityID'];?>" class="btn btn-primary">Edit</a>
                    <a href="super.php?op=deleteCollege&id=<?= $row['CollegeUniversityID'];?>" class="btn btn-danger">Delete</a>
                </td>
        </tr>
        <?php } ?>
        </table>
    </div>
</div>