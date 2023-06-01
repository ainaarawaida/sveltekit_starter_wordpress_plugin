
import { goto } from '$app/navigation';
import { datases } from '$lib/store.js';
import { assets, base } from '$app/paths';
let _datases = {};

const apiData = async (inputs, user) =>{
    if(window.jQuery){
        (function ($) {
            $('.loader-wrapper').fadeOut('slow', function() {
                $(this).show();
            });
        })(jQuery);
    }

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

    if(window.jQuery){
        (function ($) {
            $('.loader-wrapper').fadeOut('slow', function() {
                $(this).hide();
            });
        })(jQuery);
    }

    
    if (getFetch.ok == true) {
        let getFetchData = await getFetch.json();
        return JSON.parse(getFetchData) ;
    } else {
        return "error" ;
    }

}

const apiDataLogin = async (username, password) =>{

    (function ($) {
        $('.loader-wrapper').fadeOut('slow', function() {
            $(this).show();
        });
    })(jQuery);

    // console.log("start", document.querySelector("#loader"));
    let dataArray = new FormData();
    dataArray.append('action', 'Login');
    dataArray.append('username', username);
    dataArray.append('password', password);

    let getFetch = await fetch(
        `${import.meta.env.VITE_AUTHURL}/wp-json/jwt-auth/v1/token?username=${
            username
        }&password=${password}`,
        {
            method: 'POST',
            body: dataArray
        }
    );

    (function ($) {
        $('.loader-wrapper').fadeOut('slow', function() {
            $(this).hide();
        });
    })(jQuery);

    let getFetchData = await getFetch.json();
    if (getFetch.ok == true) {
        datases.update((value) => {
            _datases = value || {};
            _datases.auth = true;
            _datases.user = getFetchData;
            sessionStorage.setItem('_datases', JSON.stringify(_datases));
            return _datases;
        });
     
        if(getFetchData.roles.includes('administrator')){
            goto(`${base}/admin/dashboard`);
        }else{
            goto(`${base}/user/dashboard`);
        }
      
    } else {
        return  getFetchData;
    }

}

export {apiData,apiDataLogin}