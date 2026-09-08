<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catatan Tugas Kuliah</title>
</head>
<body>
    <h1>Catatan Tugas Kuliah</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('tugas.store') }}" method="POST">
        @csrf
        <input type="text" name="judul" placeholder="Judul tugas" value="{{ old('judul') }}">
        <input type="date" name="deadline" value="{{ old('deadline') }}">
        <select name="prioritas">
            <option value="rendah">Rendah</option>
            <option value="sedang" selected>Sedang</option>
            <option value="tinggi">Tinggi</option>
        </select>
        <textarea name="deskripsi" placeholder="Deskripsi (opsional)">{{ old('deskripsi') }}</textarea>
        <button type="submit">Tambah</button>

        @error('judul') <p style="color:red">{{ $message }}</p> @enderror
        @error('deadline') <p style="color:red">{{ $message }}</p> @enderror
    </form>

    <ul>
        @foreach ($tugas as $item)
            <li>
                <strong>{{ $item->judul }}</strong>
                — {{ $item->deadline->format('d M Y') }}
                ({{ $item->prioritas }})
                — {{ $item->selesai ? 'Selesai' : 'Belum selesai' }}

                <form action="{{ route('tugas.update', $item) }}" method="POST" style="display:inline">
                    @csrf @method('PUT')
                    <button type="submit">Tandai {{ $item->selesai ? 'belum' : 'selesai' }}</button>
                </form>

                <form action="{{ route('tugas.destroy', $item) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{ $tugas->links() }}
</body>
</html>