<?php
require_once('login.php');

$title = $_GET['title'];
$author = $_GET['author'];
$isbn = $_GET['isbn'];

$query = "SELECT * FROM books WHERE title='$title' OR author='$author' OR isbn='$isbn'";
$result = $conn->query($query);
if(!$result) die("Fatal Error");
$rows = $result->num_rows;

?>
<form action="q2-3.php" method="GET">
<table border="1" style="text-align: left;">
<tr>
<th>Title</th>
<th>Author</th>
<th>ISBN</th>
<th>Status</th>
</tr>

<?php
    for($j = 0; $j < $rows; ++$j){
        $result->data_seek($j);
        $title = $result->fetch_assoc()['title'];
        $result->data_seek($j);
        $author = $result->fetch_assoc()['author'];
        $result->data_seek($j);
        $isbn = $result->fetch_assoc()['isbn'];
        echo "<tr><td>$title</td>";
        echo "<td>$author</td>";
        echo "<td>$isbn</td>";
        $query = "SELECT * FROM reserves WHERE isbn='$isbn'";
        $result_reserve = $conn->query($query);
        if(!$result_reserve) die("Fatal Error");
        echo ($result_reserve->num_rows > 0) ? '<td>No Available</td></tr>' : '<td>Available</td></tr>';
        // if($result_reserve->num_rows > 0){
        //     echo '<td>No Available</td></tr>';
        // }else{
        //     echo '<td>Available</td></tr>';
        // }
    }
?>
</table>
<p>Please enter your student ID to make the book reservation</p>
<input type="hidden" name="isbn" value="<?php echo $isbn; ?>">
<input type="text" name="studentId" id="">
<input type="submit" value="Apply Reservation">
</form>

