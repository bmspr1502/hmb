
<?php
include 'DB.php';
if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
$query = "SELECT * FROM cart WHERE userid=$userid AND paid=0";
$result = $con->query($query);

if($result->num_rows > 0){

    $sum = 0;
    ?>
    <table class="table table-dark table-striped table-hover">
        <thead>
        <tr>
            <th>USERID</th>
            <th>FOODID</th>
            <th>NAME</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = $result->fetch_assoc()){
            $sum+=$row['price'];
            ?>
            <tr>
                <td><?php echo $row['userid'];?></td>
                <td><?php echo $row['foodid'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['price'];?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-success" onclick="paynow()"> Pay Rs.<?php echo $sum; ?></button>
    <?php
}
else{
    echo "NO DATA";
}
$con->close();
}else{
    echo "NOT VIEWABLE";
}