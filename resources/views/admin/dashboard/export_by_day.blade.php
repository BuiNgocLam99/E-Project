@extends('admin.layout.master')

@section('title')
Export By Day
@endsection

@section('content')
    <div id="page-wrapper" data-order="{{ $orders }}">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Export
                            <small>By Day</small>
                        </h1>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Total Quantity</th>
                                <th>1st Sale</th>
                                <th>2nd Sale</th>
                                <th>3rd Sale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>${{ $total_quantity }}</td>
                                @foreach ($top_product as $product)
                                <td>${{ $total_revenue - $total_capital }}</td>
                                <td>${{ $total_revenue - $total_capital }}</td>
                                <td>${{ $total_revenue - $total_capital }}</td>
                                @endforeach
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="{{route('admin.dashboard.revenue-by-month')}}"> See more</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{route('admin.dashboard.revenue-by-year')}}"> See more</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <canvas style="width: " id="myChart"></canvas>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js"></script> --}}

            <script>
                $(document).ready(function() {
                    var orders = $('#page-wrapper').data('order')
                    var listOfRevenue = []
                    var listOfProfit = []
                    var listOfHours = []

                    orders.forEach(function(element) {
                        listOfRevenue.push(element.Total_Revenue);
                        listOfProfit.push(element.Total_Profit);
                        listOfHours.push(element.time);
                    });

                    const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: listOfHours,
                            datasets: [{
                                    label: 'Profit',
                                    data: listOfProfit,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Revenue',
                                    data: listOfRevenue,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
            </script>
        </div>
    @endsection
