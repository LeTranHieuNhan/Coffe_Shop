console.log("dess");
let loaderDiv = document.querySelector(".loader");
let recipeBtn = document.getElementById("recipeBtn");
let keyword = document.getElementById("keyword-input");

let result = document.getElementById("result");
let searchSelect = document.querySelector("select.search-list");
let searchSelectPick ="filter.php?c=Dessert"
let url = "https://themealdb.com/api/json/v1/1/";

console.log("dess1");
recipeShowcase();





/*window.addEventListener("scroll", () => {
  let scrollable = document.documentElement.scrollHeight - window.innerHeight;
  let scroll = window.scrollY;
  let footer = document.querySelector("footer");

  if (Math.ceil(scroll) < scrollable) {
    footer.classList.add("hide");
  }
  else {
    footer.classList.remove("hide");
  }
})*/



function recipeShowcase (){
  //document.querySelector("body").classList.remove("height100percent");

  let KeyInp = "";
  console.log(KeyInp);
  
    //let result = "";
    //document.querySelector(".result").innerHTML = result;
    
    console.log(url + searchSelectPick + KeyInp)
    fetch(url + searchSelectPick + KeyInp)
      .then((response) => response.json())
      .then((data) => {
        
          fetchRecipe(data.meals);
        
      });
  
};


async function fetchRecipe(mealFound)
{
  console.log(mealFound);

  for (let j = 0; j < mealFound.length; j++) {
    let meal = mealFound[j];
    
      //console.log(myMeals);
      console.log(meal);
      console.log(meal.strMealThumb);
      console.log(meal.strMeal);
      
     /* let count = 1;
      let ingredients = [];
      for (let i in meal) {
        let ingredient = "";
        let measure = "";
        if (i.startsWith("strIngredient") && meal[i]) {
          ingredient = meal[i];
          measure = meal[`strMeasure` + count];
          count += 1;
          ingredients.push(`${measure} ${ingredient}`);
        }
      }

      console.log(ingredients);
      let ingredientsStr = '';
      for (let j = 0; j < ingredients.length; j++){
        ingredientsStr += `<li>${ingredients[j]}</li>`;
      }*/

      let foodPrice = "";
      foodPrice = meal.idMeal.charAt(meal.idMeal.length-1);
      foodPrice = parseInt(foodPrice);

      if (foodPrice>6)
      {
        foodPrice = "2.00";
      } else if (foodPrice>3)
      {
        foodPrice= "3.50";
      } else 
      {
        foodPrice = "3.00";
      }
      
      let nameMeal = meal.strMeal;

      if(nameMeal.includes('tart')||nameMeal.includes('cake'))
      {
        result = `<div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="card" style="height: 400px; position: relative; border: 1px solid #4f4f4f; border-radius: 10%; margin: 10px; overflow: hidden;">
                    <img src="${meal.strMealThumb}" style="height: 200px" alt="Card image cap">
                      <div class="card-body" style="position: absolute; bottom: 10px;">
                         <h5 class="card-title">
                           <strong>  ${meal.strMeal}  </strong>
                          </h5>
                      <p class="card-text">Lorem ipsum dolor set amet</p>
                      <a href="#" class="btn btn-primary">PURCHASE</a>
                      <i class="fas fa-dollar-sign    "></i>
                                ${foodPrice}
                      </div>
                  </div>
                </div>
                <!--end meals-->`;


    
      document.querySelector(".result").innerHTML += result;
      }
    }
  

  //document.querySelector("body").classList.add("height100percent");

  }
{/* <button class="btn btn-lg btn-outline-primary IngreBtn"> Show Ingredients</button> */}