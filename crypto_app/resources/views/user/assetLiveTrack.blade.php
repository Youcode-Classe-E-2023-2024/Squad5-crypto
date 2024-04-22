<?php $asset = 'bitcoin' ?>
<x-layouts.user-layout title="bitcoin" >
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">



                <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-8" style="overflow-x: auto;">
                            <h1 class="text-xl text-center text-red-500">{{ $asset }}</h1>
                            <canvas id="myChart" class="bg-white"></canvas>
                            <input type="hidden" id="currentAsset" value="{{ $asset }}">

                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!--  BEGIN FOOTER  -->
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank"
                                                                                  href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg></p>
            </div>
        </div>
        <!--  END FOOTER  -->
    </div>

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


</x-layouts.user-layout >


