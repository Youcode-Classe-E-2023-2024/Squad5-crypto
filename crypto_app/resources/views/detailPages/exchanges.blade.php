<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exchange details</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<table id="myDetailTable" class="display">
    <thead>
    <tr>
        <th>Exchange ID</th>
        <th>Name</th>
        <th>Rank</th>
        <th>Percent Total Volume</th>
        <th>Volume</th>
        <th>Trading Pairs</th>
        <th>Socket</th>
        <th>Exchange Url </th>
        <th>Updated</th>
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
        var exchangeId = <?php echo json_encode($id); ?>;
        console.log(exchangeId);

        axios.get(`/api/exchanges/${exchangeId}`)
            .then(function(response) {
                console.log(response.data);
                var exchangeData = response.data;
                $('#myDetailTable').DataTable({
                    data: [exchangeData], 
                    columns: [
                        { data: 'exchangeId' },
                        { data: 'name' },
                        { data: 'rank' },
                        { data: 'percentTotalVolume' },
                        { data: 'volumeUsd' },
                        { data: 'tradingPairs' },
                        {
                            data: 'socket',
                            render: function(data) {
                                return data ? 'True' : 'False';
                            }
                        },
                        { data: 'exchangeUrl' },
                        {
                            data: 'updated',
                            render: function(data) {
                                return new Date(data).toLocaleString();
                            }
                        }
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
