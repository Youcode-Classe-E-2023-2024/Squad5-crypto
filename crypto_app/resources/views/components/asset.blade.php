<!DOCTYPE html>
<html>
<head>
    <title>Live Visualization of {{ $asset }} Cryptocurrency.</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
<h1 class="text-xl text-center text-red-500 capitalize">{{ $asset }}</h1>
<canvas id="myChart"></canvas>
<input type="hidden" id="currentAsset" value="{{ $asset }}">

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Live Price',
                data: [],
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Real-Time Cryptocurrency Live Prices'
            }
        }
    });

    const currentAsset = document.querySelector('#currentAsset');
    const tradeWs = new WebSocket(`wss://ws.coincap.io/prices?assets=${currentAsset.value}`);

    tradeWs.onmessage = function (msg) {
        let data = JSON.parse(msg.data);
        chart.data.labels.push(new Date());

        if (!chart.data.datasets[0].data) {
            chart.data.datasets[0].data = [];
        }

        chart.data.datasets[0].data.push(data[`${currentAsset.value}`]);

        chart.update();
    }

    tradeWs.onerror = function (error) {
        console.log(`WebSocket error: ${error}`);
    };


</script>
</body>
</html>
