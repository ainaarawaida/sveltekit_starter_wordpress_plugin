import { writable, get } from 'svelte/store'
import { browser } from '$app/environment';
export let data;
export let datases;
export let getdata;
export let datadb;
if (browser) {

    data = writable(localStorage?._data ? JSON.parse(localStorage.getItem('_data')) : {})
    datases = writable(sessionStorage?._data ? JSON.parse(sessionStorage.getItem('_datases')) : {})
    getdata = get(data);
    datadb = writable({});
}
