@extends('layouts.admin', ['title' => 'Cloud Capacity'])

@section('content')
    <div class="lg:col-span-3 rounded-lg border-2 p-4">
        <div class="mb-4 border-b pb-4 flex justify-between">
            <h2 class="text-3xl font-semibold">Cloud Capacity</h2>

            <form action="{{ route('cloud-capacity.report') }}" method="post">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Report
                </button>
            </form>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cluster
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Memory
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CPU
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Active
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Updated At
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($clouds as $cloud)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $cloud->cluster_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cloud->mem }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cloud->cpu }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($cloud->is_active)
                                <svg class="text-green-500" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512" fill="currentColor">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            @else
                                <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512" fill="currentColor">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                </svg>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $cloud->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cloud->updated_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

@push('scripts')
@endpush
