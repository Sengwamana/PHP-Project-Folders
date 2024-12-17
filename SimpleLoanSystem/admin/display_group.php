<?php
// Pagination settings
$rec_limit = 10;
$pagi = isset($_GET['pagi']) ? intval($_GET['pagi']) : 0;
$offset = $pagi * $rec_limit;

// Count total records
$sql_count = "SELECT COUNT(group_id) AS total FROM `groups`";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$rec_count = $row_count['total'];
$left_rec = $rec_count - ($pagi * $rec_limit);

// Fetch data with JOINs
$sql = "
    SELECT 
        g.*, 
        r.region_name, 
        d.district_name, 
        di.division_name, 
        w.ward_name, 
        v.village_name
    FROM `groups` g
    LEFT JOIN `region` r ON g.region = r.region_id
    LEFT JOIN `district` d ON g.district = d.district_id
    LEFT JOIN `division` di ON g.division = di.division_id
    LEFT JOIN `ward` w ON g.ward = w.ward_id
    LEFT JOIN `village` v ON g.village = v.village_id
    LIMIT ?, ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $rec_limit);
$stmt->execute();
$result = $stmt->get_result();

// Display groups
if ($result->num_rows > 0) {
    echo "<h2>All Groups</h2>";
    echo "<table class='table table-bordered table-hover table-striped'>
        <tr class='active'>
            <th>#</th><th>Name</th><th>Region</th><th>District</th>
            <th>Division</th><th>Ward</th><th>Village</th><th>Reg No</th>
            <th>Activity</th><th>Category</th><th>Total Members</th>
            <th>Leader</th><th>Loan Info</th><th>Capital</th><th>Action</th>
        </tr>";

    $inc = 1 + $offset;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$inc}</td>
            <td>{$row['group_name']}</td>
            <td>{$row['region_name']}</td>
            <td>{$row['district_name']}</td>
            <td>{$row['division_name']}</td>
            <td>{$row['ward_name']}</td>
            <td>{$row['village_name']}</td>
            <td>{$row['registration_number']}</td>
            <td>{$row['group_activity']}</td>
            <td>{$row['group_category']}</td>
            <td>{$row['group_total_members']}</td>
            <td>{$row['group_leader']}</td>
            <td>{$row['loan_information']}</td>
            <td>$" . number_format($row['group_capital'], 2) . "</td>
            <td><a href='javascript:DeleteGrop({$row['group_id']})' style='color:Red'>
                <span class='glyphicon glyphicon-trash'></span></a></td>
        </tr>";
        $inc++;
    }
    echo "</table>";
} else {
    echo "<h2 style='color:red'>No Groups Found!</h2>";
    echo "<a style='text-decoration:underline' href='index.php?page=add_group'>Add New Group?</a>";
}

// Pagination links
echo "<div class='pagination'>";
if ($pagi > 0) {
    $last = $pagi - 1;
    echo "<a href='index.php?page=display_group&pagi=$last'>Last 10 Records</a> | ";
}
if ($left_rec > 0) {
    $next = $pagi + 1;
    echo "<a href='index.php?page=display_group&pagi=$next'>Next 10 Records</a>";
}
echo "</div>";
?>
<script>
function DeleteGrop(id) {
    if (confirm("Do you want to delete this Group?")) {
        window.location.href = "delete_group.php?id=" + id;
    }
}
</script>
