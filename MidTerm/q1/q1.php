<?php
require_once('login.php');

if(isset($_GET['student_name'])){
    $stuedntName = $_GET['student_name'];
    $studentId = $_GET['student_id'];
    $faculty = $_GET['faculty'];
    $program = $_GET['program'];
    $date = $_GET['date'];
    $title1 = $_GET['book_1'];
    $author1 = $_GET['author_name_1'];
    $isbn1 = $_GET['isbn_1'];
    $title2 = $_GET['book_2'];
    $author2 = $_GET['author_name_2'];
    $isbn2 = $_GET['isbn_2'];
    $title3 = $_GET['book_3'];
    $author3 = $_GET['author_name_3'];
    $isbn3 = $_GET['isbn_3'];
    $title4 = $_GET['book_4'];
    $author4 = $_GET['author_name_4'];
    $isbn4 = $_GET['isbn_4'];
    $title5 = $_GET['book_5'];
    $author5 = $_GET['author_name_5'];
    $isbn5 = $_GET['isbn_5'];
    
    $query = "INSERT INTO reservation (
        studentName, studentId, faculty, program, date, 
        title1, author1, isbn1,
        title2, author2, isbn2,
        title3, author3, isbn3,
        title4, author4, isbn4,
        title5, author5, isbn5) 
    VALUES (
        '$stuedntName', '$studentId', '$faculty', '$program', '$date',
        '$title1', '$author1', '$isbn1',
        '$title2', '$author2', '$isbn2',
        '$title3', '$author3', '$isbn3',
        '$title4', '$author4', '$isbn4',
        '$title5', '$author5', '$isbn5'
    )";

    $result = $conn->query($query);
    if(!$result){
        die("Fatal Error");
    }
}
?>

<form action="" method="GET">
<table border="0">
<tr>
<td>Student Name</td>
<td><input type="text" name="student_name" id=""></td>
<td>Faculty</td>
<td><select name="faculty" id="">
<option value="Faculty of Business & Management">Faculty of Business & Management</option>
<option value="Faculty of Engineering & Information Technology">Faculty of Engineering & Information Technology</option>
<option value="Faculty of Humanities & Social Sciences">Faculty of Humanities & Social Sciences</option>
<option value="Faculty of Art & DesignFaculty of Chinese Medicine">Faculty of Art & DesignFaculty of Chinese Medicine</option>
<option value="Faculty of Chinese Medicine">Faculty of Chinese Medicine</option>
<option value="Faculty of Education & Psychology">Faculty of Education & Psychology</option>
<option value="School of Foundation Studies">School of Foundation Studies</option>
</select></td>
</tr>
<tr>
<td>Student ID</td>
<td>
<input type="text" name="student_id" id="">
</td>
<td>Date</td>
<td><input type="date" name="date" id=""></td>
</tr>
<tr>
<td>Program</td>
<td colspan="3">
<input type="radio" name="program" id="" value="foundation">Foundation
<input type="radio" name="program" id="" value="diploma">Diploma
<input type="radio" name="program" id="" value="degree">Degree
</td>
</tr>
<tr><td colspan="4"><br></td></tr>
<tr>
<td colspan="2">Title of Book</td>
<td>Author Name</td>
<td>ISBN</td>
</tr>
<tr><td colspan="2"><input type="text" name="book_1" id="" value="" size="50%" placeholder="1"></td><td><input type="text" name="author_name_1" id=""></td><td><input type="text" name="isbn_1" id=""></td></tr>
<tr><td colspan="2"><input type="text" name="book_2" id="" value="" size="50%" placeholder="2"></td><td><input type="text" name="author_name_2" id=""></td><td><input type="text" name="isbn_2" id=""></td></tr>
<tr><td colspan="2"><input type="text" name="book_3" id="" value="" size="50%" placeholder="3"></td><td><input type="text" name="author_name_3" id=""></td><td><input type="text" name="isbn_3" id=""></td></tr>
<tr><td colspan="2"><input type="text" name="book_4" id="" value="" size="50%" placeholder="4"></td><td><input type="text" name="author_name_4" id=""></td><td><input type="text" name="isbn_4" id=""></td></tr>
<tr><td colspan="2"><input type="text" name="book_5" id="" value="" size="50%" placeholder="5"></td><td><input type="text" name="author_name_5" id=""></td><td><input type="text" name="isbn_5" id=""></td></tr>
<tr><td colspan="4"><input type="submit" value="Submit"></td></tr>
</table>
</form>