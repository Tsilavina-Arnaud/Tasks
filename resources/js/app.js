import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css'
import 'datatables.net-dt/css/dataTables.dataTables.min.css'
import DataTable from 'datatables.net-dt'
import ApexChart from 'apexcharts'
import Swup from 'swup'
import 'animate.css'
import AOS from 'aos'
import 'aos/dist/aos.css'

const usersTable = new DataTable('#users-table', {
    'language': {
    "lengthMenu": "_MENU_ /page",
    "info": "",
    "search": ""
  }
});

const deleteUser = document.querySelectorAll('.deleteUser');
deleteUser.forEach(btn => {
  btn.addEventListener('submit', function(e) {
    if (confirm('Voulez-vous supprimez cette malade?') == false) {
      e.preventDefault()
    }
  })
});

const swup = new Swup()
AOS.init()

