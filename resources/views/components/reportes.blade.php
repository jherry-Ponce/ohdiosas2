
  


    <script>
        
       
        var datas ={{json_encode($ventas)}}  
            
            new Chart(document.getElementById("chartjs-1"), {
                
            "type": "pie",
            "data": {
            "labels": ['Online','tienda'],
            "datasets": [{
                "label": "Ventas",
                "data": datas,
                "fill": true,
                "showLine":true,
                "backgroundColor": ["rgba(124,252,0, 0.2)", "rgba(255, 99, 132, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                "borderColor": ["rgb(124,252,0)", "rgb(255, 99, 132)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                "borderWidth": 1
            }]
            },
            "options": {
            "scales": {
                "yAxes": [{
                    "ticks": {
                        "beginAtZero": true
                    }
                }]
            }
            }
            })
           
    </script>
