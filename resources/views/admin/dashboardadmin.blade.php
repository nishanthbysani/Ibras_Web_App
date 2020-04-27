@extends('layouts.admintemplate')
@extends('admin.sidenavbar')
@extends('admin.dashboardfooter')
@section('content')
<section>
    <div id="dashboardsection1">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Monthly', 'Daily'],
                datasets: [{
                    label: 'Sales',
                    data: [
                        @php
                        echo $netearningsmonthly;
                        @endphp,
                        @php
                        echo $netearningsdaily;
                        @endphp
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</section>
<section>
    <div id="dashboardsection2">
        <canvas id="myChart1"></canvas>
    </div>



    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var myChart1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Monthly', 'Daily'],
                datasets: [{
                    label: 'Number of Orders',
                    data: [@php echo $monthlyorders;@endphp, @php echo $dailyorders @endphp],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</section>
<section>
    <div id="dashboardsection3">
        <canvas id="myChart2"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Monthly', 'Daily'],
                datasets: [{
                    label: 'Profits',
                    data: [
                        @php echo $netearningsmonthly * 0.15;@endphp, @php echo $netearningsdaily * 0.15;@endphp
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</section>
<main>
    <div id="usercards">
        <h1>My Dashboard</h1>
        <h2 class="dashboardheading">Monthly</h2>
        <div class="userscard">
            <h4>Net Earnings</h4>
            <p class="userstitle"><span class="earningsvalue">
                    {{$netearningsmonthly}}
                </span></p>
        </div>

        <div class="userscard">
            <h4>Orders Received</h4>
            <p class="userstitle"><span class="earningsvalue">
                    {{$monthlyorders}}
                </span></p>
        </div>

        <div class="userscard">
            <h4>Monthly Users</h4>
            <p class="userstitle"><span class="earningsvalue">
                    {{$monthlyusers}}

                </span></p>
        </div>
        <div class="userscard">
            <h4>Monthly Profit</h4>
            <p class="userstitle">
                <span class="earningsvalue">
                    {{ $netearningsmonthly*0.15}}
                </span></p>
        </div>
        <br>
        <br>
        <h2 class="dashboardheading">Daily</h2>
        <div class="userscard">
            <h4>Net Earnings</h4>
            <p class="userstitle"><span class="earningsvalue">
                    {{ $netearningsdaily }}
                </span></p>
        </div>

        <div class="userscard">
            <h4>Orders Received</h4>
            <p class="userstitle"><span class="earningsvalue">

                    {{ $dailyorders }}
                </span></p>
        </div>

        <div class="userscard">
            <h4>Today's Users</h4>
            <p class="userstitle"><span class="earningsvalue">

                    {{ $dailyusers}}

                </span></p>
        </div>
        <div class="userscard">
            <h4>Today's Profit</h4>
            <p class="userstitle"><span class="earningsvalue">
                    @php echo "$" . $netearningsdaily * 0.15; @endphp


                </span></p>
        </div>
        <!-- <div class="userscard">
                        <h4>New Reviews</h4>
                        <p class="userstitle">3000</p>
                    </div> -->
    </div>
    <div id="usercards" class="trendingorders">
        <br><br><br>
        <h3>Trending Orders</h3>
        <div class="userscard">
            <div>
                <img src="..\Images\burguer1.png" alt="">
                <p class="menulatestburgerdivpdashboard">Mixta</p>
                <p class="menulatestburgerdivp2dashboard">$11.90</p>
                <h5>Orders Per Day: 300</h5>
            </div>
        </div>

        <div class="userscard">
            <div>
                <img src="..\Images\burguer2.png" alt="">
                <p class="menulatestburgerdivpdashboard">Pollo</p>
                <p class="menulatestburgerdivp2dashboard">$11.90</p>
                <h5>Orders Per Day: 300</h5>
            </div>
        </div>

        <div class="userscard">
            <div>
                <img src="..\Images\burguer2.png" alt="">
                <p class="menulatestburgerdivpdashboard">Pollo</p>
                <p class="menulatestburgerdivp2dashboard">$11.90</p>
                <h5>Orders Per Day: 300</h5>
            </div>
        </div>
        <div class="userscard">
            <div>
                <img src="..\Images\burguer2.png" alt="">
                <p class="menulatestburgerdivpdashboard">Pollo</p>
                <p class="menulatestburgerdivp2dashboard">$11.90</p>
                <h5>Orders Per Day: 300</h5>
            </div>
        </div>
        <br><br><br>

    </div>
</main>
@endsection