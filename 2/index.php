<?php
function table($id){
    $conn = mysqli_connect("localhost","root","root","sklad");
    $sql = 'SELECT * FROM storage s LEFT JOIN provider p ON s.provider_id=p.id LEFT JOIN fabricator f ON s.fabricator_id=f.id';
    $result = mysqli_query($conn, $sql);
    $sql_p = 'SELECT * FROM provider';
    $sql_f = 'SELECT * FROM fabricator';
    $result_p = mysqli_query($conn, $sql_p);
    $result_f = mysqli_query($conn, $sql_f);
    while($row = mysqli_fetch_assoc($result)){
        if($id!=$row['d_id']){
            echo '<tr>';
            echo '<td>'.$row['d_id'].'</td>';
            echo '<td>'.$row['d_name'].'</td>';
            echo '<td>'.$row['entrance'].'</td>';
            echo '<td>'.$row['f_name'].'</td>';
            echo '<td>'.$row['p_name'].'</td>';
            echo '<td>'.$row['price_euro'].'</td>';
            echo '<td>'.$row['price_rub'].'</td>';
            echo '<td><a href="?id='.$row['d_id'].'">изменить</a></td>';
            echo '</tr>';
        }else{
            echo '<form method="post">';
            echo '<tr>';
            echo '<td>'.$row['d_id'].'</td>';
            echo '<input type="hidden" name="id" value="'.$row['d_id'].'">';
            echo '<td><input type="text" name="d_name" value="'.$row['d_name'].'"></td>';
            echo '<td><input type="date" name="entrance" value="'.$row['entrance'].'"></td>';
            echo '<td><select name="f_name">';
            while($row_f = mysqli_fetch_assoc($result_f)){
                if($row_f['f_name']==$row['f_name']){
                    echo '<option selected value="'.$row_f['id'].'">'.$row_f['f_name'].'</option>';
                }else{
                    echo '<option value="'.$row_f['id'].'">'.$row_f['f_name'].'</option>';
                }
            }
            echo '</select></td>';
            echo '<td><select name="p_name">';
            while($row_p = mysqli_fetch_assoc($result_p)){
                if($row_p['p_name']==$row['p_name']){
                    echo '<option selected value="'.$row_p['id'].'">'.$row_p['p_name'].'</option>';
                }else{
                    echo '<option value="'.$row_p['id'].'">'.$row_p['p_name'].'</option>';
                }
            }
            echo '</select></td>';
            echo '<td><input type="text" name="price_euro" value="'.$row['price_euro'].'"></td>';
            echo '<td><input type="text" name="price_rub" value="'.$row['price_rub'].'"></td>';
            echo '<td><input type="submit" value="подтвердить"></td>';
            echo '</tr>';
            echo '</form>';
        }
    }
}
function update($dname,$entrance,$p_name,$f_name,$price_euro,$price_rub,$id){
    $conn = mysqli_connect("localhost","root","root","sklad");
    $sql = "UPDATE `storage` SET `d_name`='$dname',`entrance`='$entrance',`provider_id`='$p_name',`fabricator_id`='$f_name',`price_euro`='$price_euro',`price_rub`='$price_rub' WHERE d_id='$id'";
    mysqli_query($conn, $sql);
}
if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $dname = $_POST['d_name'];
    $entrance = $_POST['entrance'];
    $f_name = $_POST['f_name'];
    $p_name = $_POST['p_name'];
    $price_euro = $_POST['price_euro'];
    $price_rub = $_POST['price_rub'];
    update($dname,$entrance,$f_name,$p_name,$price_euro,$price_rub,$id);
    header("Location: index.php");
}
?>
<table border="1" cellpadding="5">
    <th>id</th><th>наименование</th><th>дата поставки</th><th>производитель</th><th>поставщик</th><th>цена закупки(в евро)</th><th>цена(в руб.)</th>
    <?php
    $id = $_GET['id'];
    table($id);
    ?>
</table>