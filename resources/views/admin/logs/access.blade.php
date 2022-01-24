
@foreach ($logs as $log)
<tr>
    <td>{{$log->id}}</td>
    <td>{{$log->action}}</td>
    <td>{{$log->description}}</td>
    <td>{{$log->created_at}}</td>
</tr>
<br>
@endforeach

