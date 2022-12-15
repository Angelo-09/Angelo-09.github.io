//DRINKS
const drinksFile = 'JSON/Drinks.json';
const drinks_response = await fetch(drinksFile);
const drinks_data = await drinks_response.json();

//FOODS
const foodsFile = 'JSON/Food.json';
const foods_response = await fetch(foodsFile);
const foods_data = await foods_response.json();

//DROPDOWN
if(document.getElementById("order-list").value == "drinks"){
    var output="";
    for(var d=0;d<drinks_data.length;d++){
        output += `
            <div class="product-cards">
                <p id="product-name">${drinks_data[d].productName}</p>
                <img src="${drinks_data[d].image}" alt="No Image Available">
                <p id="price">Price:${drinks_data[d].price}</p>
                <button id="add-button"type="submit">Add</button>
            </div>
        `;
        document.querySelector('.container').innerHTML=output;
    }
}
document.getElementById("order-list").onchange = function(){
    if(document.getElementById("order-list").value == "drinks"){
        var output="";
        for(var d=0;d<drinks_data.length;d++){
            output += `
                <div class="product-cards">
                    <p id="product-name">${drinks_data[d].productName}</p>
                    <img src="${drinks_data[d].image}" alt="No Image Available">
                    <p id="price">Price:${drinks_data[d].price}</p>
                    <button id="add-button"type="submit">Add</button>
                </div>
            `;
            document.querySelector('.container').innerHTML=output;
        }
    }
    else if(document.getElementById("order-list").value == "foods"){
        var output="";
        for(var d=0;d<foods_data.length;d++){
            output += `
                <div class="product-cards">
                    <p id="product-name">${foods_data[d].productName}</p>
                    <img src="${foods_data[d].image}" alt="No Image Available">
                    <p id="price">Price: ${" "+foods_data[d].price}</p>
                    <button id="add-button"type="submit">Add</button>
                </div>
                <br>
            `;
            document.querySelector('.container').innerHTML=output;
        }   
    }
};




