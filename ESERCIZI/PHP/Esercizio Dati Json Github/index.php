<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .list, .responseRequest {
            font-size: 22px;
        }

        .status-200 {
            color: green;
        }
        </style>
</head>
<body>
    <a href="#" class="apiBtn">
        <button type="submit">Click Here</button>
    </a>

    <div class="responseRequest"></div>

    <ul class="list"></ul>
    

    <script>
        function renderUser(data) {
            
            //let contentDiv = document.querySelector('.responseRequest').innerHTML = `<br>Status: ${data.status}  <br>Message: ${data.message}`
            let contentDiv = document.querySelector('.responseRequest').innerHTML = `<br>Status: <span class="status-200"> ${data.status} </span> <br> Message: <span class="status-200"> ${data.message} </span>`

            let listContainer = document.querySelector('.list') 

            for (let i = 0; i < data.payload.length; i++) {
                //console.log(data.payload.[i].name)

                let listItem = document.createElement('li')
                listItem.innerHTML = data.payload[i].name
                
                listContainer.appendChild(listItem)
            }
        }

        document.querySelector('.apiBtn').addEventListener('click', function(){
            fetch('users.php')
                .then(function (response) {
                    return response.json();
                })

                .then(function (data) {
                    console.log(data)
                    console.log(data.status)
                    console.log(data.message)

                    renderUser(data);
                })

                .catch(function (error) {
                    error = 'Piteo ha cacato il cazzo con le sue domande di merda';
                    console.error('Error: ' + error);
                })
        })
    </script>


</body>
</html>