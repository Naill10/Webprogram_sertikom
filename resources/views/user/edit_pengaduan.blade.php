@extends('layouts.app')

@section('content')
<x-common.component-default title="Edit Pengaduan">

    <form action="{{ route('update_pengaduan', $tabel_user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Judul</label>
            <input type="text" name="title" value="{{ old('title', $tabel_user->title) }}"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        </div>

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Deskripsi</label>
            <textarea name="description" rows="4"
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">{{ old('description', $tabel_user->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Lokasi</label>
            <input type="text" name="location" value="{{ old('location', $tabel_user->location) }}"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        </div>

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Foto</label>
            @if ($tabel_user->photo)
                <img src="{{ asset('storage/' . $tabel_user->photo) }}" class="mb-2 h-24 rounded">
            @endif
            <input type="file" name="photo"
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        </div>

     <div class="mb-4">
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Status</label>
    
    @php
        $statusClass = match($tabel_user->status) {
            'pending'     => 'bg-yellow-100 text-yellow-700',
            'in_progress' => 'bg-blue-100 text-blue-700',
            'resolved'    => 'bg-green-100 text-green-700',
            default       => 'bg-gray-100 text-gray-700',
        };
    @endphp

    <div class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 dark:border-gray-700 dark:bg-gray-900 flex items-center">
        <span class="rounded-full px-3 py-1 text-sm font-medium {{ $statusClass }}">
            {{ ucfirst($tabel_user->status) }}
        </span>
    </div>

    {{-- Hidden input supaya nilai status tetap terkirim ke controller --}}
    <input type="hidden" name="status" value="{{ $tabel_user->status }}">
</div>

        <button type="submit"
            class="mt-4 inline-flex items-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700">
            Update Pengaduan
        </button>
    </form>

</x-common.component-default>
@endsection