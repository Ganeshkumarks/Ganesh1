<?php 
$query_result = false;
$error = $warning = array(); 
if (isset($_POST['submit'])) 
{  
if (!trim($_POST['book_title'])) 
{
$error = 'Book title is required';
}
if (!$error) {
$conn = @mysqli_connect('localhost', 'root', '', 'db_book'); 
if (!$conn) { 
$error[] = mysqli_connect_error($conn);
}
else {
$where = trim($_POST['book_title'])? 'book_title LIKE "%'.$_POST['book_title'].'%"': ''; 
$sql =  'SELECT * FROM book WHERE ' . $where;    
$result = mysqli_query ($conn, $sql);   
if (!$result) {
$error[] = mysqli_error($conn).'<br/><strong>SQL Query</strong>: ' . $sql; 
} 
else {
$num_rows = mysqli_num_rows($result);
if (!$num_rows) {
$warning[] = 'Data not found';
} 
else {
$query_result = true;  
}
}
} // 
} 
}?> 
<html> 
<head> 
<title>PHP dan FORM</title>
</head>
<body> 
<?php  

if ($error) {
echo '<div>Error: ' . join($error, ', ') . '</div>';  
}  
if ($warning) {
echo '<div>' . join($warning, ', ') . '</div>';
}  ?>
<form action="" method="post">
<div>
<label>Book Title</label>   
<input type="text" name="book_title" value="<?=@$_POST['book_title'] ?: ''?>"/>   </div>
<div><input type="submit" name="submit" value="Submit"/></div>
</form>
<?php  if (isset($_POST['submit'])) {
if ($query_result)    
{   
echo 'Found ' . $num_rows . ' records';
$thead = ' <tr>             
<th>No</th>  
<th>Book Title</th>
</tr>';
echo ' <table> <thead>' . $thead . '</thead>
<tbody>'; 
$no = 1;
while($row = mysqli_fetch_array($result)) {
echo '<tr> <td>' . $no . '</td>
<td>' . $row['book_title'] . '</td>
</tr> ';
$no++;
}   
echo 	'</tbody></table>';
}
}?> 
</div>
</body>
</html>