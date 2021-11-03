
const icon= document.getElementById('hidden_bars');
const div = document.getElementById('part_three');
const partOne =document.getElementById('part_one');
const partTwo =document.getElementById('part_two');


function togglee(){
    if(div.style.display ==="block"){
        div.style.display ="none";
        partOne.style.cssText =" position: relative;z-index: 1000; width: 100%; top:none";
        partTwo.style.cssText =" position: relative;z-index: 1000; width: 100%; top:0px;";
       }else{
        div.style.display ="block";
        partOne.style.cssText =" position: fixed;z-index: 1000; width: 100%; top:0;";
        partTwo.style.cssText =" position: fixed;z-index: 1000; width: 100%; top:20px;";
       }
}
icon.addEventListener('click',togglee);

// SEARCH ICON
const searchIcon =document.getElementById('search_icon');
const searchDiv = document.getElementById('search_part');
function HideSeach(){
    if(searchDiv.style.display ==="block"){
        searchDiv.style.display ="none"; 
        
       }else{
        searchDiv.style.display ="block"; 
        div.style.display ="none";
        partOne.style.cssText =" position: relative;z-index: 1000; width: 100%; top:none";
        partTwo.style.cssText =" position: relative;z-index: 1000; width: 100%; top:0px;"; 

       }
}
searchIcon.addEventListener('click',HideSeach);


$('.part_three #Laptopsup').click(function(e){
    e.preventDefault();
    $(".text_categories #Laptops").click();
});
$('.part_three #Phonesup').click(function(e){
    e.preventDefault();
    $(".text_categories #Phones").click();
});
$('.part_three #Accessoriesup').click(function(e){
    e.preventDefault();
    $(".text_categories #Accessories").click();
});
$('.part_three #Camerasup').click(function(e){
    e.preventDefault();
    $(".text_categories #Cameras").click();
    
});