
@extends('layouts.app')

@section('content')

<x-common.component-card title="Default Inputs">
    <!-- title -->
     <form action="{{ route('tambah_pengaduan-user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
           Judul Pengaduan
        </label>
        <input
        name="title"
         type="text"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
    </div>

    <!-- description -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
         Deskripsi Pengaduan
        </label>
        <input
        name="description" type="text" placeholder="Enter your description"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
    </div>

    <!-- location -->
      <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Lokasi
        </label>
        <input
        name="location"
         type="text"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
    </div>
   
   <!-- photo --> 
    <div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
        Foto Pengaduan
    </label>
    <input
        name="photo"
        type="file"
        accept="image/*"
        class="dark:bg-dark-900 shadow-theme-xs h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90" />
</div>
    <!-- Elements -->
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            Tanggal Pengaduan
        </label>

        <x-form.date-picker 
            id="date_pick" 
            name="created_at"
            placeholder="Date Picker" 
            defaultDate="{{ now()->format('Y-m-d') }}" 
        />
    </div>

  
  
    <button type="submit" class="mt-4 inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:px-3.5">
        
        Submit
    </button>
</form>
</x-common.component-card>
@endsection