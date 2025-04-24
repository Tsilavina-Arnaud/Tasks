import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css'



const status = document.querySelectorAll('.task-status')
status.forEach((taskS) => {
    taskS.addEventListener('click', function(e) {
        let taskName = e.originalTarget.innerHTML.trim().split(' ')
        let taskContent = document.getElementsByClassName('task-content')
        for (let i = 0; i < taskContent.length; i++) {
            taskContent[i].style.display = 'none'
        }
        let taskStatusBtn = document.getElementsByClassName('task-status')
        for (let j = 0; j < taskStatusBtn.length; j++) {
            taskStatusBtn[j].className = taskStatusBtn[j].className.replace(' active-task-status', '')
        }
        document.getElementById(taskName.join('')).style.display = 'block'
        e.currentTarget.className += ' active-task-status'
    })
})
document.getElementById('defaultStatus').click()

