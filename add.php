<?php
require_once("./entities/personnel.class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $MaNV = $_POST["MaNV"];
    $TenNV = $_POST["TenNV"];
    $Phai = $_POST["Phai"];
    $NoiSinh = $_POST["NoiSinh"];
    $MaPhong = $_POST["MaPhong"];
    $Luong = $_POST["Luong"]; 

    // Create a new Product object
    $personnel = new Personnel($MaNV, $TenNV, $Phai, $NoiSinh, $MaPhong, $Luong);

    // Save the product
    $result = $personnel->save();
    if ($result) {
        echo "Personnel added successfully!";
    } else {
        echo "Failed to add Personnel.";
    }
}
?>

<?php include_once("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Personnel</title>
</head>

<style>
    .container {
        width: 80%;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        max-width: 500px;
        margin: auto;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: calc(100% - 22px); /* Adjusted width for input elements */
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }

    textarea {
        height: 100px;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #4caf50;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

</style>

<body>
<div class="container">
    <h2>Add Personnel</h2>
    <form action="add.php" method="post">
        <label for="MaNV">Mã nhân viên:</label>
        <input type="text" id="MaNV" name="MaNV" required>

        <label for="TenNV">Tên nhân viên:</label>
        <input type="text" id="TenNV" name="TenNV" required>

        <label for="Phai">Phái:</label>
        <input type="text" id="Phai" name="Phai" required>

        <label for="NoiSinh">Nơi sinh:</label>
        <input type="text" id="NoiSinh" name="NoiSinh" required>

        <label for="MaPhong">Mã phòng:</label>
        <input type="text" id="MaPhong" name="MaPhong" required>

        <label for="Luong">Lương:</label>
        <input type="text" id="Luong" name="Luong">

        <input type="submit" value="Add Personnel">
    </form>
</div>
</body>
</html>



<?php include_once("footer.php"); ?>
