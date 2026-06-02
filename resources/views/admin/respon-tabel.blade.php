@extends('layouts.app')

@section('content')
<x-common.component-default title="Tabel Respon">

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonColor: '#3b82f6',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase">No</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase">Judul Pengaduan</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase">Pelapor</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase">Respon</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase">Admin</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase">Waktu</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase">Status</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-400 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($responses as $index => $res)
                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                    <td class="px-5 py-4 text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-5 py-4 font-medium text-gray-800 dark:text-white">
                        {{ $res->complaint->title ?? '-' }}
                    </td>
                    <td class="px-5 py-4 text-gray-600 dark:text-gray-400">
                        {{ $res->complaint->user->name ?? '-' }}
                    </td>   
                    <td class="px-5 py-4 text-gray-600 dark:text-gray-400 max-w-xs truncate">
                        {{ $res->response }}
                    </td>
                    <td class="px-5 py-4 text-gray-600 dark:text-gray-400">
                        {{ $res->admin->name ?? '-' }}
                    </td>
                    <td class="px-5 py-4 text-gray-400 text-xs">
                        {{ $res->created_at->diffForHumans() }}
                    </td>
                    <td class="px-5 py-4">
    @php
        $statusClass = match($res->complaint->status ?? 'masuk') {
            'masuk'     => 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/15 dark:text-yellow-400',
            'proses' => 'bg-blue-50 text-blue-700 dark:bg-blue-500/15 dark:text-blue-400',
            'selesai'    => 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500',
            'ditolak'     => 'bg-red-50 text-red-700 dark:bg-red-500/15 dark:text-red-400',
            default       => 'bg-gray-50 text-gray-700',
        };
    @endphp
    <span class="inline-block rounded-full px-2.5 py-0.5 text-xs font-medium {{ $statusClass }}">
        {{ ucfirst(str_replace('_', ' ', $res->complaint->status ?? '-')) }}
    </span>
</td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('complaint.detail', $res->complaint_id) }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-md">
                                Detail
                            </a>
                            <form id="delete-respon-{{ $res->id }}"
                                action="{{ route('response.destroy', $res->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    onclick="confirmHapus({{ $res->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1.5 rounded-md">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-5 py-8 text-center text-gray-400 text-sm">
                        Belum ada respon.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-common.component-default>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmHapus(id) {
        Swal.fire({
            title: 'Hapus Respon?',
            text: 'Respon ini akan dihapus permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-respon-' + id).submit();
            }
        });
    }
</script>
@endsection