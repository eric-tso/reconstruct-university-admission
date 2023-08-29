@props(['number', 'programmes'])

<tr>
    <td>{{ $number }}</td>
    <td>
        <select class="border border-gray-200 p-2 w-full rounded" name="programme{{ $number }}" required>
            <option value="" disable>--Select Your Option--</option>
            @foreach($programmes as $programme)
                <option value="{{ $programme->id }}">{{ $programme->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="border border-gray-200 p-2 w-full rounded" name="year{{ $number }}" required>
            <option value="" disable>--Select Your Option--</option>
            <option value="1">Year 1</option>
            <option value="3">Year 3</option>
        </select>
    </td>
</tr>