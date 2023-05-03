import { writable, get } from 'svelte/store'
import { browser } from '$app/environment';
let data;
let datases;
let getdata;
let datadb;
let getdatases;

   

    data = writable(browser && localStorage?._data ? JSON.parse(localStorage.getItem('_data')) : {})
    datases = writable((browser && sessionStorage.datases) ?? JSON.parse(sessionStorage.getItem('_datases')) )
    getdata = get(data);
    getdatases = get(datases);
    datadb = writable({});
    // console.log("salam",datases)


export {data}
export {datases}
export {getdata}
export {getdatases}
export {datadb}

