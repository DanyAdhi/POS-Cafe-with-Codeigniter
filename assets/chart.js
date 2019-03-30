var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November", "December"],
        datasets: [
          {
            label: "My First dataset",
            fillColor: "rgba(175,238,239,.3)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 50, 45, 50, 60, 65, 59, 65, 70, 65, 74]
          },
        ]
      };
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);