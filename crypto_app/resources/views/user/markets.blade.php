<x-layouts.user-layout title="markets" >
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">



                <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-8" style="overflow-x: auto;">
                            <table id="myTable" class="table table-striped dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Base Symbol</th>
                                    <th>Quote Symbol</th>
                                    <th>Price Quote</th>
                                    <th>Rank</th>
                                    <th>Price Quote</th>
                                    <th>Trades Count</th>
                                    <th>Volume Usd</th>
                                    <th>Price Usd</th>
                                    <th>Percent Exchange Volume</th>
                                    <th>Updated</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th> </th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
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

    <script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js
"></script>
    <script>

        $(document).ready(function() {
            axios.get('/api/markets')
                .then(function(response) {
                    console.log(response)
                    $('#myTable').DataTable({
                        data: response.data,
                        columns: [
                            { data: 'baseId' },
                            { data: 'baseSymbol' },
                            { data: 'quoteSymbol' },
                            { data: 'rank' },
                            { data: 'priceQuote' },
                            { data: 'tradesCount24Hr' },
                            { data: 'volumeUsd24Hr' },
                            { data: 'priceUsd' },
                            { data: 'percentExchangeVolume' },
                            { data: 'updated' }
                        ]
                    });
                })
                .catch(function(error) {
                    console.error('Failed to fetch data:', error);
                });
        });

    </script>


</x-layouts.user-layout >


