@extends('layouts.admin')

@section('title')
Data Masyarakat
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Forms
    </h2>
    <form action="{{ route('masyarakat.store')}} " method="POST" enctype="multipart/form-data">
      @csrf
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">NIK</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="text" placeholder="NIK" value="{{ old('nik')}}" name="nik"></input>
            @error('nik')
              <p class="text-red-600 dark:text-white text-xs mt-1">{{ $message }}</p>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Name</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="text" placeholder="John Doe" value="{{ old('name')}}" name="name"></input>
            @error('name')
              <p class="text-red-600 dark:text-white text-xs mt-1">{{ $message }}</p>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Email</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="email" placeholder="email@email.com" value="{{ old('email')}}" name="email"></input>
            @error('email')
              <p class="text-red-600 dark:text-white text-xs mt-1">{{ $message }}</p>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">No. Hp</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="text" placeholder="0123456789" value="{{ old('phone')}}" name="phone"></input>
            @error('phone')
              <p class="text-red-600 dark:text-white text-xs mt-1">{{ $message }}</p>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Password</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="password" placeholder="password" value="{{ old('password')}}" name="password"></input>
            @error('password')
              <p class="text-red-600 dark:text-white text-xs mt-1">{{ $message }}</p>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Konfirmasi Password</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="password" placeholder="password" value="{{ old('password')}}" name="password_confirmation"></input>
            @error('password_confirmation')
              <p class="text-red-600 dark:text-white text-xs mt-1">{{ $message }}</p>
            @enderror
        </label>


        <button type="submit"
          class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
          Tambah Masyarakat
        </button>
      </div>
    </form>
  </div>
</main>
@endsection