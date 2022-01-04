<form action="{{ route('categories.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('sub_categories.index', $id) }}">{{ __('translations.Show') }}</a>
    <a class="btn btn-primary" href="{{ route('categories.edit', $id) }}">{{ __('translations.Edit') }}</a>

    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">{{ __('translations.Delete') }}</button>
</form>
