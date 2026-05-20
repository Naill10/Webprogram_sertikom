
@extends('layouts.app')

@section('content')

<x-common.component-default title="Form Tambah Admin">
    <!-- title -->
    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 dark:border-red-900 dark:bg-red-900/20">
            <p class="font-semibold text-red-800 dark:text-red-200">Validasi Error:</p>
            <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-700 dark:text-red-300">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

     <form action="{{ route('store.admin') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
          Nama Admin
        </label>
        <input
        name="name"
         type="text"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 @error('name') border-red-500 @enderror" />
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
         Email Admin
        </label>
        <input
        name="email" type="email" placeholder="Enter your email"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 @error('email') border-red-500 @enderror" />
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


      <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Password Admin  
        </label>
        <input
        name="password"
         type="password"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 @error('password') border-red-500 @enderror" />
        @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                Confirm Password
        </label>
        <input
        name="password_confirmation"
         type="password"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 @error('password_confirmation') border-red-500 @enderror" />
        @error('password_confirmation')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
   
   <!-- role --> 
    <div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
        Role
    </label>
    <select
        name="role"
        required
        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 @error('role') border-red-500 @enderror"
    >
      <option value="">-- Pilih Role --</option>
<option value="admin" {{ old('role', 'admin') == 'admin' ? 'selected' : '' }}>Admin</option>
<option value="user" {{ old('role', 'admin') == 'user' ? 'selected' : '' }}>User</option>
    </select>
    @error('role')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
       


  
  
    <button type="submit" class="mt-4 inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:px-3.5">
        
        Submit
    </button>
</form>
</x-common.component-card>
@endsection