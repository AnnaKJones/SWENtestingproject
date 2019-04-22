
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";
 
  setTimeout(carousel, 4000); // Change image every 4 seconds
  
}

function sideDisplay(page){
    var display = document.getElementById("display");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            display.innerHTML = this.response;
        }
    };
    request.open("GET", "./"+page, true);
    request.send();
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function opencheckoutForm() {
  document.getElementById("myoutForm").style.display = "block";
}

function closecheckoutForm() {
  document.getElementById("myoutForm").style.display = "none";
}


var form = document.querySelector('.needs-validation');
form.addEventListener('submit',function(event){
  if(form.checkValidity()===false){
    event.preventDefault();
    event.stopPropagation();
  }
  form.classList.add('was-validated');
})