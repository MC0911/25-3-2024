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
    </style>
</head>
<body>
    <h2>Danh sách nhân viên</h2>
    <table>
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên</th>
            <th>Phái</th>
            <th>Nơi sinh</th>
            <th>Mã phòng ban</th>
            <th>Lương</th>
        <?php 
            // Kiểm tra xem phiên đã được bắt đầu chưa trước khi gọi session_start()
            if(session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            require_once("./config/db.class.php");
            require_once("./entities/user.class.php");

            // Kiểm tra xem người dùng đã đăng nhập chưa và $_SESSION['user'] không phải là boolean false
            if (isset($_SESSION['user']) && !is_bool($_SESSION['user'])) {
                // Kiểm tra xem người dùng có thuộc tính 'role' không
                if (property_exists($_SESSION['user'], 'role')) {
                    // Kiểm tra xem người dùng có quyền là "admin" hay không
                    if ($_SESSION['user']->role === 'admin') {
                        // Hiển thị cột "Action" cho quản trị viên
                        echo '<th>Action</th>';
                    }
                }
            }
        ?>
        </tr>
        <?php
            require_once("./config/db.class.php");
            require_once("./entities/personnel.class.php");

            $employees = Personnel::list_personnel();
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
                // Nếu là admin, hiển thị nút Action
                if(isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    if($user instanceof User && $user->role === 'admin') {
                        echo "<td>";
                        echo "<button>Edit</button>";
                        echo "<button>Delete</button>";
                        echo "</td>";
                    }
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>

<?php include_once("footer.php"); ?>
