function edit($id,$row,$firstname,$name,$email,$street,$zipcode,$city_id){
    document.getElementById("firstname").value = $firstname;
    document.getElementById("name").value = $name;
    document.getElementById("email").value = $email;
    document.getElementById("street").value = $street;
    document.getElementById("zipcode").value = $zipcode;
    document.getElementById("city").selectedIndex = $city_id - 1;
    document.getElementById("form-title").innerHTML = 'Address #' + $row;
    document.getElementById("submit").innerHTML = 'Update This Address';
    document.getElementById("clear").innerHTML = 'Cancel';
    document.getElementById("myform").action = 'php/update.php?id=' + $id;
}

function close(){
    $toast = document.getElementsByClassName('toast')[0];
    $toast.classList.remove('show');
    $toast.classList.add('hide');
}

function clear(){
    document.getElementById("firstname").value = '';
    document.getElementById("name").value = '';
    document.getElementById("email").value = '';
    document.getElementById("street").value = '';
    document.getElementById("zipcode").value = '';
    document.getElementById("city").selectedIndex = 0;
    document.getElementById("form-title").innerHTML = 'Add New Address';
    document.getElementById("submit").innerHTML = 'Create New Address';
    document.getElementById("clear").innerHTML = 'Clear';
    document.getElementById("myform").action = 'php/insert.php';
}

document.getElementById("clear").onclick = function() {
    clear()
};

$("#close_x").click(function(){
    $(".toast").fadeOut();
});

window.addEventListener("load", function () {
    setTimeout(function(){
        $(".toast").fadeOut();
    }, 3200);
}, false);

function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}


$("#xml").click(function(){

    $xml = "<addresses>\n";

    $('#adrTbody').find('tr').each(function(){
        $row = $(this).find('th').html();
        $counter = 0;
        $(this).find('td').each(function(){
            $counter ++;
            switch ($counter % 6) {
                case 1:
                    $add = "\t<address>\n\t\t<row>" + $row + "</row>\n\t\t<firstname>" + $(this).html() + "</firstname>\n";
                break;
                case 2:
                    $add = "\t\t<name>" + $(this).html() + "</name>\n";
                break;
                case 3:
                    $add = "\t\t<email>" + $(this).html() + "</email>\n";
                break;
                case 4:
                    $add = "\t\t<street>" + $(this).html() + "</street>\n";
                break;
                case 5:
                    $add = "\t\t<zipcode>" + $(this).html() + "</zipcode>\n";
                break;
                case 0:
                    $add = "\t\t<city>" + $(this).html() + "</city>\n\t</address>\n";
                break;
            
                default:
                    $add = "";
                    break;
            }
            $xml = $xml + $add;
        });
    });
    $xml = $xml + "</addresses>";
    download("addresses.xml",$xml);
});

$("#json").click(function(){

    $json = '{\n"addresses" : [\n';

    $('#adrTbody').find('tr').each(function(){
        $row = $(this).find('th').html();
        $counter = 0;
        $(this).find('td').each(function(){
            $counter ++;
            switch ($counter % 6) {
                case 1:
                    $add = '\t{\n' + '\t\t"row" : ' + $row + ',\n\t\t"firstname" : "' + $(this).html() + '",\n';
                break;
                case 2:
                    $add = '\t\t"name" : "' + $(this).html() + '",\n';
                break;
                case 3:
                    $add = '\t\t"email" : "' + $(this).html() + '",\n';
                break;
                case 4:
                    $add = '\t\t"street" : "' + $(this).html() + '",\n';
                break;
                case 5:
                    $add = '\t\t"zipcode" : "' + $(this).html() + '",\n';
                break;
                case 0:
                    $add = '\t\t"city" : "' + $(this).html() + '"\n\t},\n';
                break;
            
                default:
                    $add = "";
                    break;
            }
            $json = $json + $add;
        });
    });
    $json = $json.substring(0, $json.length - 2) + "\n]\n}";
    download("addresses.json",$json);
});

(() => {
    'use strict';
  
    const forms = document.querySelectorAll('.needs-validation');
  
    Array.prototype.slice.call(forms).forEach((form) => {
      form.addEventListener('submit', (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
})();
