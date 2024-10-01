<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Style -->
<style type="text/css">
.label-box {
  border: 1px solid white;
  display: flex;
  min-height: 30px;
  min-width: 30px;
  width: 100%;
  text-align: center;

}

.label-text{
  font-size: 0.8rem;
}

#chart-wrapper {
    display: inline-block;
    position: relative;
    font-size: 300px;
    width: 100%;
  }

  #container {
    min-width: 310px;
    max-width: 800px;
    height: 400px;
    margin: 0 auto;
}

.buttons {
    min-width: 310px;
    text-align: center;
    margin: 1rem 0;
    font-size: 0;
}

.buttons button {
    cursor: pointer;
    border: 1px solid silver;
    border-right-width: 0;
    background-color: #f8f8f8;
    font-size: 1rem;
    padding: 0.5rem;
    transition-duration: 0.3s;
    margin: 0;
}

.buttons button:first-child {
    border-top-left-radius: 0.3em;
    border-bottom-left-radius: 0.3em;
}

.buttons button:last-child {
    border-top-right-radius: 0.3em;
    border-bottom-right-radius: 0.3em;
    border-right-width: 1px;
}

.buttons button:hover {
    color: white;
    background-color: rgb(158 159 163);
    outline: none;
}

.buttons button.active {
    background-color: #0051b4;
    color: white;
}
</style>
</head>
<body>
<script src="<?= base_url('assets/highchart') ?>/code/highcharts.js"></script>
<script src="<?= base_url('assets/highchart') ?>/code/modules/exporting.js"></script>
<script src="<?= base_url('assets/highchart') ?>/code/modules/export-data.js"></script>
<script src="<?= base_url('assets/highchart') ?>/code/modules/accessibility.js"></script>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 bg-warning py-2">
                <h1 style="color: white;">PERFORMANCE MANAGEMENT</h1>
            </div>
            <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                <ol class="breadcrumb  float-sm-left">
                    <li class="breadcrumb-item"><a href="<?=base_url('performance_management/dashboard')?>">PERFORMANCE MANAGEMENT</a></li>
                    <li class="breadcrumb-item text-white">MEDICAL CHECKUP</li>
                    <li class="breadcrumb-item text-white">MCU PERFORMANCE</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <!--TAB-->
        <ul class="nav nav-tabs bg-secondary " id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
            <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup')?>">INPUT DATA PERSONAL MCU</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>">PERSONAL MCU RECORD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn btn-flat active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_perf')?>">MCU PERFORMANCE</a>
            </li>
        </ul>
        <!--/.TAB-->

        <!--TAB CONTENT-->
        <div class="tab-content">

            <!--MCU PERFORMANCE-->
            <div>
                <!-- form -->
                    <!--card body-->
                    <div class="card-body" style="background-color: #77a0e6;">

                        <div class="card col-lg-12" style="background-color: aliceblue;">
                            <div class="row justify-content-md-center m-2">
                                
                                <div class="card-body">
                                <div class='buttons' id="json_html">
                                    <!-- <button id='2000'>
                                        2000
                                    </button>
                                    <button id='2004'>
                                        2004
                                    </button>
                                    <button id='2008'>
                                        2008
                                    </button>
                                    <button id='2012'>
                                        2012
                                    </button>
                                    <button id='2016'>
                                        2016
                                    </button>
                                    <button id='2020' class='active'>
                                        2020
                                    </button> -->
                                    
                                    </div>
                                    <div class="chart">
                                        <div id="container"></div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button>

                    </div>
                    <!-- /.card-body -->
            </div>
            <!--/.MCU PERFORMANCE-->
        </div>
    </div>
</section>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
    console.log( "ready!" );
    
});

    var dataAjax = [];
    $.ajax({
        url: "<?= base_url('performance_management/Medical_checkup/toprank') ?>",
        type: 'post',
        dataType: 'json',
        success: function(response) {
            dataAjax = response;
            console.log(response);
            let htmlx = '';
            let dataarray = [];
            let vb =0;
            $.each(response, function( index, value ) {
            // alert( index + ": " + value );
                $.each(value, function( i, val ) {
                   dataarray[index] = [i, val];
                //    vb++;
                })
                let km = '';
                if(index == 2023){
                    km = 'active';
                }
                htmlx +='<button id="'+ index +'" class="'+ km +'">'+ index +'</button>';
            });
            $('#json_html').html(htmlx);
            console.log(dataarray);
            locations.forEach(location => {
            const btn = document.getElementById(location.year);

            btn.addEventListener('click', () => {

                document.querySelectorAll('.buttons button.active')
                    .forEach(active => {
                        active.className = '';
                    });
                btn.className = 'active';

                chart.update({
                    // title: {
                    //     text: 'Summer Olympics ' + location.year +
                    //         ' - Top 5 countries by Gold medals'
                    // },
                    // subtitle: {
                    //     text: 'Comparing to results from Summer Olympics ' +
                    //         (location.year - 1) + ' - Source: <a href="https://olympics.com/en/olympic-games/'  + (location.year) + '/medals" target="_blank">Olympics</a>'
                    // },
                    series: [{
                        name: location.year - 1,
                        // data: dataPrev[location.year].slice()
                    }, {
                        name: location.year,
                        data: getData(data[location.year]).slice()
                    }]
                }, true, false, {
                    duration: 800
                });
            });
            });
        }       
    })
