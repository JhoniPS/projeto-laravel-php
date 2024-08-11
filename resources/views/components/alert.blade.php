@if(session()->has('success'))
    <div class="p-4 mb-4 text-sm text-green bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        {{ session('error') }}
    </div>
@endif

@if(session()->has('message'))
    <div class="p-4 mb-4 text-sm text-blue-800 bg-blue-100 border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
        {{ session('message') }}
    </div>
@endif

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li class="p-4 mb-4 text-sm text-yellow-500">{{$error}}</li>
        @endforeach
    </ul>
@endif
