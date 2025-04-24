import Swal from 'sweetalert2'
import 'datatables.net-dt/css/dataTables.dataTables.min.css'
import DataTable from 'datatables.net-dt'
import 'bootstrap-icons/font/bootstrap-icons.css'

const taskTitle = document.getElementById('title');
const taskDescription = document.getElementById('description');
const taskBeginAt = document.getElementById('begin_at');
const taskHourBeginAt = document.getElementById('hour_begin_at');
const taskFinishedAt = document.getElementById('finished_at');
const taskHourFinishedAt = document.getElementById('hour_finished_at');
const observationId = document.getElementById('observation_id');
const taskForm = document.getElementById('taskAdd');

const errorMessage = {
  'title': 'Erreur',
  'icon': 'error',
  'text': 'Vérifier bien la date pour le début et la terminaison de votre tâche',
  'confirmButtonText': 'D\'accord'
};

validateTaskForm(taskForm);
const taskFormUpdate = document.getElementById('taskUpdate');

//Validation de l'ajout d'une tâche
export function validateTaskForm(form) {
    form.addEventListener('submit', (e) => {
        if (
            taskTitle.value == "" || taskDescription.value == "" || taskBeginAt.value == "" || 
            taskHourBeginAt.value == "" || taskFinishedAt.value == "" || taskHourFinishedAt.value == "" || observationId.value == ""
        ) {
            e.preventDefault()
            Swal.fire({
              'title': 'Ooops',
              'text': 'Tous ces champs sont requis. Vous devriez les remplir pour ajouter une nouvelle tâche!',
              'icon': 'info',
              'confirmButtonText': 'D\'accord'
            })
        } else {
          if (taskFinishedAt.value < taskBeginAt.value) {
            e.preventDefault()
            Swal.fire(errorMessage)
          }
        }
    })
}

new DataTable('#taskListCustom', {
  'language': {
    "lengthMenu": "_MENU_ /page",
    "info": "",
    "search": ""
  }
})

//Import user's tasks
const fileInput = document.getElementById('file')
fileInput.addEventListener('change', function (e) {
  const file = fileInput.files[0]
  if (file) {
    document.getElementById('import').click()
  }  
})
