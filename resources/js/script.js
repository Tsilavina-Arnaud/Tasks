import './bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css'
import Chart from 'chart.js/auto'
import CircleProgress from 'js-circle-progress'
import Swal from 'sweetalert2'

//Ajax for fill in the chart when the page is loaded
$(function() {
  $.ajax({
    type: "GET",
    url: "/tasks/accomplished",
    dataType: "json",
    success: function (response) {     
      createChart(response)
    }
  });

  //Ajax for fill in the chart when user change the '#yearSelect' 
  const yearSelected = $('#yearSelected')
  yearSelected.change(function(e){
    $.ajax({
      type: 'GET',
      url: '/tasks/accomplished',
      dataType: 'json',
      data: {yearSelected: yearSelected.val()},
      success: function(data) {
        $('#taskAccomplished').remove();
        const canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'taskAccomplished')
        $('#canvas').append(canvas)
        createChart(data)
      }
    })
  })
})



function createChart(response) {
  let month = []
  let data = []
  response.labels.forEach(months => {
    month.push(months.month)
  });
  
  response.datas.forEach(count => {
    data.push(count.count)
  });

  const ctx = document.getElementById('taskAccomplished').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: month,
      datasets: [{
        label: 'Les tâche accomplis',
        data: data,
        borderWidth: 1,
        backgroundColor: 'rgba(255, 99, 132, 0.2)'
      }]
    },
    options: {
      layout: {
        padding: 10
      },
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
        },
        r: {
          ticks: {
            backdropPadding: {
              x: 10,
              y: 4
            }
          }
        }
      }
    }
  });
}

const cp = new CircleProgress()

const monthsSelected = document.getElementById('month')
monthsSelected.addEventListener('change', function(e) {
  document.getElementById('submitSelect').click()
})



