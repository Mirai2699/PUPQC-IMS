<html>

<?php
include('../../db.php');

$query = "SELECT * FROM ims_r_medicinal_stock WHERE Med_Category= '".$_POST["Med_Category"]."'";

$results = mysqli_query($connection, $query) or die("Bad Query: $sql");
?>
<option>Select Item</option>
<?php
	while($row = mysqli_fetch_assoc($results))
    {
        $item = $row['Med_Name'];
		?>
		<option value="<?php echo $item ?>"><?php echo "$item"; ?></option>
		<?php
		?>
	}
?>
</html>