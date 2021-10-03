<?php
/**
 * Filename:    delete.blade.php
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
            {{ __('Delete User') }}
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
                        <dd class="col-span-5">{{ $user->created_at }}</dd>
                        <dt class="col-span-1">Last Logged In</dt>
                        <dd class="col-span-5">{{ '-' }}</dd>
                        <dt class="col-span-1">Actions</dt>
                        <dd class="col-span-5">
                            <a href="{{ route('users.index') }}"
                               class="btn btn-sm btn-primary text-gray-50">Cancel</a>
                            <a href="{{ route('users.delete', ['user'=>$user->id]) }}"
                               class="btn btn-sm btn-accent">Delete</a>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
