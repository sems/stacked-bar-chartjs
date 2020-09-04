<!doctype html>
<html>

<head>
    <title>Stacked Bar Chart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
</head>

<body>
    <div style="width: 45%;">
        <canvas id="pers" width="400" height="400"></canvas>
        <canvas id="cap" width="400" height="400"></canvas>
    </div>
    <script>
        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
        }

        var set = {
            negative: [
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
                getRandomInt(-12, 0),
            ],
            positive: [
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
                getRandomInt(12),
            ],
            baseNegative: [
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
                -.5,
            ],
            basePositive: [
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
                .5,
            ],
            colours: [
                'rgba(247, 210, 52, 1)',
                'rgba(247, 210, 52, 1)',
                'rgba(247, 210, 52, 1)',
                'rgba(31, 126, 173, 1)',
                'rgba(31, 126, 173, 1)',
                'rgba(31, 126, 173, 1)',
                'rgba(31, 126, 173, 1)',
                'rgba(0, 170, 101, 1)',
                'rgba(0, 170, 101, 1)',
                'rgba(0, 170, 101, 1)',
                'rgba(237, 95, 24, 1)',
                'rgba(237, 95, 24, 1)',
                'rgba(237, 95, 24, 1)',
                'rgba(237, 95, 24, 1)',
            ],
            horizontalColours: [
                'rgba(255, 231, 6, 0.8)',
                'rgba(39, 119, 204, .8)',
                'rgba(255, 35, 33, .8)',
            ]
        }



        var perTestData = {
            labels: ['Flexibiliteit', 'Onafhankelijkheid', 'Varieteit', 'Emontionele Controle', 'Doelgerichtheid', 'Punctualiteit', 'Conformiteit', 'Dilemma', 'Sociabileit', 'Altruisme', 'Overtuigingskracht', 'Prestatiemotivatie', 'Erkenning', 'Leiderschap'],
            datasets: [{
                    label: 'Min',
                    stack: 1,
                    order: 3,
                    backgroundColor: set.colours,
                    data: set.negative,
                    barPercentage: 0.6,
                    categoryPercentage: 1,
                },
                {
                    label: 'Max',
                    stack: 1,
                    order: 2,
                    backgroundColor: set.colours,
                    data: set.positive,
                    barPercentage: 0.6,
                    categoryPercentage: 1,
                },
                // {
                //     label: '',
                //     stack: 1,
                //     order: 1,
                //     backgroundColor: set.colours,
                //     borderColor: 'rgba(255,255,255,0.0)',
                //     borderSkipped: 'false',
                //     data: set.baseNegative,
                //     barPercentage: 1,
                // },
                // {
                //     label: '',
                //     stack: 1,
                //     order: 0,
                //     backgroundColor: set.colors,
                //     borderColor: 'rgba(255,255,255,0.0)',
                //     borderSkipped: 'false',
                //     data: set.basePositive,
                //     barPercentage: 1,
                // }
            ]
        };

        var capTestData = {
            labels: ['Abstract', 'Numeriek', 'Verbaal'],
            datasets: [{
                label: 'Aantal goed',
                order: 0,
                data: [
                    5,
                    15,
                    13,
                ],
                backgroundColor: set.horizontalColours
            }, {
                label: 'Aantal vragen',
                order: 0,
                data: [
                    1,
                    0,
                    2,
                ],
                borderColor: set.horizontalColours,
                borderWidth: 2,
                backgroundColor: 'rgba(255,255,255,0.1)'
            }]
        }

        window.onload = function() {
            var ctx = document.getElementById('pers').getContext('2d');
            window.persTestBar = new Chart(ctx, {
                type: 'bar',
                data: perTestData,
                options: {
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    legend: {
                        display: false,
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        }],

                        yAxes: [{
                            stacked: true,
                            ticks: {
                                maxTicksLimit: 30,
                                suggestedMax: 15
                            },
                        }]
                    }
                }
            });

            // let ScaleCapaciteit = Chart.Scale.extend({
            //     left: 0,
            //     right: 15
            // });

            // Chart.scaleService.registerScaleType('ScaleCapaciteit', ScaleCapaciteit, defaultConfigObject);

            var rtx = document.getElementById('cap').getContext('2d');
            window.capTestBar = new Chart(rtx, {
                type: 'horizontalBar',
                data: capTestData,
                options: {
                    legend: {
                        display: true,
                        labels: {
                            fontColor: 'rgb(255, 99, 132)'
                        }
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            // type: 'ScaleCapaciteit'
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                maxTicksLimit: 15,
                                suggestedMax: 15
                            },
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        }]
                    }
                }
            })
        };
    </script>
</body>

</html>