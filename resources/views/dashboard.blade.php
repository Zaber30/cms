<style>
    table{
        width:100%;
    }
    table,th,td{
        border:2px solid green;
    }
    
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
       
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                   
                    @if(auth()->user()->role==='admin')
                      @include('admin.index')
                  @elseif(auth()->user()->role==='user')
                    <div>
                        @if(session('success'))
                            <div>{{session('success') }}</div>
                        @endsession
                        @if(session('error'))
                          <div>{{ session('error') }}</div>
                         @endsession
                        <form action="{{ route('picture.store')}}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <input type="file" name="image"><br>
                           <button type="submit">Submit</button>
                        </form>
                    </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
    >
</x-app-layout>
