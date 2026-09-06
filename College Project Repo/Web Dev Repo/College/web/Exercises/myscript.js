function addCourse()
{
    let coursesTable = document.getElementById("tb");
    let codeInput = document.getElementsByTagName("input")[0];
    let descriptionInput = document.getElementsByTagName("input")[1];
    let courseRow = document.createElement("tr");//create new row
    let codeCell = document.createElement("td");//create code td
    let descriptionCell = document.createElement("td");//create desc td
    codeCell.innerHTML = codeInput.value;//fill the code td with the value entered by the user
    descriptionCell.innerHTML = descriptionInput.value;//fill the desc td with the value entered by the user
    courseRow.appendChild(codeCell);
    courseRow.appendChild(descriptionCell);
    coursesTable.appendChild(courseRow);
    codeInput.value = "";
    descriptionInput.value = "";

}

function addCity()
{
    let select = document.getElementById("city");
    let city = document.getElementsByTagName("input")[2];
    let addToTopCheckBox = document.getElementById("addToTop");
    let newCity = document.createElement("option");
    newCity.innerText = city.value;
    if(addToTopCheckBox.checked){
        select.insertBefore(newCity,select.firstChild);
    }else{
        select.appendChild(newCity);
    }
    city.value = "";
    addToTopCheckBox.checked=0;
}

function removeCity()
{
   let select = document.getElementById("city");
    select.remove(select.selectedIndex);
}
var myvar;

