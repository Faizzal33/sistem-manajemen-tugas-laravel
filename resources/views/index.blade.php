@php
    $statusTexts = [
        'pending' => 'Menunggu',
        'completed' => 'Selesai',
        'in_progress' => 'Dalam Proses',
        'cancelled' => 'Dibatalkan',
    ];
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tugas') }}
        </h2>
    </x-slot>

    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">

                <a href="/tasks/create" class="d-none d-sm-inline-block btn btn-sm mt-2 btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Tambah Tugas</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tugas</th>
                                <th>Deskripsi Tugas</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $statusTexts[$item->status] ?? 'Tidak Diketahui' }}</td>
                                    <td>{{ $item->due_date }}</td>
                                    <td>{{ $item->started_at }}</td>
                                    <td>{{ $item->completed_at }}</td>
                                    <td>
                                        <a href="{{ route('tasks.edit', $item->id) }}"
                                            class="btn btn-sm btn-info mt-1">Detail</a>
                                        <form action="{{ route('tasks.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger mt-1"
                                                onclick="return confirm('Yakin ingin hapus data?')"> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Tidak Ada Data Tugas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>