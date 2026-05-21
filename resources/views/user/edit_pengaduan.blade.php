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
    

    <select disabled
        class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        <option value="pending"     {{ $tabel_user->status === 'pending'     ? 'selected' : '' }}>Pending</option>
        <option value="in_progress" {{ $tabel_user->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
        <option value="resolved"    {{ $tabel_user->status === 'resolved'    ? 'selected' : '' }}>Resolved</option>
    </select>

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