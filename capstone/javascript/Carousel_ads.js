const DataFile = 'JSON/Carousel_ads.json';
const fileResponse = await fetch(DataFile);
const data = await fileResponse.json();

var output="";
    for(var d=0;d<DataFile.length;d++){
        output += `
        <div class="ProductAd">
            <img id="ProductAd" src="${data[d].image}" alt="No Image Available">
        </div>
        `;
        document.querySelector('ProductAd').innerHTML=output;
    }