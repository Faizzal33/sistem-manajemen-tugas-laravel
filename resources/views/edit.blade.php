<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tugas') }}
        </h2>
    </x-slot>

    <div class="container-xl mt-5 flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold">TUGAS : {{ strtoupper($task->title) }}</h5>
                    </div>

                    <div class="card-body">
                        <form action="/tasks/{{ $task->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group mt-1 mb-3">
                                <label for="title" class="form-label">Nama Tugas</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" value="{{ old('title') ?? $task->title }}">
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description"
                                    value="{{ old('description') ?? $task->description }}">
                            </div>

                            <div class="form-group mt-1 mb-4">
                                <label for="status" class="form-label">Status Tugas</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">Pilih Status</option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : ($task->status == 'pending' ? 'selected' : '') }}>Menunggu</option>
                                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : ($task->status == 'completed' ? 'selected' : '') }}>Selesai</option>
                                    <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : ($task->status == 'in_progress' ? 'selected' : '') }}>Dalam Proses</option>
                                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : ($task->status == 'cancelled' ? 'selected' : '') }}>Dibatalkan</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="due_date" class="form-label">Deadline</label>
                                <input type="date" class="form-control @error('due_date') is-invalid @enderror"
                                    id="due_date" name="due_date" value="{{ old('due_date') ?? $task->due_date }}">
                                <span class="text-danger">{{ $errors->first('due_date') }}</span>
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="started_at" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('started_at') is-invalid @enderror"
                                    id="started_at" name="started_at"
                                    value="{{ old('started_at') ?? $task->started_at }}">
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="completed_at" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('completed_at') is-invalid @enderror"
                                    id="completed_at" name="completed_at"
                                    value="{{ old('completed_at') ?? $task->completed_at }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

</x-app-layout>