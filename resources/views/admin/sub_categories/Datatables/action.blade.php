<form action="{{ route('sub_categories.destroy',['category_id'=>$category_id, 'sub_category'=>$id]) }}" method="POST">
    <a class="btn btn-info" href="{{ route('sub_sub_categories.index', ['category_id'=>$category_id, 'sub_category_id'=>$id]) }}">{{ __('translations.Show') }}</a>
    <a class="btn btn-primary" href="{{ route('sub_categories.edit', ['category_id'=>$category_id, 'sub_category'=>$id]) }}">{{ __('translations.Edit') }}</a>

    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">{{ __('translations.Delete') }}</button>
</form>
