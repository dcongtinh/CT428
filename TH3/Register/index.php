<?php
include '../../session_start.php';
if (isset($_SESSION['tendangnhap'])) {
    header("Location: ../Profile");
}

function set_error($param)
{
    if (isset($_SESSION['error_' . $param])) {
        $error = $_SESSION['error_' . $param];
        echo "<p class='error'>$error</p>";
        unset($_SESSION['error_' . $param]);
        return;
    }
    echo '';
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./style.css" />
    <title>Đăng ký</title>
</head>

<body>
    <div class="container">
        <h3>Đăng ký tài khoản mới</h3>
        <p>
            Vui lòng điền đầy đủ thông tin bên dưới để đăng ký tài khoản mới
        </p>
        <form class="form-wrapper" enctype="multipart/form-data" method="POST" action="register.php">
            <table>
                <tr>
                    <th>Tên đăng nhập</th>
                    <td>
                        <input type="text" name="tendangnhap" required />
                        <?php set_error('tendangnhap') ?>
                    </td>
                </tr>
                <tr>
                    <th>Mật khẩu</th>
                    <td>
                        <input type="password" name="matkhau" required />
                        <?php set_error('matkhau') ?>
                    </td>
                </tr>
                <tr>
                    <th>Gõ lại mật khẩu</th>
                    <td>
                        <input type="password" name="matkhau2" required />
                        <?php set_error('matkhau2') ?>
                    </td>
                </tr>
                <tr>
                    <th>Hình đại diện</th>
                    <td>
                        <input id="file" type="file" name="hinhanh" required />
                    </td>
                </tr>
                <tr>
                    <th>Giới tính</th>
                    <td>
                        <input type="radio" name="gioitinh" value="Nam" checked />Nam
                        <input type="radio" name="gioitinh" value="Nữ" />Nữ
                        <input type="radio" name="gioitinh" value="Khác" />Khác
                    </td>
                </tr>
                <tr>
                    <th>Nghề nghiệp</th>
                    <td>
                        <select name="nghenghiep" value="Học sinh">
                            <option value="Học sinh">Học sinh</option>
                            <option value="Sinh viên">Sinh viên</option>
                            <option value="Giáo viên">Giáo viên</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Sở thích</th>
                    <td>
                        <input type="checkbox" name="sothich[]" value="Thể thao" />Thể thao
                        <input type="checkbox" name="sothich[]" value="Du lịch" />Du lịch
                        <input type="checkbox" name="sothich[]" value="Âm nhạc" />Âm nhạc
                        <input type="checkbox" name="sothich[]" value="Thời trang" />Thời trang
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="Đăng ký" />
                        <input type="reset" value="Làm lại" />
                    </td>
                </tr>
            </table>
        </form>
        <p class="error">
            <?php
            if (isset($_SESSION['error'])) {
                echo "* " . $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </p>
    </div>
</body>

</html>