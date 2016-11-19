arrEmail = [];
strError = "";
function validateEmail(email) {
  // var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var re = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
  return re.test(email);
}

function splitEmail(emailsstr) {
    arrEmail = emailsstr.split("\n");
    i = 0;
    while (i < arrEmail.length) {
        if (validateEmail(arrEmail[i]) === false) {
            strError += "STT: " + (i+1).toString() + " \tEmail: " + arrEmail[i];
            arrEmail.splice(i, 1);
            if (i == arrEmail.length)
                break;
        }
        i++; 
    }
    strError += "\n";
    for (i = 0; i < arrEmail.length; i++) {
        strError += arrEmail[i] + "\n";
    }
}

window.onload = function() {
        var fileInput = document.getElementById('fileInput');
        var fileDisplayArea = document.getElementById('fileDisplayArea');
        var errorArea = document.getElementById('errorArea');

        fileInput.addEventListener('change', function(e) {
            var file = fileInput.files[0];
            var textType = /text.*/;

            if (file.type.match(textType)) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // fileDisplayArea.innerText = reader.result;
                    emails = reader.result;
                    splitEmail(emails);
                    if(strError != "") {
                        errorArea.innerText = strError;
                    } else {
                        errorArea.innerText = "Không lỗi nha cô gái";
                    }
                }

                reader.readAsText(file);    
            } else {
                fileDisplayArea.innerText = "File not supported!"
            }
        });
}
