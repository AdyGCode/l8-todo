<?php
/**
 * Filename:    show.blade.php
 * Project:     SaaS-CUBE
 * Location:    resources\views\admin\users
 * Author:      Adrian Gould <adrian.gould@nmtafe.wa.edu.au>
 * Created:     08/09/21
 * Description:
 *     Add description here
 */

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <dl class="grid grid-cols-6 gap-2">
                        <dt class="col-span-1">ID</dt>
                        <dd class="col-span-5">{{ $user->id }}</dd>
                        <dt class="col-span-1">Name</dt>
                        <dd class="col-span-5">{{ $user->name }}</dd>
                        <dt class="col-span-1">Added</dt>
                        <dd class="col-span-5">@displayDate($user->created_at)</dd>
                        <dt class="col-span-1">Roles</dt>
                        <dd class="col-span-5">
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <small class="p-1 bg-green-300 mx-2">{{ $v }}</small>
                                @endforeach
                            @else
                                <small class="p-1 bg-amber-300 mx-2">No Roles</small>
                            @endif
                        </dd>
                        <dt class="col-span-1">Last Logged In</dt>
                        <dd class="col-span-5">
                            @if(is_null($user->last_login_at))
                                -
                            @else
                                @displayDate($user->last_login_at)
                            @endif
                        </dd>
                        <dt class="col-span-1">Last Logged In From</dt>
                        <dd class="col-span-5">{{ $user->last_login_ip ?? '-' }}</dd>
                        <dt class="col-span-1">Actions</dt>
                        <dd class="col-span-5">
                            <form
                                action="{{ route('users.destroy',['user'=>$user]) }}"
                                method="post">
                                @csrf
                                @method('delete')

                                <a href="{{ route('users.edit', ['user'=>$user]) }}"
                                   class="rounded p-2 px-4 mr-4
                                           border border-green-600 text-green-800
                                           hover:bg-green-600 hover:text-white
                                           transition-all ease-in-out duration-200">Update</a>

                                <button
                                    class="border border-red-600 rounded p-1.5 px-4 mr-4
                                           text-red-800
                                           hover:bg-red-800 hover:text-white
                                           ease-in-out transition-all duration-200"
                                    type="submit">
                                    Delete
                                </button>

                            </form>
                        </dd>
                    </dl>
                    <p class="pt-6">
                        <a href="{{ url('/users') }}"
                           class="rounded p-2 px-4 mr-2
                                  border border-blue-600 text-blue-800 bg-white
                                  hover:bg-blue-500 hover:text-white hover:border-blue-800
                                  transition-all ease-in-out duration-200">Back to Users</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
