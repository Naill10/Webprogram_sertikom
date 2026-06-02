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
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Email</p>
                <p class="text-gray-800 dark:text-white">{{ $complaint->user->email ?? '-' }}</p>
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Lokasi</p>
                <p class="text-gray-800 dark:text-white">{{ $complaint->location }}</p>
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Tanggal</p>
                <p class="text-gray-800 dark:text-white">{{ $complaint->created_at->format('d M Y') }}</p>
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Status</p>
                @php
                    $statusClass = match($complaint->status) {
                        'masuk'   => 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/15 dark:text-yellow-400',
                        'proses'  => 'bg-blue-50 text-blue-700 dark:bg-blue-500/15 dark:text-blue-400',
                        'selesai' => 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500',
                        'ditolak' => 'bg-red-50 text-red-700 dark:bg-red-500/15 dark:text-red-400',
                        default   => 'bg-gray-50 text-gray-700',
                    };
                @endphp
                <span class="inline-block w-fit rounded-full px-2.5 py-0.5 text-xs font-medium {{ $statusClass }}">
                    {{ ucfirst($complaint->status) }}
                </span>
            </div>
            <div class="col-span-2 flex flex-col gap-1">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Deskripsi</p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $complaint->description }}</p>
            </div>
            @if ($complaint->photo)
            <div class="col-span-2 flex flex-col gap-2">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide">Foto</p>
                <img src="{{ asset('storage/' . $complaint->photo) }}" class="w-60 rounded-xl object-cover border border-gray-100 dark:border-gray-700">
            </div>
            @endif
        </div>
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
            </div>
        @empty
            <p class="text-sm text-gray-400">Belum ada respon untuk pengaduan ini.</p>
        @endforelse
    </div>

  
    <div class="mt-4">
        <a href="{{ route('complaint.respon') }}" class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
            ← Kembali
        </a>
    </div>

</x-common.component-default>
@endsection