<?php
include 'db_connect.php';
$query = $conn->query("SELECT b.*, (s.price * b.qty) as amount, u.name
                       FROM booked b 
                       INNER JOIN schedule_list s ON s.id = b.schedule_id 
                       INNER JOIN users u ON u.id = b.user_id
                       ORDER BY DATE(b.date_updated) DESC ");
$data = array();
while($row = $query->fetch_assoc()){
	$data[] = $row;
}
echo json_encode($data);

?>