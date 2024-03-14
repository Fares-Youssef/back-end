// show password in login page
function showPass() {
    var input = document.getElementById("password").type;
    if (input === "password") {
        document.getElementById("password").type = "text"
    } else {
        document.getElementById("password").type = "password"
    }
}
var receipt = [];

// push product in array
function getvalue() {
    var product = event.target.value;
    var product2 = event.target;
    product2.style.display = "disabled"
    for (let i = 0; i < receipt.length; i++) {
        if (product == receipt[i]) {
            return 0
        }
    }
    receipt.push(product)
    displayProduct()
}

// show producs array in table
function displayProduct() {
    var productBox = ""
    for (var i = 0; i < receipt.length; i++) {
        productBox += `<tr>
                            <td><input type="text" class="form-control" name="example-disabled-input"
                                    placeholder="Disabled..." value="${receipt[i]}" disabled="" >
                            </td>
                            <td>
                                <input id="price${receipt[i]}" placeholder="0.00" onkeyup="calc(), sum()" onchange="calc(), sum()" type="number" class="form-control">
                            </td>
                            <td>
                                <input id="count${receipt[i]}" value="1" onkeyup="calc(), sum()" onchange="calc(), sum()" type="number" class="form-control">
                            </td>
                            <td>
                                <input id="total${receipt[i]}"  type="number"  class="totalprice form-control" disabled placeholder="0.00">
                            </td>
                            <td>
                            <button onclick="deleteRow(${i})" class="btn btn-danger w-100">حذف</button>
                            </td>
                        </tr>`
    }
    document.getElementById("t-body").innerHTML = productBox;
}

// json file
function jsonFile() {
    var file = [];
    for (let i = 0; i < receipt.length; i++) {
        name = receipt[i];
        price = document.getElementById(`price${receipt[i]}`).value;
        count = document.getElementById(`count${receipt[i]}`).value;
        var total = document.getElementById(`total${receipt[i]}`).value;
        var newFile = {
            name,
            price,
            count,
            total
        }
        file.push(newFile)
    }
    var fares = JSON.stringify(file)
    document.getElementById("jsonFile").value = fares
    console.log(file);
}



// calc totla product price
function calc() {
    for (var i = 0; i < receipt.length; i++) {
        var prodectPrice = document.getElementById(`price${receipt[i]}`);
        var productCount = document.getElementById(`count${receipt[i]}`);
        var price = prodectPrice.value;
        var count = productCount.value;
        var total = price * count;
        document.getElementById(`total${receipt[i]}`).value = total + ".00";
    };
}

// delete one product from table
function deleteRow(i) {
    receipt.splice(i, 1)
    displayProduct()
}

// sum total
function sum() {
    var sum = 0;
    $('.totalprice').each(function () {
        sum += parseFloat(this.value);
    });
    document.getElementById("fullTotal").value = sum + ".00"
    document.getElementById("fullTotal2").value = sum + ".00"
}

// sum total after cash
function total() {
    var cash = document.getElementById("cash").value;
    var fullTotal = document.getElementById("fullTotal").value;
    document.getElementById("totalTotal").value = cash - fullTotal + ".00";
    document.getElementById("totalTotal2").value = cash - fullTotal + ".00";
    jsonFile()
}

// Get the input element
var inputElement = document.getElementById("cash");

// Bind the total function to the keyup event
inputElement.addEventListener("keyup", total);
