export function loadScript(src,myid) {
    return new Promise((resolve, reject) => {

        const elements = document.getElementsByClassName(myid+"mysveltescriptid");
        while(elements.length > 0){
            elements[0].parentNode.removeChild(elements[0]);
        }

        const script = document.createElement('script');
        script.src = src;
        script.classList.add(myid+"mysveltescriptid");
 
        document.body.appendChild(script);
 
        script.addEventListener('load', () => resolve(script));
        script.addEventListener('error', () => reject(script));
    });
}
