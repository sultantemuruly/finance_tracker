<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div style="border: 1px solid black; padding: 10px; margin-bottom: 10px; max-width: 600px;">
            <h3>{{ $user->first_name }} {{ $user->second_name }}</h3>
            <p>Email: {{ $user->email }}</p>
            <p>Registered at: {{ $user->created_at }}</p>
            <form action="/profile/{{$user->id}}" method="GET" style="display: inline;">
                @csrf
                <button type="submit">View Profile</button>
            </form>
        </div>
    </div>
    <div>
        @foreach ($records as $record)
            <div style="border: 1px solid black; padding: 10px; margin-bottom: 10px; max-width: 600px;">
                <h3>{{ $record->title }}</h3>
                <p>{{ $record->description }}</p>
                <p>Amount: ${{ $record->amount }}</p>
                <p>Date: {{ $record->date }}</p>
                <p>Type: {{ ucfirst($record->type) }}</p>
                <p>Category: {{ $record->category }}</p>
            </div>
        @endforeach
        {{ $records->links() }}
    </div>
</body>
</html>