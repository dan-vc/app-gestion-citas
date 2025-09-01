<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>

<body>
    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ url()->current() }}" method="POST">
        @csrf
        <button type="submit">Save Patient</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->created_at }}</td>
                <td>{{ $patient->updated_at }}</td>
                <td>
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <form action="{{ route('patients.update', $patient->id) }}" method="GET" style="display:inline;">
                        <button type="submit">Edit</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>