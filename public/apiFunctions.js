document.getElementById('addTask').addEventListener('submit', addTask);

//This fetch will show all the tasks currently on the DB
fetch('/api/tasks')
    .then((response) => response.json())
    .then((data) => {
        let output = '';
        data.data.forEach(function (task) {
            output += `
                    <div class='mb-3 ml-3'>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <p> Task: ${task.body} </p>
                        <button class='btn btn-primary' type="button" id='edit_${task.id}'><a href=${task.id} >Edit</a></button>  <button class='btn btn-danger' type="button" id='delete_${task.id}' onClick="deleteTask(this.id)">Delete</button> 
                    </div>
                `;
        });
        document.getElementById('output').innerHTML = output;
    })

function addTask(e) {
    e.preventDefault();
    let taskBody = document.getElementById('bodyTask').value;
    fetch('/api/tasks', {
        method: 'POST',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-type': 'application/json'
        },
        body: JSON.stringify({ body: taskBody })
    })
        .then((response) => response.json())
        .then((data) => console.log(data))
}

function deleteTask(fullid) {
    let id = fullid.split("_").pop();
    fetch('/api/tasks/' + id, {
        method: 'DELETE'
    });
}