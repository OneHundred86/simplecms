@extends('admin.base')

@section('main')
<table id="articles" lay-filter="article-filter">
    <thead>
    <tr>
        <th lay-data="{width:200}">ID</th>
        <th lay-data="{width:150}">标题</th>
        <th lay-data="{width:180}">状态</th>
        <th lay-data="{width:100}">创建时间</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1jjj</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
    </tr>
    </tbody>
</table>

<script>
    layui.use('table', function() {
        var table = layui.table;

        table.init('article-filter');
    });
</script>
@endsection