<canvas id="grafico" width="400" height="200"></canvas>
<?php
session_start();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.1.0"></script>

<script>
    var chartGraph;

    function atualizarTeste() {
   
        fetch('getData.php')
            .then(response => response.json()) 
            .then(data => {
                var ValorTeste = data.varTeste;
                var horarioTeste = data.varHorarioTeste;

            
                if (chartGraph) {
                    chartGraph.data.labels = horarioTeste;
                    chartGraph.data.datasets[0].data = ValorTeste;
                    chartGraph.update();
                } else {

                    var ctx = document.getElementById("grafico").getContext("2d");

                    const config = {
                        type: 'line',
                        data: {
                            labels: horarioTeste,
                            datasets: [{
                                label: "Medições das Vibrações",
                                data: ValorTeste,
                                borderWidth: 3,
                                borderColor: 'rgba(77,162,252,0.85)',
                                backgroundColor: "transparent",
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                annotation: {
                                    annotations: {
                                        linhaDemarcacao: {
                                            type: 'line',
                                            yMin: 0.6,
                                            yMax: 0.6,
                                            borderColor: 'rgba(255, 99, 132, 0.85)',
                                            borderWidth: 2,
                                            label: {
                                                content: 'Meta 1',
                                                enabled: true,
                                                position: 'end'
                                            }
                                        },
                                        linhaDemarcacao2: {
                                            type: 'line',
                                            yMin: 1.4,
                                            yMax: 1.4,
                                            borderColor: 'rgba(255, 99, 132, 0.85)',
                                            borderWidth: 2,
                                            label: {
                                                content: 'Meta 2',
                                                enabled: true,
                                                position: 'end'
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    };

                    chartGraph = new Chart(ctx, config);
                }
            })
            .catch(error => console.error('Erro ao buscar os dados:', error));
    }

    setInterval(atualizarTeste, 1000);

    atualizarTeste();
</script>

