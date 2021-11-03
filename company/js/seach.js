
const searchInput = document.querySelector("#search-input");
const listItems = document.querySelectorAll(".filter .td ");

const listElements = [...listItems];

const search = function(event) {
  const searchValue = this.value.toLowerCase();
  listElements.forEach(listElement => {
  console.log(listElement);

    const stringFound = listElement.innerText.toLowerCase().indexOf(searchValue) !== -1;
    if (stringFound) {
      /**
       ** Make list item visible
       **/
      listElement.parentElement.style.display = '';
    } else {
      /**
       ** Make list item invisible
       **/
      listElement.parentElement.style.display = "none";
    }
  });
};
searchInput.addEventListener("input", search);
