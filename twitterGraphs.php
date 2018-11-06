<html>
  <head>
    <title>Testing</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/4.0/1/MicrosoftAjax.js"></script>

    <script type="text/javascript">
        function plz(){
            var input = document.getElementById("userInput").value;
            var input2 = document.getElementById("userInput2").value;

            $.post('getChartHashTags.php', {input: input, input2: input2}, function(data){

                var toInt = parseInt(data[0]);
                var toInt2 = parseInt(data[1]);
                var string2array = JSON.parse(data);

                $('#toBe').html(string2array[0] + " " + input + "'s found" +" - AND - " + string2array[1] + " " + input2 + "'s found.");  //THIS HAS TO BE .html TO OUTPUT THE HTML SO THE BROWSER CAN INTERPRET IT, use "text" or w/e other tags for other types of output
                
                var ctx = document.getElementById('myChart').getContext('2d');
                ctx.height = 500;
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: [input, input2],
                    datasets: [{
                      label: "Number of instances found",
                      data: [string2array[0], string2array[1], 0],
                      options: {
                        "responsive": true,
                        "maintainAspectRatio": false,
                      },
                      backgroundColor: "rgba(153,255,51,0.6)"
                    }]
                  }
                });
            });       
        }

    </script>

  </head>
  <body>



    <form id="form" onsubmit="return false;">
        <input type="text" id="userInput" />
        <input type="text" id="userInput2" />
    </form>


    <button onclick="plz()">Search Twitter!</button>

    <div id="toBe">Input 2 hashtags or serach terms</div>


    <h2>Twitter Search comparator.</h2>

    <div style="width:500px; height:500px;">
      <canvas id="myChart"></canvas>
    </div>

  </body>
</html>