<div id="messages">
    @if (session('deleted'))
        <div class="mb-2 border border-gray-400 p-3 text-gray-900">
            {{ session('deleted') }}
        </div>
    @endif
    @if (session('success'))
        <div class="mb-2 border border-green-400 p-3 text-green-600">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mb-2 border border-red-400 p-3 text-red-600">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="mb-2 border border-red-400 p-3 text-red-600">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <script>
        setTimeout(() => {
            document.getElementById('messages').style.display = 'none';
        }, 5000);
    </script>
</div>
