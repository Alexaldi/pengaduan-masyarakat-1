@extends('layouts.admin')

@section('title')
Edit Data Masyarakat
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Forms Edit
    </h2>
    <form action="{{ route('masyarakat.update', $masyarakat->id) }}" method="POST">
        @csrf
        @method('PUT')
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">NIK</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="text" name="nik" class="form-control" value="{{ $masyarakat->nik }}" readonly></input>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Name</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="text" name="name" class="form-control" value="{{ $masyarakat->name }}" required></input>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Email</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="email" name="email" class="form-control" value="{{ $masyarakat->email }}" required></input>
        </label>
<!--
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">No. Hp</span>
          <input
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
            type="text" name="phone" class="form-control" value="{{ $masyarakat->phone }}" required></input>
        </label>
-->
        <button type="submit"
          class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
          Update Data Masyarakat
        </button>
      </div>
    </form>
  </div>
</main>
@endsection