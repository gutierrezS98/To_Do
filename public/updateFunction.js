let url = window.location.href;
let id = url.split("/").pop();

//This fetch will show data of a specific ID
fetch('/api/tasks/' + id)
    .then((response) => response.json())
    .then((data) => {
        let output = '';
        console.log(data);
        output += `
                    <form id='editTask' class='mt-4'>
                    <div class='form-group'>
                        <input class= 'form-control' type="text" id="bodyTask" placeholder="Edit Task" value=${data.data.body} />
                    </div>
                     <input class='btn btn-success' type="submit" value="Edit Task" id='edit_${data.data.id}' onClick="updateTask(this.id,event)" />
                    <button class='btn btn-secondary' type="button" id='cancel_${data.data.id}'> <a href=/>Cancel</a> </button> 
                    </form>
                `;
        document.getElementById('output').innerHTML = output;
    })

function updateTask(fullid, event) {
    event.preventDefault();
    let id = fullid.split("_").pop();
    let taskBody = document.getElementById('bodyTask').value;
    console.log(taskBody);
    console.log(id);
    fetch('/api/tasks/' + id, {
        method: 'PUT',
        headers: {
            "Content-type": "application/json"
        },
        body: JSON.stringify({ body: taskBody })
    })
        .then(response => response.json())
        .then(data => console.log(data))
}