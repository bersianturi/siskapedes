var ctx = document.getElementById("chart-perangkat_desa");
              var myBarChart = new Chart(ctx, {
                type: "bar",
                data: {
                  labels: [<?= $jabatan; ?>],
                  datasets: [{
                    label: "Perangkat Desa",
                    backgroundColor: "#4e73df",
                    data: [<?= $jumlah_perangkat; ?>],
                  }, ],
                },
                options: {
                  scales: {
                    xAxes: [{
                      ticks: {
                        autoSkip: false
                      },
                      gridLines: {
                        display: false,
                      },
                      barPercentage: 0.5
                    }, ],
                    yAxes: [{
                      ticks: {
                        min: 0,
                        callback: function(val) {
                          return Number.isInteger(val) ? val : null;
                        }
                      },
                      gridLines: {
                        display: false,
                      },
                    }, ],
                  },
                  legend: {
                    display: false,
                  },
                },
              });