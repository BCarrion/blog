@foreach($groups as $group)
    <tr>
        <td><input type="checkbox" value=""></td>
        <td>{{$group['object']->name}}</td>
        <td>{{$group['object']->created_at}}</td>
        <td>{{$group['object']->updated_at}}</td>

        @include('Package.SecurityGroup.partials.actions-by-group')
    </tr>
@endforeach