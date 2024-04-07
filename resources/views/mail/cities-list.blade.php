Hello manager. Here is the list of some of the Japanese prefectures: 

<br>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <!-- <th>Due Date</th>
            <th>Book Name</th>
            <th>Late Fee</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach ($cities as $city)
    <tr>
        <td>{{ $city->name }}</td>
        <td>{{ $city->description }}</td>
        <br>
    </tr>
    @endforeach

    </tbody>
</table>