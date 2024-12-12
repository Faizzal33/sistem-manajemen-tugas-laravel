<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tugas') }}
        </h2>
    </x-slot>

    <div class="container-xl mt-5 flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Nama Tugas</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title')}}">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                    

                    
                    <div class="form-group mt-3 mb-3">
                        <label for="description" class="form-label">deskripsi</label>
                        <textarea name="description" rows="2" class="form-control" value="{{ old('description')}}"></textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="title" class="form-label">Status</label>
                       
                            <select name="status" class="form-control select2">
                            <option value="">Pilih Status</option>
                            <option value="pending">Menunggu</option>
                            <option value="completed">Selesai</option>
                            <option value="in_progress">Dalam Proses</option>
                            <option value="canceled">Dibatalkan</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="due_date" class="form-label">deadline</label>
                        <input type="date" name="due_date" class="form-control"
                            value="{{ old('due_date')}}">
                        <span class="text-danger">{{ $errors->first('due_date') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="started_at" class="form-label">tanggal mulai</label>
                        <input type="date" name="started_at" class="form-control"
                            value="{{ old('started_at')}}">
                        <span class="text-danger">{{ $errors->first('started_at') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="completed_at" class="form-label">tanggal selesai</label>
                        <input type="date" name="completed_at" class="form-control"
                            value="{{ old('completed_at')}}">
                        <span class="text-danger">{{ $errors->first('completed_at') }}</span>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>