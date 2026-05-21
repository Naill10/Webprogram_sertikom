@extends('layouts.app')

@section('content')
<x-common.component-default title="Edit Admin">

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-700 dark:bg-red-500/15 dark:text-red-400">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update_admin', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Nama Admin</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        </div>

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Email</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        </div>

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Password <span class="text-gray-400 text-xs">(kosongkan jika tidak ingin mengubah)</span>
            </label>
            <input type="password" name="password"
                placeholder="Masukkan password baru..."
                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        </div>

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                placeholder="Ulangi password baru..."
                class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
        </div>

        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Role</label>
            <select name="role" class="h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                <option value="admin" {{ old('role', $admin->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user"  {{ old('role', $admin->role) === 'user'  ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit"
            class="mt-4 inline-flex items-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700">
            Update Admin
        </button>
    </form>

</x-common.component-default>
@endsection