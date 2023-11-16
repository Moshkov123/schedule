
<form method="post" action="{{ route('update', $group->id) }}">
    @csrf
    @method('put')
    <input type="text" name="groups" id="groups" value="{{ $group->group }}" class="form-control">
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
