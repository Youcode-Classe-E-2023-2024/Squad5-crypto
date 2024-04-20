<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des actifs</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>
<body>

<h1>Liste des actifs</h1>
<div class="container">
    <table id="assetsTable" class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price (USD)</th>
        </tr>
        </thead>
        <tbody>
        <!-- Data will be dynamically inserted here -->
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    axios.get('api/assets')
        .then(response => {
            const assets = response.data;

            $(document).ready(function() {
                $('#assetsTable').DataTable({
                    data: assets,
                    columns: [
                        { data: 'name' },
                        { data: 'priceUsd' }
                    ]
                });
            });
        })
        .catch(error => {
            console.error('Error fetching assets:', error);
        });

</script>


</body>
</html>
