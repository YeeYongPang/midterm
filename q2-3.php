<?php
require_once('login.php');
$studentId = $_GET['studentId'];
$isbn = $_GET['isbn'];

$query = "SELECT * FROM reserves WHERE isbn='$isbn' AND studentid='$studentId'";
$result = $conn->query($query);
if(!$result) die("Fatal Error");
if($result->num_rows > 0){
    echo "Sorry, the book is not available.";
}else{
    $query = "INSERT INTO reserves VALUES('$isbn','$studentId')";
    $result = $conn->query($query);
    if(!$result) die("Fatal Error");

    ?>

    <p>Dear student, you had reserved a book from our system. Below is the information for your perusal.</p>
    <table border="1">
    <tr>
    <th>Student Name</th>
    <th>Student ID</th>
    <th>Faculty</th>
    <th>Book Title</th>
    <th>Author</th>
    <th>ISBN</th>
    </tr>
    <?php
    $query = "select students.studentname, students.studentid, 
    faculties.facultyname, books.title, books.author, 
    books.isbn from students join faculties on 
    students.facultyid = faculties.facultyid join reserves on 
    students.studentid = reserves.studentid join books on 
    books.isbn = reserves.isbn";
    $result = $conn->query($query);
    if(!$result) die("Fatal Error");
    $rows = $result->num_rows;
    for($j = 0; $j < $rows; ++$j){
        $result->data_seek($j);
        $studentname = $result->fetch_assoc()['studentname'];
        $result->data_seek($j);
        $studentid = $result->fetch_assoc()['studentid'];
        $result->data_seek($j);
        $facultyname = $result->fetch_assoc()['facultyname'];
        $result->data_seek($j);
        $title = $result->fetch_assoc()['title'];
        $result->data_seek($j);
        $author = $result->fetch_assoc()['author'];
        $result->data_seek($j);
        $isbn = $result->fetch_assoc()['isbn']; 
        ?>
        <tr>
        <td><?php echo $studentname ?></td>
        <td><?php echo $studentid ?></td>
        <td><?php echo $facultyname ?></td>
        <td><?php echo $title ?></td>
        <td><?php echo $author ?></td>
        <td><?php echo $isbn?></td>
        </tr>
        <?php        
    }
    echo "</table>";
}
?>