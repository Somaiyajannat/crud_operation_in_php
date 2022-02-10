
function onChangeDivision()
{
    var divisionId = document.getElementById("division").value;
    console.log(divisionId);

    let thanaElement = document.getElementById('thana');
    console.log(thanaElement);
    thanaElement.innerHTML = "<option>--- Select ---</option>";

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById('district').innerHTML = this.responseText;
    }
    xhttp.open("POST", "district.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    xhttp.send("division_id=" + divisionId);

}
function onChangeDistrict()
{
    var districtId = document.getElementById("district").value;
    console.log(districtId);

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById('thana').innerHTML = this.responseText;
    }
    xhttp.open("POST", "thana.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("district_id=" + districtId);

}

