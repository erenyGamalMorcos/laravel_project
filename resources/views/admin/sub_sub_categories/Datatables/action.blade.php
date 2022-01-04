<!-- how to send category_id from here ?? -->
<form action="{{ route('sub_sub_categories.destroy',['category_id' => $category_id , 'sub_category_id' => $row->sub_category_id, 'sub_sub_category' => $row->id]) }}" method="POST">
    <a class="btn btn-primary" href="{{ route('sub_sub_categories.edit', ['category_id'=> $category_id, 'sub_category_id' => $row->sub_category_id, 'sub_sub_category' => $row->id]) }}">{{ __('translations.Edit') }}</a>

    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">{{ __('translations.Delete') }}</button>
</form>
