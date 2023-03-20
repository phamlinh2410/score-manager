<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher Register</title>
</head>
<body>
    Register teacher
    <form action="" method="PUT" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>Họ và tên</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Chuyên ngành</td>
                <td>
                    <select name="specialized">
                        <option value=""></option>
                        <option value="001">Khoa học máy tính</option>
                        <option value="002">Khoa học dữ liệu</option>
                        <option value="003">Hải dương học</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Bằng cấp</td>
                <td>
                    <select name="degree">
                        <option value=""></option>
                        <option value="001">Cử nhân</option>
                        <option value="002">Thạc sĩ</option>
                        <option value="003">Tiến sĩ</option>
                        <option value="004">Phó giáo sư</option>
                        <option value="005">Giáo sư</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Avatar</td>
                <td><input type="file" name="avatar" accept="image/*"></td>
            </tr>
            <tr>
                <td>Mô tả thêm</td>
                <td><textarea name="description" cols="30" rows="10"></textarea></td>
            </tr>
        </table>
        <button type="submit">Xác nhận</button>
    </form>
</body>
</html>