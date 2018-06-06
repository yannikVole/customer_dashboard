window.onload = function(){
    showCustomer('');
};
function processCustomers(str, outputElement){
    outputElement.innerHTML = '';
    var customers = JSON.parse(str);
    customers.forEach( customer => {
        outputElement.innerHTML +=  '<div class="card" style="width:30%;margin:15px;display:inline-block;">'
                                        + '<div class="card-body"'
                                        + '<h5 class="card-title">'+customer.first_name+'</h5>'
                                        + '<h6 class="card-subtitle mb-2 text-muted">'+customer.last_name+'</h6>'
                                        + '<hr>'
                                        + '<p class="card-text">'+customer.email+'</p>'
                                        + '<p class="card-text">'+customer.phone+'</p>'
                                        + '<hr>'
                                        + '<p class="card-text">'+customer.address+'</p>'
                                        + '<p class="card-text">'+customer.city+'</p>'
                                        + '<p class="card-text">'+customer.state+'</p>'
                                    + '</div></div>';
    });
}

function showCustomer(id){
    
    var output = document.getElementById('output');
    var customer = [];
    var xmlHttp = new XMLHttpRequest();

    if(id.length == 0){
        xmlHttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                customer = this.responseText;
                processCustomers(customer,output);
            }
        };
        xmlHttp.open("GET","http://restful.api/api/customers");
        xmlHttp.send();
    } else {
        xmlHttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != []){
                    customer = this.responseText;
                    processCustomers(customer, output);
                }
            }
        };
        xmlHttp.open("GET","http://restful.api/api/customer/" + id);
        xmlHttp.send();
    }
}