//Custom Fetch Request
const icFETCH = (url, datar, csrf) => {
    return (new Promise((resolve, reject) => {

        //Fetch Api to send a request
        fetch(url, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': csrf
            }
        })
        .then(res => {
            if (res.status == 200)
                return res.text();
            else
                reject("An error occured please try again [Recieved Status != 200]!");
        })
        .then(text => {
            //Get results and convert them to an object
            const res = JSON.parse(text);
            //if ststus is true print success and locate to a different page else print error
            resolve(res);
        })
        .catch(res => {
            //Print any error related to sending request
            reject(`icFETCH Catch -> ${res}`);
        });
    }));
}

// Start User Registration

const AppRegister = () => {
    document.getElementById("reg-btn").style.display = "none";
    const name = document.getElementById("reg-fullname").value;
    const username = document.getElementById("reg-username").value;
    const email = document.getElementById("reg-email").value;
    const password = document.getElementById("reg-password").value;
    let csrf = "zxcvb";

    if (!name || !username || !email || !password){
        alert("All fields required!");
        document.getElementById("reg-btn").style.display = "inline";
        return ;
    }

    if (name.length < 3 || username.length < 3 || email.length < 3 || password.length < 3){
        alert("Name & Surname, Username, Email Address and Password must be more than 2 charecters long!");
        document.getElementById("reg-btn").style.display = "inline";
        return ;
    }

    
    //Call custome Fetxh
    icFETCH(`/register/email/${email}/password/${password}/name/${name}/username/${username}`, {}, csrf)
    .then(data => {
        const alertSuccessMSG = `<div class="alert alert-success"><strong>Success!</strong> Registration was successful. You may login.
          </div>`;

        if (data.status) 
        {
            document.getElementById("reg-container").innerHTML = alertSuccessMSG;
        }
        if (data.status == 0)
        {
            document.getElementById("reg-container").innerHTML = alertSuccessMSG;
            document.getElementById("reg-btn").style.display = "inline";
            alert(alert(data.message));
        } 
    })
    .catch(error => {
        alert(`An error occured: Please try registering again with a different email address!`);
        document.getElementById("reg-btn").style.display = "inline";
    });
}

// End User Registration