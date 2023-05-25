<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('users.destroy', '_') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <label for="">Are you Sure?? do you want to delete {{ $user->name }}</label>
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-danger">remove</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
