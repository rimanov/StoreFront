//author: rasul
//this object is created to contain the data from the form that we're going to parse in store()
function userInfoEntry(name, order, email, country, issue) {
    this.name = name;
    this.order = order;
    this.email = email;
    this.country = country;
    this.issue = issue;
}

function store(){
    var userInfo = {infoArray:[]}; //this variable will store the array of user info that we will grab from the form
    document.getElementById("submit").onclick = function() {

      //next 5 lines just gets the values from the form fields with the elementID specified
        var name = document.getElementById("username").value;
        var order = document.getElementById("userorder").value;
        var email = document.getElementById("useremail").value;
        var country = document.getElementById("usercountry").value;
        var issue = document.getElementById("userissue").value;

        //this object will store the values from the form fields into a new object
        var newuserInfo = new userInfoEntry(name, order, email, country, issue);

        //and the new object with the form info is pushed into the array of user info
        userInfo.infoArray.push(newuserInfo);

        //and that array is stored inthe local storage (the arrat is turned into a JSON file with stringify to display the string values)
        localStorage.setItem("userInfo", JSON.stringify(userInfo));

        //the data is logged on the console of the browser
        console.log(userInfo);
        return true;
    }
}
