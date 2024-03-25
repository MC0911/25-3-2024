<?php include_once("header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin nhân viên</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
</head>
<body>
    <h2>Danh sách nhân viên</h2>
    <a href="/PHP/Exam/add.php">Thêm nhân viên</a>
    <table>
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên</th>
            <th>Phái</th>
            <th>Nơi sinh</th>
            <th>Mã phòng ban</th>
            <th>Lương</th>
            <th>Action</th>
        </tr>
        <?php
            require_once("./config/db.class.php");
            require_once("./entities/personnel.class.php");

            // Phân trang
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $per_page = 5;
            $total_rows = Personnel::count_personnel();
            $total_pages = ceil($total_rows / $per_page);

            $employees = Personnel::list_personnel($page, $per_page);
            foreach ($employees as $employee) {
                echo "<tr>";
                echo "<td>" . $employee['MaNV'] . "</td>";
                echo "<td>" . $employee['TenNV'] . "</td>";
                echo "<td>";
                if ($employee['Phai'] == "NU") {
                    echo "<img src='./images/woman.png' alt='Woman' width='50'>";
                } else {
                    echo "<img src='./images/man.png' alt='Man' width='50'>";
                }
                echo "</td>";
                echo "<td>" . $employee['NoiSinh'] . "</td>";
                echo "<td>" . $employee['MaPhong'] . "</td>";
                echo "<td>" . $employee['Luong'] . "</td>";
                echo "<td>";
                echo "<button>Edit</button>";
                echo "<button>Delete</button>";
                echo "</td>";
                }
                
                echo "</tr>";
        ?>
    </table>

    <div class="pagination">
        <?php
        // Hiển thị các nút phân trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='index.php?page=$i'";
            if ($i == $current_page) echo " class='active'";
            echo ">$i</a>";
        }
        ?>
    </div>
</body>
</html>
