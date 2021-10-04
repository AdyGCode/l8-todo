<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="flex">
                        <div class="flex-auto text-2xl mb-4">User List</div>

                        <div class="flex-auto text-right mt-2">
                            <a href="/users/create"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add New User
                            </a>
                        </div>
                    </div>
                    <table class="w-full text-md rounded mb-4">
                        <thead>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5 w-1/4">User</th>
                            <th class="text-left p-3 px-5 w-1/2">eMail</th>
                            <th class="text-left p-3 px-5">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="border-b hover:bg-orange-100">
                                <td class="p-3 px-5 font-semibold align-text-top">
                                    {{$user->name}}
                                </td>
                                <td class="p-3 px-5 align-text-top">
                                    {{$user->email}}
                                </td>
                                <td class="p-3 px-5 align-text-top">

                                    <form action="{{url('/users/' . $user->id . '/delete')}}"
                                          method="POST"
                                          class="inline-block">

                                        <a href="/users/{{$user->id}}/edit"
                                           class="mr-3 text-sm bg-blue-500 hover:bg-blue-700
                                       text-white py-1 px-2 rounded focus:outline-none
                                       focus:shadow-outline">Edit</a>

                                        <button type="submit" name="delete"
                                                class="text-sm bg-red-500 hover:bg-red-700
                                                text-white py-1 px-2 rounded focus:outline-none
                                                focus:shadow-outline">
                                            Delete
                                        </button>
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
