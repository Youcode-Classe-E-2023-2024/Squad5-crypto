<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<table id="myTable" class="display">
    <thead>
    <tr>
        <th>Exchange ID</th>
        <th>Name</th>
        <th>Rank</th>
        <th>Volume</th>
        <th> exchangeUrl </th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        axios.get('/api/exchanges')
            .then(function(response) {
                console.log(response)
                $('#myTable').DataTable({
                    data: response.data,
                    columns: [
                        {
                            data: 'exchangeId',
                            render: function(data, type, row) {
                                if (type === 'display') {
                                    return '<a href="/exchanges/' + data + '">' + data + '</a>';
                                }
                                return data;
                            }
                        },
                        { data: 'name' },
                        { data: 'rank' },
                        { data: 'volumeUsd' },
                        { data: 'exchangeUrl'}
                    ]
                });
            })
            .catch(function(error) {
                console.error('Failed to fetch data:', error);
            });
    });
</script>
</body>
</html>
