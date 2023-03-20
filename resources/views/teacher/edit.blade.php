<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Edit teacher
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('teacher.edit', ['id' => $teacher['id']]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <table style="display: block; margin: 0 auto;">
            <tr>
                <td>Họ và tên</td>
                <td><input type="text" name="name" value="{{ $teacher['name'] }}"></td>
            </tr>
            <tr>
                <td>Chuyên ngành</td>
                <td>
                    <select name="specialized">
                        <option value="001" {{ ($teacher['specialized'] == '001' ? 'selected' : '') }}>Khoa học máy tính</option>
                        <option value="002" {{ ($teacher['specialized'] == '002' ? 'selected' : '') }}>Khoa học dữ liệu</option>
                        <option value="003" {{ ($teacher['specialized'] == '003' ? 'selected' : '') }}>Hải dương học</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Bằng cấp</td>
                <td>
                    <select name="degree">
                        <option value="001" {{ ($teacher['degeree'] == '001' ? 'selected' : '') }}>Cử nhân</option>
                        <option value="002" {{ ($teacher['degeree'] == '002' ? 'selected' : '') }}>Thạc sĩ</option>
                        <option value="003" {{ ($teacher['degeree'] == '003' ? 'selected' : '') }}>Tiến sĩ</option>
                        <option value="004" {{ ($teacher['degeree'] == '004' ? 'selected' : '') }}>Phó giáo sư</option>
                        <option value="005" {{ ($teacher['degeree'] == '005' ? 'selected' : '') }}>Giáo sư</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Avatar</td>
                <td><img src="{{ asset('avatar/teacher/' . $teacher['avatar']) }}" alt="{{ $teacher['avatar'] }}"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="file" name="avatar" accept="image/*"></td>
            </tr>
            <tr>
                <td>Mô tả thêm</td>
                <td><textarea name="description" cols="30" rows="10" >{{ $teacher['description'] }}</textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Xác nhận</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>