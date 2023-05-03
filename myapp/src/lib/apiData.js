
const apiData = async (inputs, user) =>{

    let dataArray = new FormData();
    let dataHeader = new Headers();

    for (let input of Object.keys(inputs, user) ){
      dataArray.append(input, inputs[input]);
    }
    dataArray.append("user_email", user.user_email);
    dataHeader.append("Authorization", `Bearer ${user.token}`);

    let getFetch = await fetch(
        `${import.meta.env.VITE_AUTHURL}/wp-json/jwt-auth/data`,
        {
            method: 'POST',
            body: dataArray,
            headers: dataHeader,
        }
    );

    if (getFetch.ok == true) {
        let getFetchData = await getFetch.json();
        return JSON.parse(getFetchData) ;
    } else {
        return "error" ;
    }

}

export {apiData}