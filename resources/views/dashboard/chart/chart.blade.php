@extends('layouts.dashboard_master')



@section('content')


  <div class="pagetitle" style="margin-top: 30px; margin-bottom: 30px;">
    <h1> <i class="bi bi-bar-chart"></i> Dashboard</h1 >
 
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Users Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

           
              <div class="card-body">
                <h5 class="card-title">Users <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $userCount }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Users Card -->

          <!-- Sub categories Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Sub categories <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-stack"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $subcategoryCount }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sub categories Card -->

          <!-- Products Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

             
              <div class="card-body">
                <h5 class="card-title">Products <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bag"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $productCount }}</h6>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Products Card -->



          <!-- Reports -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Reports <span></span></h5>
          
                <!-- Line Chart -->
                <div id="reportsChart"></div>
          
                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    // Dates, orders, and revenue passed from the controller
                    const dates = @json($dates); // Dynamic dates (X-axis)
                    const orders = @json($orders); // Dynamic orders data
                    const revenue = @json($revenue); // Dynamic revenue data
          
                    // Initialize the chart with the dynamic data
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Orders',
                        data: orders, // Dynamic orders data
                      }, {
                        name: 'Revenue',
                        data: revenue, // Dynamic revenue data
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1', '#2eca6a'], // Blue for orders, Green for revenue
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        categories: dates, // Use dates for X-axis
                      },
                      tooltip: {
                        x: {
                          format: 'yyyy-MM-dd' // Format as dates
                        },
                      }
                    }).render();
                  });
                </script>
                <!-- End Line Chart -->
              </div>
            </div>
          </div>
          
          
          <!-- End Reports -->


         

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">


   

        <!-- Orders Status -->
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title">Orders Status</h5>
        
            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
        
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Order Status',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [
                      {
                        value: {{ $pendingCount }},  // Dynamically rendered Pending count
                        name: 'Pending',
                        itemStyle: {
                          color: '#FF9F43'  // Orange for Pending
                        }
                      },
                      {
                        value: {{ $processingCount }},  // Dynamically rendered Processing count
                        name: 'Processing',
                        itemStyle: {
                          color: '#4A90E2'  // Blue for Processing
                        }
                      },
                      {
                        value: {{ $completedCount }},  // Dynamically rendered Completed count
                        name: 'Completed',
                        itemStyle: {
                          color: '#50E3C2'  // Green for Completed
                        }
                      }
                    ]
                  }]
                });
              });
            </script>
          </div>
        </div>
        <!-- End Orders Status -->

      

      </div><!-- End Right side columns -->

    </div>
  </section>



@endsection