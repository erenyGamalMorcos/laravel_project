<form action="{{ route('products.destroy',$id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('products.show', $id) }}">{{ __('translations.Show') }}</a>
    <a class="btn btn-primary" href="{{ route('products.edit', $id) }}">{{ __('translations.Edit') }}</a>

    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">{{ __('translations.Delete') }}</button>
</form>
