    function CargarDatosGraficoBar(){
        
    }
    
    var graficas =[];
    var valores=[];
    $(document).ready(function(){
        $.ajax({
            url: '/admin/graficas/all',
            method: 'POST',
            data:{
                id:1,
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res){
            var arreglo = JSON.parse(res);
         
            console.log(arreglo);
            for(var x=0;x<arreglo.length;x++){           
                    graficas.push(arreglo[x].fecha);
                    valores.push(arreglo[x].checkouts);
                    generarGrafica();
            }
            
        });
        
    });
    

    function generarGrafica(){
         
        var tipoGrafica = document.getElementById("tipoGrafica").value;
        switch (tipoGrafica) {
        case 'bar':
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: graficas,
                    datasets: [{
                        label: 'Checkins',
                        data: valores,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
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
            
            break;
        case 'line': 
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: graficas,
                    datasets: [{
                        label: 'My Firts  dataset',
                        backgroundColor:'rgb(0,176,80)',
                        borderColor:'rgb(0,176,80)',
                        data: valores,
                        fill:false,
                        borderWidth:1,
                        pointStyle:'point'
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
            break; //
        case 'pie': 
            var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: graficas,
                        datasets: [{
                            label: 'My Firts  dataset',
                            backgroundColor:'rgb(0,176,80)',
                            borderColor:'rgb(0,176,80)',
                            data: valores,
                            fill:false,
                            borderWidth:1,
                            pointStyle:'point'
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
            break; // Al encontrar un "break", no será ejecutado el 'case 2:'
        case 'scatter':
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'scatter',
                    data: {
                        labels: graficas,
                        datasets: [{
                            label: 'My Firts  dataset',
                            backgroundColor:'rgb(0,176,80)',
                            borderColor:'rgb(0,176,80)',
                            data: valores,
                            fill:false,
                            borderWidth:1,
                            pointStyle:'point'
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
            break;
        default:
            console.log('default');
        }

       
    }
