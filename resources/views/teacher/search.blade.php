<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher</title>
</head>
<body>
    <form action="#" method="post">
        @csrf
        <div>
            <label>Chuyên nghành</label>
            <select name="key_word">
                <option value=""></option>
                @foreach ($datas as $item)
                
                    <option value="{{ $item['specialized'] }}">{{ $item['specialized'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Từ khóa</label>
            <input type="text" name="key_word">
        </div>
        <button type="submit">Tìm kiếm</button>
    </form>
    Số giáo viên tìm thấy: {{ count($datas) }}
    <table>
        <tr>
            <th>No</th>
            <th>Tên giáo viên</th>
            <th>Khoa</th>
            <th>Mô tả chi tiết</th>
            <th>Action</th>
        </tr>
        @for ($i = 0; $i < count($datas); $i++)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $datas[$i]['name'] }}</td>
                <td>{{ $datas[$i]['specialized'] }}</td>
                <td>{{ $datas[$i]['description'] }}</td>
                <td>
                    <div style="display: inline">
                        <form action="{{ route('teacher.delete', ['id' => $datas[$i]['id']]) }}" method="post">
                            @csrf
                            @method('delete')
                            {{-- <a href="{{ route('teacher.delete', ['id' => $datas[$i]['id']]) }}" onclick="return confirm('Bạn có muốn xóa giáo viên này không?')" style="text-decoration: none; color:black; background-color: red">Xóa</a> --}}
                            <button type="submit" style="background-color: red" onclick="return confirm('Bạn có muốn xóa giáo viên này không?')">Xóa</button>
                            <a href="{{ route('teacher.edit-form', ['id' => $datas[$i]['id']]) }}" style="text-decoration: none; color:black; border:1px solid; background-color: blue">Sửa</a>
                        </form>
                    </div>
                </td>
            </tr>
        @endfor
    </table>
</body>
</html>