const dataPrev = {
// 2023: [
//     ['kr', 9],
//     ['jp', 12],
//     ['au', 8],
//     ['de', 17],
//     ['ru', 19],
//     ['cn', 26],
//     ['gb', 27],
//     ['us', 46]
// ],
// 2022: [
//     ['kr', 13],
//     ['jp', 7],
//     ['au', 8],
//     ['de', 11],
//     ['ru', 20],
//     ['cn', 38],
//     ['gb', 29],
//     ['us', 47]
// ],
// 2021: [
//     ['kr', 13],
//     ['jp', 9],
//     ['au', 14],
//     ['de', 16],
//     ['ru', 24],
//     ['cn', 48],
//     ['gb', 19],
//     ['us', 36]
// ],
// 2020: [
//     ['kr', 9],
//     ['jp', 17],
//     ['au', 18],
//     ['de', 13],
//     ['ru', 29],
//     ['cn', 33],
//     ['gb', 9],
//     ['us', 37]
// ],
// 2019: [
//     ['kr', 8],
//     ['jp', 5],
//     ['au', 16],
//     ['de', 13],
//     ['ru', 32],
//     ['cn', 28],
//     ['gb', 11],
//     ['us', 37]
// ]
};

const data = {
// 2023: [
//     ['kr', 6],
//     ['jp', 27],
//     ['au', 17],
//     ['de', 10],
//     ['ru', 20],
//     ['cn', 38],
//     ['gb', 22],
//     ['us', 39]
// ],
// 2022: [
//     ['kr', 9],
//     ['jp', 12],
//     ['au', 8],
//     ['de', 17],
//     ['ru', 19],
//     ['cn', 26],
//     ['gb', 27],
//     ['us', 46]
// ],
// 2021: [
//     ['kr', 13],
//     ['jp', 7],
//     ['au', 8],
//     ['de', 11],
//     ['ru', 20],
//     ['cn', 38],
//     ['gb', 29],
//     ['us', 47]
// ],
// 2020: [
//     ['kr', 13],
//     ['jp', 9],
//     ['au', 14],
//     ['de', 16],
//     ['ru', 24],
//     ['cn', 48],
//     ['gb', 19],
//     ['us', 36]
// ],
// 2019: [
//     ['kr', 9],
//     ['jp', 17],
//     ['au', 18],
//     ['de', 13],
//     ['ru', 29],
//     ['cn', 33],
//     ['gb', 9],
//     ['us', 37]
// ]

};

const countries = {
kr: {
    name: 'South Korea',
    color: 'rgb(201, 36, 39)'
},
jp: {
    name: 'Japan',
    color: 'rgb(201, 36, 39)'
},
au: {
    name: 'Australia',
    color: 'rgb(0, 82, 180)'
},
de: {
    flag: 'de',
    color: 'rgb(0, 0, 0)'
},
ru: {
    name: 'Russia',
    color: 'rgb(240, 240, 240)'
},
cn: {
    name: 'China',
    color: 'rgb(255, 217, 68)'
},
gb: {
    name: 'Great Britain',
    color: 'rgb(0, 82, 180)'
},
us: {
    name: 'United States',
    color: 'rgb(215, 0, 38)'
}
};

// Add upper case country code
for (const [key, value] of Object.entries(countries)) {
value.ucCode = key.toUpperCase();
}


const getData = data => data.map(point => ({
name: point[0],
y: point[1],
color: countries[point[0]].color
}));

const chart = Highcharts.chart('container', {
chart: {
    type: 'column'
},
// Custom option for templates
countries,
title: {
    // text: 'Summer Olympics 2020 - Top 5 countries by Gold medals',
    align: 'left'
},
subtitle: {
    // text: 'Comparing to results from Summer Olympics 2016 - Source: <a ' +
    //     'href="https://olympics.com/en/olympic-games/tokyo-2020/medals"' +
    //     'target="_blank">Olympics</a>',
    align: 'left'
},
plotOptions: {
    series: {
        grouping: false,
        borderWidth: 0
    }
},
legend: {
    enabled: false
},
tooltip: {
    shared: true,
    headerFormat: '<span style="font-size: 15px">' +
        '{series.chart.options.countries.(point.key).name}' +
        '</span><br/>',
    pointFormat: '<span style="color:{point.color}">\u25CF</span> ' +
        '{series.name}: <b>{point.y} medals</b><br/>'
},
xAxis: {
    type: 'category',
    accessibility: {
        description: 'Countries'
    },
    max: 4,
    labels: {
        useHTML: true,
        animate: true,
        format: '{chart.options.countries.(value).ucCode}<br>' +
            '<span class="f32"><span class="flag {value}"></span></span>',
        style: {
            textAlign: 'center'
        }
    }
},
yAxis: [{
    title: {
        text: 'Gold medals'
    },
    showFirstLabel: false
}],
series: [{
    color: 'rgba(158, 159, 163, 0.5)',
    pointPlacement: -0.2,
    linkedTo: 'main',
    // data: dataPrev[2020].slice(),
    name: '2019'
}, {
    name: '2023',
    id: 'main',
    dataSorting: {
        enabled: true,
        matchByName: true
    },
    dataLabels: [{
        enabled: true,
        inside: true,
        style: {
            fontSize: '16px'
        }
    }],
    data: getData(data[2023]).slice()
}],
exporting: {
    allowHTML: true
}
});

const locations = [
{
    // city: 'Tokyo',
    year: 2023
}, {
    // city: 'Rio',
    year: 2022
}, {
    // city: 'London',
    year: 2021
}, {
    // city: 'Beijing',
    year: 2020
}, {
    // city: 'Athens',
    year: 2019
}
];


</script>
</body>