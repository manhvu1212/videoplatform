<tr>
     <td><input type="checkbox" class="checkone" value="{{$v['id']}}" ></td>
     <td>{{ $v['name'] }}</td>
     <td>
        <button title="edit"  class="btn btn-sm btn-danger edit-vocabulary-term " data-parent = "{{$v['parent']}}" data-id = "{{$v['id']}}" ><i class="fa fa-edit"></i></button>
        <button title="delete"  class="btn btn-sm btn-warning delete-vocabulary-term" data-name = "{{$v['nameold']}}"    data-id="{{$v['id'] }}"  ><i class="fa fa-trash-o"></i></button>
     </td>
</tr>