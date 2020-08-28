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
    <div style="width: 40%;">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <script>
        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
        }

        var set = {
            negative: [
                -.5,
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
                getRandomInt(-14, 0),
            ],
            positive: [
                .5,
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
                getRandomInt(14),
            ],
            colors: [
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
            ]
        }

        var myChartData = {
            labels: ['Flexibiliteit', 'Onafhankelijkheid', 'Varieteit', 'Emontionele Controle', 'Doelgerichtheid', 'Punctualiteit', 'Conformiteit', 'Dilemma', 'Sociabileit', 'Altruisme', 'Overtuigingskracht', 'Prestatiemotivatie', 'Erkenning', 'Leiderschap'],
            datasets: [{
                    label: 'Min',
                    stack: 1,
                    order: 0,
                    backgroundColor: set.colors,
                    data: set.negative,
                    barPercentage: 0.6,
                    categoryPercentage: 1,
                },
                {
                    label: 'Max',
                    stack: 1,
                    order: 1,
                    backgroundColor: set.colors,
                    data: set.positive,
                    barPercentage: 0.6,
                    categoryPercentage: 1,
                },
            ]
        };

        window.onload = function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: myChartData,
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
                            }
                        }]
                    }
                }
            });
        };
    </script>
</body>

</html>