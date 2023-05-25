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
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch');
                    <label for="">name:</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}">
                    <label for="">email:</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}">
                    <label for="">password:</label>
                    <input type="password" name="password">
                    <label for="">confirm password:</label>
                    <input type="password" name="confirm_password">
                    <button type="submit" class="btn btn-primary">send</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
