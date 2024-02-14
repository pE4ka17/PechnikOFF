<?php
function tables(){
    $conn = mysqli_connect("localhost","root","root","main");
    $sql = "SHOW TABLES";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_row($result)){
        echo '<tr><td><a href="?table='.$row[0].'">'.$row[0].'</a></td></tr>';
    }
}
function rows($tb){
    $conn = mysqli_connect("localhost","root","root","main");
    $sql = 'DESCRIBE '.$tb.'';
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_row($result)){
        echo '<th>'.$row[0].'</th>';
    }
    $sql_r = "SELECT * FROM $tb";
    $result_r = mysqli_query($conn,$sql_r);
    while($row = mysqli_fetch_row($result_r)){
        echo '<tr>';
        foreach($row as $key => $value){
            echo '<td>'.$value.'</td>';
        }
        echo '</tr>';
    }
}
?>
<table border="1" cellpadding="5">
    <?php 
    tables();
    ?>
</table>
<?php
if(!empty($_GET['table'])){
    $tb = $_GET['table'];?>
    <table border="1" cellpadding="5">
    <?php
        rows($tb);
    ?>
    </table>
    <?php
}
?>