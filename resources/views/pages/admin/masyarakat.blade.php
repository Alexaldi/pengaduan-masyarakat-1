@extends('layouts.admin')

@section('title')
Data Masyarakat
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Data Masyarakat
    </h2>

    <form action="{{ route('admin.masyarakat.cari') }}" method="GET" class="mb-6">
      <div class="flex">
        <input type="text" name="cari" placeholder="Cari nama atau NIK..." value="{{ request('cari') }}"
          class="w-full px-4 py-2 mr-2 text-sm text-black bg-gray-100 dark:bg-gray-700 dark:text-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
        <button
          type="submit"
          class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700"
        >
          Cari
        </button>
      </div>
    </form>

    <div class="my-4 mb-6">
    @if(request()->has('cari') && request()->get('cari') != '')
            <a href="{{ route('admin.masyarakat') }}" class="no-underline hover:underline text-blue-500 text-lg">Tampilkan Semua</a>
        @endif
    </div>

    <div class="my-4 mb-6">
      <a href="{{ route('masyarakat.create')}} "
        class="px-5 py-3  font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
        Tambah Masyarakat
      </a>
    </div>

    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
            @endforeach
          </ul>
        </div>
        @endif
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">NIK</th>
              <th class="px-4 py-3">No. Hp</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @forelse ($masyarakats as $masyarakat)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->name }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->nik }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->phone }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $masyarakat->email }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">

                  <a href="{{ route('masyarakat.edit', $masyarakat->id)}} "
                    class="flex items-center justify-between  text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                    aria-label="Detail">

                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>

                  </a>
                  <form action="{{ route('masyarakat.destroy', $masyarakat->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button
                      class="flex items-center justify-between  text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                      aria-label="Delete">
                      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"></path>
                      </svg>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center text-gray-400">
                Data Kosong
              </td>
            </tr>
            @endforelse

            

          </tbody>
        </table>
      </div>

    </div>

  </div>
</main>
@endsection