@if($section_name=='products')
    <a href="{{ url($section_name.'/'.$id.'/edit') }}" title="Edit" class="btn btn-sm btn-info tip">
        <i class="fa fa-edit"></i>
    </a>
    <button class="btn btn-sm btn-danger deleteRecord" data-id="{{$id}}" type="button" data-url="{{ url($section_name.'/'.$id) }}" data-section="{{$section_name}}_table" title="Delete">
        <i class="fa fa-trash"></i>
    </button>
@endif

@if($section_name=='carts')
    <button class="btn btn-sm btn-danger deleteCartRecord" data-id="{{$id}}" type="button" data-url="{{ url($section_name.'/'.$id) }}" data-section="{{$section_name}}_table" title="Delete">
        <i class="fa fa-trash"></i>
    </button>
@endif