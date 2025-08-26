<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Record</h1>
    <form action="/edit/{{$record->id}}" method="POST" style="display: flex; flex-direction: column; gap: 10px; max-width: 400px;">
        @csrf
        @method('PUT')
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
</body>
</html>