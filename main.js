//Listen for form submit

document.getElementById('cits-form').addEventListener('submit',validateForm);

function validateForm(e){

  //prevent form from submitting
  e.preventDefault();
}
