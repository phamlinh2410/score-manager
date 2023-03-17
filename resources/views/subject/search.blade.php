<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject</title>
</head>
<body>
    <form action="{{ route('subject.search') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Khóa học</td>
                <td>
                    <select name="school_year">
                        <option value=""></option>
                        <option value="Năm 1">Năm 1</option>
                        <option value="Năm 2">Năm 2</option>
                        <option value="Năm 3">Năm 3</option>
                        <option value="Năm 4">Năm 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Từ khóa</td>
                <td><input type="text" name="key_word"></td>
            </tr>
        </table>
        <button type="submit">Tìm kiếm</button>
    </form>
    
    Số môn học tìm thấy: {{ count($subjects) }}
    <br>
    <table>
        <tr>
            <th>No</th>
            <th>Tên môn học</th>
            <th>Khóa học</th>
            <th>Mô tả chi tiết</th>
            <th>Action</th>
        </tr>
        
        @if (count($subjects) > 0)
            @for ($i = 0; $i < count($subjects); $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $subjects[$i]->name }}</td>
                    <td>{{ $subjects[$i]->school_year }}</td>
                    <td>{{ $subjects[$i]->description }}</td>
                    <td>
                        <button name="{{ $subjects[$i]->id }}" style="background-color: red"><a href="" style="text-decoration: none; color: black;">Xóa</a></button>
                        <button><a href="{{ route('subject.edit', ['id' => $subjects[$i]->id]) }}" name="{{ $subjects[$i]->id }}" style="text-decoration: none; color: black;">Sửa</a></button></td>
                </tr>
            @endfor
        @endif

    </table>
</body>
</html>