<form action="{{ route('Tasks.update', $task->id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" value="{{ $task->name }}" name="name">
    <select name="category_id" id="category" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <input type="submit" value="simpan">
</form>