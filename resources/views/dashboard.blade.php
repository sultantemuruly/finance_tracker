<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <div style="margin-bottom: 0%; display: flex; justify-content: space-between; align-items: center;">
        <p>Welcome to your dashboard, {{ auth()->user()->first_name }}!</p>
        <a href="/"><button>Home</button></a>
    </div>
    <div>
        <form action="/record" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="description" placeholder="Description" required>
            <input type="number" name="amount" placeholder="Amount" required>
            <input type="date" name="date" required>
            <input type="text" name="category" placeholder="Category" required>
            <label>
                <input type="radio" name="type" value="income" required> Income
            </label>
            <label>
                <input type="radio" name="type" value="expense" required> Expense
            </label>
            <button type="submit">Record</button>
        </form>
    </div>
    <div>
        <h2>Filter</h2>
        <form action="/record/filter_by_type" method="POST" style="display: inline;">
            @csrf
            <label>
                <input type="radio" name="type" value="income" required> Income
            </label>
            <label>
                <input type="radio" name="type" value="expense" required> Expense
            </label>
            <button type="submit">Filter by Type</button>
        </form>
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
                <form action="/delete/{{$record->id}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <a href="/edit/{{$record->id}}"><button>Edit</button></a>
            </div>
        @endforeach
    </div>
</body>
</html>