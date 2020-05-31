//author: rasul
//optimized for Chrome
//crate function searchPage and pass the parameter text
function searchPage(text) {
  //declare variable to store
  var found;
  //if the window.find function is succesful, store the result into the variable found
  if (window.find) {
    found = self.find(text);
  //if the the wanted variable is not found or there are no more iterations of it in the page, alert the user "Not found"
    if (!found) {
      alert("Not Found!");
    }
  }
}
