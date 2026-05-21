@extends('layouts.app')

@section('content')
<x-common.component-default title="Detail Pengaduan">

  


   <div class="mb-6 rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-gray-900">
    
    <h2 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-3">
        {{ $complaint->title }}
    </h2>

    <div class="grid grid-cols-2 gap-5 text-sm">

        <div class="flex flex-col gap-1">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Pelapor</p>
            <p class="text-gray-800 dark:text-white font-medium">{{ $complaint->user->name ?? '-' }}</p>
        </div>
        <div class="flex flex-col gap-1">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Lokasi</p>
            <p class="text-gray-800 dark:text-white">{{ $complaint->location }}</p>
        </div>

        
        <div class="flex flex-col gap-1">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Status</p>
            @php
                $statusClass = match($complaint->status) {
                    'pending'     => 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/15 dark:text-yellow-400',
                    'in_progress' => 'bg-blue-50 text-blue-700 dark:bg-blue-500/15 dark:text-blue-400',
                    'resolved'    => 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500',
                    default       => 'bg-gray-50 text-gray-700',
                };
            @endphp
            <span class="inline-block w-fit rounded-full px-2.5 py-0.5 text-xs font-medium {{ $statusClass }}">
                {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
            </span>
        </div>
        <div class="col-span-2 flex flex-col gap-1">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Deskripsi</p>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $complaint->description }}</p>
        </div>

        {{-- Foto --}}
        @if ($complaint->photo)
        <div class="col-span-2 flex flex-col gap-2">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Foto</p>
            <img src="{{ asset('storage/' . $complaint->photo) }}"
                class=" w-60  rounded-xl object-cover border border-gray-100 dark:border-gray-700">
        </div>
        @endif

    </div>
</div>

    <div class="mb-6 rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-gray-900">
        <h3 class="mb-3 text-sm font-semibold text-gray-800 dark:text-white">Kirim Respon</h3>
        <form action="{{ route('response.store', $complaint->id) }}" method="POST">
            @csrf
            <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Ubah Status</label>
            <select name="status"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                <option value="pending"     {{ $complaint->status === 'pending'     ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $complaint->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="resolved"    {{ $complaint->status === 'resolved'    ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>
            @error('response')
                <p class="mb-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
            <textarea name="response" rows="4" placeholder="Tulis respon untuk pengaduan ini..."
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">{{ old('response') }}</textarea>
            <button type="submit"
                class="mt-3 inline-flex items-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700">
                Kirim Respon
            </button>
        </form>
    </div>


    <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-gray-900">
        <h3 class="mb-4 text-sm font-semibold text-gray-800 dark:text-white">Riwayat Respon</h3>

        @forelse ($complaint->responses as $res)
            <div class="mb-4 rounded-lg border border-gray-100 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                <div class="mb-1 flex items-center justify-between">
                    <span class="text-xs font-medium text-blue-600 dark:text-blue-400">
                        {{ $res->admin->name ?? 'Admin' }}
                    </span>
                    <span class="text-xs text-gray-400">{{ $res->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-sm text-gray-700 dark:text-gray-300">{{ $res->response }}</p>

      
                <form action="{{ route('response.destroy', $res->id) }}" method="POST" class="mt-2"
                    onsubmit="return confirm('Hapus respon ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-xs text-red-500 hover:text-red-700">Hapus</button>
                </form>
            </div>
        @empty
            <p class="text-sm text-gray-400">Belum ada respon untuk pengaduan ini.</p>
        @endforelse
</div>
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

</x-common.component-default>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection