<!-- resources/views/dashboard.blade.php -->

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table>
                    <thead class="border border-solid flex">
                        <th class="border border-solid">Nomor</th>
                        <th class="border border-solid">Nama</th>
                        <th class="border border-solid">Category</th>
                        <th class="border border-solid">Action</th>
                    </thead>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="border border-solid"><p>{{ $task->id }}</p></td>
                            <td class="border border-solid"><p>{{ $task->name }}</p></td>
                            <td class="border border-solid"><p>{{ $task->category->name }}</p></td>
                            <td class="border border-solid">
                                <a href="{{ route('Tasks.edit', $task->id) }}">Edit</a>
                                <form action="{{ route('Tasks.destroy', $task->id) }}" method="post" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Selesai</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<div class="new-task">
    <form action="{{ route('Tasks.store') }}" method="post" class="flex flex-col">
        @csrf
        <label for="name">Nama Kegiatan:</label>
        <input type="text" name="name" id="name" required>
        <select name="category_id" id="category" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="cursor-pointer">Tambah Kegiatan</button>
    </form>
</div>
