@extends("layouts.index")
@section("title")
User stats
@endsection
@section("content")
<div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
                <div class="m-portlet m-portlet--full-height  container-fluid">
                        <div class="m-portlet__body">
                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                        <li class="m-nav__section m--hide">
                                            <span class="m-nav__section-text">Section</span>
                                        </li>
                                       
                                        <li class="m-nav__item">
                                                <h2>Physics<span style="font-size:15px;">(Overall rating:4.3/5)</span></h2><br>
                                                <h4 style="text-indent:10px;">Number of questions posted : 30</h4>
                                                <h4 style="text-indent:10px;">Number of questions answered : 14</h4>
                                                <h5 style="text-indent:20px;">Correctly answered questions : 9</h5>
                                                <h5 style="text-indent:20px;">Wrong answered questions : 5</h5>
                                        </li>
                                        <br>
                                        <canvas id="myChart"></canvas>


                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                        <li class="m-nav__section m--hide">
                                            <span class="m-nav__section-text">Section</span>
                                        </li>
                                       
                                        <li class="m-nav__item">
                                                <h2>Maths</h2>
                                        </li>
                    

                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                        
                    
                                    </ul>
            
                        </div>
                    </div>
            
        </div>
</div>

<script>
        var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Physics performance',
            backgroundColor: 'rgb(255, 99, 132,0)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
					

@endsection

